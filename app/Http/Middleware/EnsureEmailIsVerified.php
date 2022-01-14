<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() || ($request->user() instanceof MustVerifyEmail)) {
            if( $request->user()->email && !$request->user()->hasVerifiedEmail()){

                if( $request->user()->phone && $request->user()->hasVerifiedPhone()){
                    return $next($request);
                }

                return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));



            }elseif( $request->user()->phone && !$request->user()->hasVerifiedPhone()){

                if( $request->user()->email && $request->user()->hasVerifiedEmail()){
                    return $next($request);
                }

                return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
            }

        }

        return $next($request);
    }
}
