<?php

namespace App\Http\Middleware;

use Closure;
class Currency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('currency')) {
            config()->set('currency',session('currency'));
        }
        return $next($request);
    }
}
