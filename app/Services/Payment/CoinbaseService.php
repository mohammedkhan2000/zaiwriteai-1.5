<?php

namespace App\Services\Payment;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Log;

class CoinbaseService extends BasePaymentService
{

    protected $client;

    /**
     * Stripe payment processing, unless you are familiar with
     * Stripe's REST API, we recommend not to modify core payment processing functionalities here.
     * Part that are writing data to the database can be edited as you prefer.
     */
    private $orderId;
    private $public_key;
    private $apiDomain;

    public function __construct($method, $object)
    {
        parent::__construct($method, $object);
        if (isset($object['id'])) {
            $this->orderId = $object['id'];
        }
        $this->public_key = $this->gateway->key;
        $this->client = new HttpClient();

        if ($this->gateway->mode == GATEWAY_MODE_SANDBOX) {
            $this->apiDomain = 'https://api-public.sandbox.exchange.coinbase.com';
        } else {
            $this->apiDomain = 'https://api.commerce.coinbase.com';
        }
    }


    public function makePayment($amount)
    {
        $data['success'] = false;
        $data['redirect_url'] = '';
        $data['payment_id'] = '';
        $data['message'] = SOMETHING_WENT_WRONG;
        try {
            $coinbase_request = $this->client->request(
                'POST',
                'https://api.commerce.coinbase.com/charges',
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'X-CC-Api-Key' => $this->public_key,
                        'X-CC-Version' => '2018-03-22',
                    ],
                    'body' => json_encode(array_merge_recursive([
                        'name' => 'You have a Payment request from '.getOption('app_name'),
                        'description' => 'Payment Description : '.$amount .' '.$this->currency,
                        'local_price' => [
                            'amount' => $amount,
                            'currency' => $this->currency,
                        ],
                        'pricing_type' => 'fixed_price',
                        'metadata' => [
                            'amount' => $amount,
                            'currency' => $this->currency,
                        ],
                        'redirect_url' => $this->callbackUrl,
                        'cancel_url' => '',
                    ]))
                ]
            );


            $coinbase = json_decode($coinbase_request->getBody()->getContents());
            Log::info(json_encode($coinbase));
            if (isset($coinbase->data)) {
                $data['redirect_url'] = $coinbase->data->hosted_url;
                $data['payment_id'] = $coinbase->data->id;
                $data['success'] = true;
            }
            Log::info(json_encode($data));
            return $data;
        } catch (\Exception $e) {
            Log::info($e);
            $data['message'] = $e->getMessage();
            return $data;
        }
    }

    public function paymentConfirmation($payment_id)
    {
        $data['data'] = null;
        $coinbase_request = $this->client->request(
            'GET',
            'https://api.commerce.coinbase.com/charges/'.$payment_id,
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-CC-Api-Key' => $this->public_key,
                    'X-CC-Version' => '2018-03-22',
                ],
            ]
        );


        $coinbase = json_decode($coinbase_request->getBody()->getContents());

        if (isset($coinbase->data)) {
            $data['success'] = true;
            $data['data']['amount'] = $coinbase->data->pricing->local->amount;
            $data['data']['currency'] = $coinbase->data->pricing->local->currency;
            $data['data']['payment_status'] =  'success';
            $data['data']['payment_method'] = COINBASE;
        }else {
            $data['success'] = false;
            $data['data']['amount'] = $coinbase->data->pricing->local->amount;
            $data['data']['currency'] = $coinbase->data->pricing->local->currency;
            $data['data']['payment_status'] =  'unpaid';
            $data['data']['payment_method'] = COINBASE;
        }
        return $data;
    }

}
