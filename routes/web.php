<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
Route::prefix('auth')->group(function () {
    Route::get('{provider}','SocialiteController@redirect')->name('login_with_socialite');
    Route::get('{provider}/callback', 'SocialiteController@handleCallback');
});

// Auth::routes();
Route::group([],function () {
    Route::get('/','CustomerController@index')->name('home_page');
    Route::get('/momo','CustomerController@momoPaymentResult')->name('momo');
});

Route::group(['prefix'=>'admin'],function () {
    Route::get('/','HomeController@admin')->name('admin');
});

