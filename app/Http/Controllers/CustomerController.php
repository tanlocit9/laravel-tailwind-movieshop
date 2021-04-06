<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class CustomerController extends Controller
{
    public function index()
    {
        $movies = Movie::limit(8)->get();
        return view('welcome',compact('movies'));
    }
}
