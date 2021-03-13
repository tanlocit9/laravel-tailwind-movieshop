<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Genre;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function admin()
    {
        return view('backend.index');
    }
    public function users()
    {
        $users = User::paginate(5);
        $title = 'user';
        return view('backend.user',compact('users','title'));
    }
    public function movies()
    {
        $movies = Movie::paginate(5);
        $countries = Country::all();
        $genres = Genre::all();
        $title = 'movie';
        return view('backend.movie',compact('countries','movies','title','genres'));
    }
    public function genres()
    {
        $title = 'genre';
        $genres = Genre::paginate(5);
        return view('backend.genre',compact('title','genres'));
    }

    public function theaters()
    {
        $title = 'theater';
        $theaters = Theater::paginate(5);
        return view('backend.theater',compact('title','theaters'));
    }
    public function actors()
    {
        $title = 'actor';
        $actors = Actor::paginate(5);
        return view('backend.actor',compact('title','actors'));
    }
    public function movies_genres()
    {
        $movies = Movie::paginate(5);
        $genres = Genre::all();
        $title = 'genre';
        return view('backend.movie_genre',compact('movies','title','genres'));
    }
    public function movies_actors()
    {
        $movies = Movie::paginate(5);
        $actors = Actor::all();
        $title = 'actor';
        return view('backend.movie_actor',compact('movies','title','actors'));
    }

}
