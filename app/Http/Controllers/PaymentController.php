<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Bank;
use App\Models\Currency;
use App\Models\FileManager;
use App\Models\Gateway;
use App\Models\GatewayCurrency;
use App\Models\Order;
use App\Models\Package;
use App\Models\UserPackage;
use App\Services\Payment\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $package = Package::findOrFail($request->package_id);
        $durationType = $request->duration_type == PACKAGE_DURATION_TYPE_MONTHLY ? PACKAGE_DURATION_TYPE_MONTHLY : PACKAGE_DURATION_TYPE_YEARLY;
        $gateway = Gateway::where(['slug' => $request->gateway, 'status' => ACTIVE])->firstOrFail();
        $gatewayCurrency = GatewayCurrency::where(['gateway_id' => $gateway->id, 'currency' => $request->currency])->firstOrFail();
        if ($gateway->slug == 'bank') {
            DB::beginTransaction();
            try {
                $bank = Bank::where(['gateway_id' => $gateway->id, 'id' => $request->bank_id])->firstOrFail();
                $bank_id = $bank->id;
                $bank_name = $bank->name;
                $bank_account_number = $bank->bank_account_number;
                $deposit_by = $request->deposit_by;
                $deposit_slip_id = null;
                if ($request->hasFile('bank_slip')) {
                    /*File Manager Call upload for Thumbnail Image*/
                    $newFile = new FileManager();
                    $upload = $newFile->upload('Order', $request->bank_slip);
                    if ($upload['status']) {
                        $deposit_slip_id = $upload['file']->id;
                        $upload['file']->origin_type = "App\Models\Order";
                        $upload['file']->save();
                    } else {
                        throw new Exception($upload['message']);
                    }
                    /*End*/
                } else {
                    throw new Exception('The Bank slip is required');
                }
                $order = $this->placeOrder($package, $durationType, $gateway, $gatewayCurrency, $bank_id, $bank_name, $bank_account_number, $deposit_by, $deposit_slip_id); // new order create
                $order->deposit_slip_id = $deposit_slip_id;
                $order->save();
                DB::commit();
                return redirect()->route('user.subscription.index')->with('success', __('Bank Details Sent Successfully! Wait for approval'));
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('user.subscription.index')->with('error', __('Payment Failed!'));
            }
        } else {
            $order = $this->placeOrder($package, $durationType, $gateway, $gatewayCurrency); // new order create
        }

        $object = [
            'id' => $order->id,
            'callback_url' => route('payment.verify'),
            'currency' => $gatewayCurrency->currency
        ];

        $payment = new Payment($gateway->slug, $object);
        $responseData = $payment->makePayment($order->total);
        if ($responseData['success']) {
            $order->payment_id = $responseData['payment_id'];
            $order->save();
            return redirect($responseData['redirect_url']);
        }
        else{
            return back()->with('error', __('Payment Failed!'));;
        }
    }

    public function placeOrder($package, $durationType, $gateway, $gatewayCurrency, $bank_id = null, $bank_name = null, $bank_account_number = null, $deposit_by = null, $deposit_slip_id = null)
    {
        $price = 0;
        if ($durationType == PACKAGE_DURATION_TYPE_MONTHLY) {
            $price = $package->monthly_price;
        } else {
            $price = $package->yearly_price;
        }
        return Order::create([
            'user_id' => auth()->id(),
            'package_id' => $package->id,
            'amount' => $price,
            'system_currency' => Currency::where('current_currency', 'on')->first()->currency_code,
            'gateway_id' => $gateway->id,
            'duration_type' => $durationType,
            'gateway_currency' => $gatewayCurrency->currency,
            'conversion_rate' => $gatewayCurrency->conversion_rate,
            'subtotal' => $price,
            'total' => $price,
            'transaction_amount' => $price * $gatewayCurrency->conversion_rate,
            'payment_status' => ORDER_PAYMENT_STATUS_PENDING,
            'bank_id' => $bank_id,
            'bank_name' => $bank_name,
            'bank_account_number' => $bank_account_number,
            'deposit_by' => $deposit_by,
            'deposit_slip_id' => $deposit_slip_id
        ]);
    }

    public function verify(Request $request)
    {
        $order_id = $request->get('id', '');
        $payerId = $request->get('PayerID', NULL);
        $payment_id = $request->get('payment_id', NULL);

        $order = Order::findOrFail($order_id);
        if ($order->status == ORDER_PAYMENT_STATUS_PAID) {
            return redirect()->route('user.subscription.index')->with('error', __('Your order has been paid!'));
        }

        $gateway = Gateway::find($order->gateway_id);
        DB::beginTransaction();
        try {
            if ($order->gateway_id == $gateway->id && $gateway->slug == MERCADOPAGO) {
                $order->payment_id = $payment_id;
                $order->save();
            }

            $payment_id = $order->payment_id;

            $gatewayBasePayment = new Payment($gateway->slug, ['currency' => $order->gateway_currency]);
            $payment_data = $gatewayBasePayment->paymentConfirmation($payment_id, $payerId);
            if ($payment_data['success']) {
                if ($payment_data['data']['payment_status'] == 'success') {
                    $order->payment_status = ORDER_PAYMENT_STATUS_PAID;
                    $order->transaction_id = str_replace('-', '', uuid_create());
                    $order->save();

                    $duration = 0;
                    if ($order->duration_type == PACKAGE_DURATION_TYPE_MONTHLY) {
                        $duration = 30;
                    } elseif ($order->duration_type == PACKAGE_DURATION_TYPE_YEARLY) {
                        $duration = 365;
                    }

                    $package = Package::find($order->package_id);
                    setUserPackage(auth()->id(), $package, $duration, $order->id);
                    DB::commit();
                    return redirect()->route('user.subscription.index')->with('success', __('Payment Successful!'));
                }
            } else {
                return redirect()->route('user.subscription.index')->with('error', __('Payment Failed!'));
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            return redirect()->route('user.subscription.index')->with('error', __('Payment Failed!'));
        }
    }
}
