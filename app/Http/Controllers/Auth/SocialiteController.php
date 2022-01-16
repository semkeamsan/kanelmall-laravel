<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SocialAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Throwing;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function login($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        try {
            $user =  Socialite::driver($provider)
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();
            //$user =  Socialite::driver($provider)->stateless()->user();
            $auth = SocialAuth::firstOrCreate(['_id' => $user->getId()], [
                'provider'   => $provider,
                '_id'   => $user->getId(),
                '_email'   => $user->getEmail(),
                '_name'   => $user->getName(),
                '_avatar'   => $user->getAvatar(),
            ]);

            if ($auth->user) {
                auth()->loginUsingId($auth->user->id, true);
                return redirect()->route('front.account.index');
            } else {
                $user = User::firstOrCreate(['email' => $user->getEmail()], [
                    'email'   => $user->getEmail(),
                    'name'   => $user->getName(),
                    'avatar'   => $user->getAvatar(),
                    'email_verified_at' => now(),
                ]);
                $auth->update(['user_id' => $user->id]);
                auth()->loginUsingId($user->id, true);
                return redirect()->route('front.account.index');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function loginData(Request $request, $provider)
    {
        dd($request->all(),$provider);
    }

}
