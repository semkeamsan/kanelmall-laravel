<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function login($provider)
    {
        switch ($provider) {
            case 'phone':
                return view('auth.firebase.phone.otp');
                break;

            default:
                return view('auth.firebase.phone.otp');
                break;
        }
    }
    public function callback($provider)
    {
        if (request($provider) && request()->code) {
            if ($user = User::where($provider, request($provider))->first()) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => request($provider),
                    $provider => request($provider),
                    $provider.'_verified_at' => now(),
                    'avatar'  =>  asset('/images/avatar.png'),
                ]);
                Auth::login($user);
            }
        }
        return redirect()->route('front.account.index');
    }
}
