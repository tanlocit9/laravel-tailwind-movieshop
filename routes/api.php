<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Lấy tất cả user.
Route::get('/users','UserController@index')->name('users_all');
// Tạo một user
Route::post('/users/create','UserController@store')->name('users_create');
//Chỉnh sửa 1 user
Route::put('/users/update/{id}','UserController@update')->name('users_update');
// Lấy 1 user.
Route::get('/users/{id}','UserController@show')->name('users_one');
// Xóa 1 user
Route::delete('/users/{id}','UserController@destroy')->name('users_delete');
// Tìm kiếm theo name
Route::get('/users/filter/{name}','UserController@findByName')->name('users_find');
