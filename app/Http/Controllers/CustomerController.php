<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class CustomerController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('welcome',compact('movies'));
    }
}
