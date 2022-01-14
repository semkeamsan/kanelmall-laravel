<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        $user = auth()->user();
        if ($user->email &&  is_null($user->email_verified_at)) {
            return view('auth.verify');
        } elseif ($user->phone &&  is_null($user->phone_verified_at)) {

            if (env('TWILIO_OTP')) {
                return view("auth.twilio.phone.verify");
            }
            if (env('FIREBASE_OTP')) {
                return view("auth.firebase.phone.verify");
            }
        } else {
            return redirect()->route('front.account.index');
        }
    }

    public function resend(Request $request)
    {

        if ($request->user()->email) {
            if ($request->user()->hasVerifiedEmail()) {
                return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect($this->redirectPath());
            }

            $request->user()->sendEmailVerificationNotification();

            return $request->wantsJson()
                ? new JsonResponse([], 202)
                : back()->with('resent', true);
        } elseif ($request->user()->phone) {
            if ($request->user()->hasVerifiedPhone()) {
                return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect($this->redirectPath());
            }


            $request->user()->otp();

            return $request->wantsJson()
                ? new JsonResponse([], 202)
                : redirect()->route('auth.phone.verify');
        }
    }

    public function verifyPhone(Request $request)
    {

        if ($request->user()->otp($request->code)) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect($this->redirectPath())->with('verified', true);
        }
    }
}
