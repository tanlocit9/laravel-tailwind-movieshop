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
    Route::get('{provider}','AuthController@redirect')->name('login_with_socialite');
    Route::get('{provider}/callback', 'AuthController@handleCallback');
});

// Auth::routes();
Route::group([],function () {
    Route::get('/','CustomerController@index')->name('home_page');
});

Route::group(['middleware'=>'checkadmin','prefix'=>'admin'],function () {
    Route::get('/','HomeController@admin')->name('admin');
});
