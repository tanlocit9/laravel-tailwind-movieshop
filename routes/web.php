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

// Route::get('/login','HomeController@login');

Route::prefix('auth')->group(function () {
    Route::get('{provider}','SocialiteController@redirect')->name('login_with_socialite');
    Route::get('{provider}/callback', 'SocialiteController@handleCallback');
});

Auth::routes();
Route::group([],function () {
    Route::get('/','CustomerController@index')->name('home_page');
    Route::get('/movie/{movie}','MovieController@show')->name('show_movie');
    Route::get('show-time/','CalendarController@index')->name('showtime');
    Route::get('book-ticket/{movie_slug}/{calendar}','TicketController@index')->name('book_ticket');
});
Route::group(['middleware'=>'checkadmin','prefix'=>'admin'],function () {
    Route::get('/','HomeController@admin')->name('admin');
    Route::get('/user','HomeController@users')->name('manage_user');
    Route::get('/movie','HomeController@movies')->name('manage_movie');
    Route::get('/genre','HomeController@genres')->name('manage_genre');
    Route::get('/movie_genre','HomeController@movies_genres')->name('manage_movie_genre');
    Route::get('/theater','HomeController@theaters')->name('manage_theater');
    Route::get('/actor','HomeController@actors')->name('manage_actor');
    Route::get('/movie_actor','HomeController@movies_actors')->name('manage_movie_actor');
    Route::get('/schedule','HomeController@schedules')->name('manage_schedule');

    Route::post('/user/add','UserController@store')->name('user_add');
    Route::post('/movie/add','MovieController@store')->name('movie_add');
    Route::post('/theater/add','TheaterController@store')->name('theater_add');
    Route::post('/genre/add','GenreController@store')->name('genre_add');
    Route::post('/genre/modify','MovieController@updateGenres')->name('genre_modify');

    //view only
});


