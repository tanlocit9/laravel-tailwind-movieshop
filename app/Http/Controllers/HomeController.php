<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Movie;
use App\Models\Theater;
use App\Models\Genre;
use Illuminate\Http\Request;

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
    public function index()
    {
        return view('frontend.index');
    }
    public function admin()
    {
        return view('backend.index');
    }
    public function users()
    {
        return view('backend.user');
    }
    public function movies()
    {
        $movies = Movie::paginate(5);
        $countries = Country::all();
        $genres = Genre::all();
        $title = 'movie';
        return view('backend.movie',compact('countries','movies','title','genres'));
    }
    public function theaters()
    {
        $title = 'theater';
        $theaters = Theater::paginate(5);
        return view('backend.theater',compact('title','theaters'));
    }

    public function genres()
    {
        $title = 'genres';
        $genres = Genre::paginate(5);
        return view('backend.genres',compact('title','genres'));
    }

}
