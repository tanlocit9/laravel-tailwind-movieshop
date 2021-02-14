<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Movie;
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
        $title = 'movie';
        return view('backend.movie',compact('countries','movies','title'));
    }
    public function theaters()
    {
        $title = 'theater';
        return view('backend.theater',compact('title'));
    }
    public function movie_calendar()
    {
        return view('backend.movie_calendar');
    }

}
