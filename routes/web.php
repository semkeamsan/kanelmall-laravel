<?php

use App\Helpers\FileHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Semkeamsan\LaravelFilemanager\Filemanager;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('storagelink', function () {
    echo Artisan::call('storage:link');
});
//SocialAuth

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\\SocialiteController@login')->name('auth.with');
    Route::post('/{provider}', 'Auth\\SocialiteController@loginData')->name('auth.with.data');

    Route::get('/{provider}/callback', 'Auth\\SocialiteController@callback')->name('auth.callback');
});
Route::get('init', 'Front\\ApiController@init')->name('init');
Route::get('transactions', 'Front\\ApiController@transactions')->name('transactions');
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['prefix' => 'otp'], function () {
        Route::get('/{provider}', 'Auth\\OtpController@login')->name('otp.with');
        Route::post('/{provider}/callback', 'Auth\\OtpController@callback')->name('otp.with.callback');
    });

    Route::get('/', 'Front\\FrontController@index')->name('front.index');
    Route::get('/home', 'Front\\FrontController@home')->name('front.home');
    Route::get('/search', 'Front\\FrontController@search')->name('front.search');
    Route::get('/category', 'Front\\FrontController@category')->name('front.category');
    Route::get('/category/{slug}', 'Front\\FrontController@categoryby')->name('front.categoryby');
    Route::get('/product/{slug}', 'Front\\FrontController@product')->name('front.product');
    Route::get('/chat', 'Front\\FrontController@chat')->name('front.chat');
    Route::get('/cartadd/{slug}', 'Front\\FrontController@cartadd')->name('front.cartadd');
    Route::get('/cart', 'Front\\FrontController@cart')->name('front.cart');
    Route::get('/cartremove/{slug}', 'Front\\FrontController@cartremove')->name('front.cartremove');
    Route::prefix('account')->as('front.account.')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/', 'Front\\AccountController@index')->name('index');
        Route::get('/settings', 'Front\\AccountController@settings')->name('settings');
        Route::match(['get', 'post'], '/personal', 'Front\\AccountController@personal')->name('personal');
        Route::match(['get', 'post'], '/authentication', 'Front\\AccountController@authentication')->name('authentication');
        Route::match(['get', 'post'], '/address', 'Front\\AccountController@address')->name('address');

        Route::post('/order/qty/{slug}', 'Front\\AccountController@orderqty')->name('orderqty');
        Route::post('/order', 'Front\\AccountController@order')->name('order');
        Route::get('/orderadd/{slug}', 'Front\\AccountController@orderadd')->name('orderadd');
        Route::get('/myorder', 'Front\\AccountController@myorder')->name('myorder');
        Route::get('/orderremove/{slug}', 'Front\\AccountController@orderremove')->name('orderremove');
        Route::match(['get', 'post'], '/orderpayment/{slug}', 'Front\\AccountController@orderpayment')->name('orderpayment');

        Route::post('image',function(Request $request){
           return FileHelper::upload($request->file('image'));
        })->name('image');

    });
    Route::get('privacy', function () {
        return view('front.privacy');
    });
    Route::get('terms', function () {
        return view('front.terms');
    });
    Route::group(['prefix' => '', 'middleware' => ['auth']], function () {
        Filemanager::routes();
    });
    Auth::routes(['verify' => true,'register'=>false]);
    Route::get('/ck/user/username/{username}', function ($username) {
        $username =  str_replace(' ', '', $username);
        $phone =  (str_split($username)[0] === '0') ? $username : '0' . $username;

        return User::where('email', $username)->orWhere('phone', $phone)->exists();
    })->name('ck.user.username');

    Route::match(['get', 'post'], '/phone/verify', function (Request $request) {
        if ($request->code) {
            if (env('TWILIO_OTP')) {
                if ($request->user()->otp($request->code)) {
                    $request->user()->markPhoneAsVerified();
                    return redirect()->route('front.account.index');
                }
            }
            if (env('FIREBASE_OTP')) {
                $request->user()->markPhoneAsVerified();
                return redirect()->route('front.account.index');
            }
        } else {
            if (env('TWILIO_OTP')) {
                $request->user()->otp();
            }
        }
        if (env('TWILIO_OTP')) {
            return view('auth.twilio.phone.code');
        }
        if (env('FIREBASE_OTP')) {
            return view('auth.firebase.phone.verify');
        }
    })->middleware('auth')->name('auth.phone.verify');

    Route::match(['get', 'post'], 'password/phone/reset', 'Auth\\ForgotPasswordController@phone')->middleware('guest')->name('password.reset.phone');

    Route::prefix('ajax')->as('ajax.')->group(function () {
        Route::get('/home', 'Front\\AjaxController@home')->name('front.home');
        Route::get('/categoryby/{slug}', 'Front\\AjaxController@categoryby')->name('front.categoryby');
    });
    Route::get('internet', function () {
        return view('front.internet');
    });
});


Route::prefix('language')->as('language.')->group(function () {
    Route::match(['get', 'post'], 'set/{locale}', function ($locale) {
        Session::put('locale', $locale);
        if (request()->method() == 'POST') {
            return [
                'status' => true,
            ];
        } else {
            return redirect()->back();
        }
    })->name('set');
});
Route::prefix('currency')->as('currency.')->group(function () {

    Route::match(['get', 'post'], 'set/{currency}', function ($currency) {
        Session::put('currency', $currency);
        if (request()->method() == 'POST') {
            return [
                'status' => true,
            ];
        } else {
            return redirect()->back();
        }
    })->name('set');
});
Route::group(['prefix' => 'command', 'command.'], function () {
    Route::group(['prefix' => 'storage', 'storage.'], function () {
        Route::get('/link', function () {
            return Artisan::call('storage:link');
        })->name('link');
    });
    Route::group(['prefix' => 'list', 'list.'], function () {
        Route::get('/route', function () {
            Artisan::call('route:list');
            return '<pre>' . Artisan::output() . '</pre>';
        })->name('route');
    });
    Route::group(['prefix' => 'clear', 'clear.'], function () {
        Route::get('/cache', function () {
            Artisan::call('cache:clear');
            return '<pre>' . Artisan::output() . '</pre>';
        })->name('cache');
        Route::get('/config', function () {
            Artisan::call('config:clear');
            return '<pre>' . Artisan::output() . '</pre>';
        })->name('config');
        Route::get('/route', function () {
            Artisan::call('route:clear');
            return '<pre>' . Artisan::output() . '</pre>';
        })->name('route');
        Route::get('/view', function () {
            Artisan::call('view:clear');
            return '<pre>' . Artisan::output() . '</pre>';
        })->name('view');
        Route::get('/compiled', function () {
            Artisan::call('clear-compiled');
            return '<pre>' . Artisan::output() . '</pre>';
        })->name('compiled');

        Route::get('/all', function () {
            $output = '';
            Artisan::call('cache:clear');
            $output .= Artisan::output();
            Artisan::call('config:clear');
            $output .= Artisan::output();
            Artisan::call('route:clear');
            $output .= Artisan::output();
            Artisan::call('view:clear');
            $output .= Artisan::output();
            Artisan::call('clear-compiled');
            $output .= Artisan::output();

            return '<pre>' . $output . '</pre>';
        })->name('all');
    });
});
Route::get('sw.js', function () {
    return response(file_get_contents(asset('js/sw.js')), 200, [
        'Content-Type' => 'text/javascript',
        'Cache-Control' => 'public, max-age=3600',
    ]);
    $a = collect([
        '/',
        route('front.home'),
        route('front.category'),
        route('front.chat'),
        route('front.cart'),
        route('login'),
        route('register'),
        route('front.account.index'),
        route('front.account.settings'),
        route('front.account.settings'),
        route('front.account.personal'),
        route('front.account.authentication'),
        route('front.account.address'),
        route('front.account.myorder'),
        route('front.account.myorder', 'status=all'),
        route('front.account.myorder', 'status=pending'),
        route('front.account.myorder', 'status=paid'),
        route('front.account.myorder', 'status=received'),
        route('front.account.myorder', 'status=cancel'),
    ]);
    foreach (session('products', []) as $row) {
        $a->add(route('front.product', $row->id));
    }
    foreach (session('categories', []) as $row) {
        $a->add(route('front.categoryby', $row->id));
    }
    $b = collect();
    foreach ($a as $value) {
        $b->add(str_replace(asset(''), '/', $value));
    }
    $caches = $b;
    return response(view('sw', compact('caches')), 200, [
        'Content-Type' => 'text/javascript',
        'Cache-Control' => 'public, max-age=3600',
    ]);
});
