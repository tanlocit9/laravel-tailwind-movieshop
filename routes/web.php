<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','HomeController@login');

Route::get('/movie/tiectrangmau',function () {
    return view('frontend.show');
});
Auth::routes();

Route::get('/admin','HomeController@admin')->name('admin');
Route::get('/admin/user','HomeController@users')->name('manage_user');
Route::get('/admin/movie','HomeController@movies')->name('manage_movie');
Route::get('/admin/genre','HomeController@genres')->name('manage_genre');
Route::get('/admin/movie_genre','HomeController@movies_genres')->name('manage_movie_genre');
Route::get('/admin/theater','HomeController@theaters')->name('manage_theater');

Route::post('/admin/user_add','UserController@store')->name('user_add');
Route::post('/admin/movie_add','MovieController@store')->name('movie_add');
Route::post('/admin/theater_add','TheaterController@store')->name('theater_add');
Route::post('/admin/genre_add','GenreController@store')->name('genre_add');
Route::post('/admin/genre_modify','MovieController@updateGenres')->name('genre_modify');
