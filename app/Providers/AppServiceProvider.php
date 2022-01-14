<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $device = strstr(strtolower(@$_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower(@$_SERVER['HTTP_USER_AGENT']), 'android') ? 'mobile' : 'web';
        config()->set('page.device', $device);
        if (request('email')) {
            request()->merge(['email' => str_replace(' ', '', request('email'))]);

            if (is_numeric(request('email'))) {
                request()->merge(['email' => (str_split(request('email'))[0] === '0') ? request('email') : '0'. request('email')]);
            }

        }
        if (request('phone')) {
            request()->merge(['phone' => str_replace(' ', '', request('phone'))]);
        }
    }
}
