<?php

namespace App\Http\Controllers;

use App\Mail\UserEmailVerification;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function emailVerified($token)
    {
        if (User::where('verify_token', $token)->count() > 0) {
            $user = User::where('verify_token', $token)->first();
            $user->status = USER_STATUS_ACTIVE;
            $user->email_verified_at = Carbon::now()->format("Y-m-d H:i:s");
            $user->save();
            return redirect()->route('login')->with('success', __('Congratulations! Successfully verified your email.'));
        } else {
            return redirect(route('login'));
        }
    }

    public function emailVerify($token)
    {
        $user = User::where('verify_token', $token)->first();
        if (!is_null($user)) {
            if ($user->status == USER_STATUS_ACTIVE) {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login')->with('error', __(SOMETHING_WENT_WRONG));
        }
        return view('auth.verify', compact('token'));
    }

    public function emailVerifyResend($token)
    {
        try {
            if (getOption('email_verification_status', 0) == 1) {
                $user = User::where('verify_token', $token)->firstOrFail();
                Mail::to($user->email)->send(new UserEmailVerification($user));
                return redirect()->route('login')->with('success', __(SENT_SUCCESSFULLY));
            } else {
                return redirect()->route('login')->with('error', __(SOMETHING_WENT_WRONG));
            }
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', __(SOMETHING_WENT_WRONG));
        }
    }
}
