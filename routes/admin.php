<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::prefix('admin')->as('admin.')->middleware(['auth', 'permissions','verified'])->group(function () {
        Route::get('/', 'Admin\\AdminController@index')->name('index');
        Route::get('/dashboard', 'Admin\\AdminController@dashboard')->name('dashboard');
        Route::resource('currency', 'Admin\\CurrencyController');
        Route::resource('order', 'Admin\\OrderController');
        Route::resource('chatmanager', 'Admin\\ChatManagerController');
        Route::resource('permission', 'Admin\\PermissionController');
        Route::resource('role', 'Admin\\RoleController');
        Route::resource('user', 'Admin\\UserController');
        Route::prefix('account')->as('account.')->group(function () {
            Route::get('/', 'Admin\\AccountController@index')->name('index');
            Route::post('biography', 'Admin\\AccountController@biography')->name('biography');
            Route::post('email', 'Admin\\AccountController@email')->name('email');
            Route::post('password', 'Admin\\AccountController@password')->name('password');
        });
        Route::prefix('settings')->as('settings.')->group(function () {
            Route::get('/', 'Admin\\SettingsController@index')->name('index');
            Route::post('socialite', 'Admin\\SettingsController@socialite')->name('socialite');
            Route::post('brandlogo', 'Admin\\SettingsController@brandlogo')->name('brandlogo');
        });
    });
});
