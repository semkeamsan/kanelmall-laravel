<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    protected $username = 'username';
    use SendsPasswordResetEmails;

    protected function validateEmail(Request $request)
    {

        if (is_numeric($request->email)) {
            $this->username = 'phone';
        } elseif (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $this->username = 'email';
        }
        $request->validate([$this->username => 'required|email'], [], [$this->username => __('Email')]);
    }

    // public function phone(Request $request)
    // {
    //     $rules = [
    //         'phone' => ['required', 'string', 'min:9', 'max:255'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ];
    //     $request->validate($rules);
    //     $user = User::where('phone',$request->phone)->first();
    //     $user->update([
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect()->route('login');
    // }

    public function phone(Request $request)
    {

        if ($request->method() == 'POST') {
            $rules = [
                'code' => ['required', 'string', 'min:6'],
                'phone' => ['required', 'string', 'min:9', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
            $request->validate($rules);

            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                if (env('TWILIO_OTP')) {
                    $user->otp($request->code);
                    $user->update([
                        'password' => Hash::make($request->password),
                    ]);

                    $user->markPhoneAsVerified();
                    auth()->login($user, true);
                    return redirect()->route('login');
                }
                if (env('FIREBASE_OTP')) {
                    $user->update([
                        'password' => Hash::make($request->password),
                    ]);
                    $user->markPhoneAsVerified();
                    auth()->login($user, true);
                    return redirect()->route('login');
                }
            }
        } else {
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                if (env('TWILIO_OTP')) {
                    $user->otp();
                }
            }
            if (env('TWILIO_OTP')) {
                return view('auth.twilio.phone.password');
            }
        }
    }
}
