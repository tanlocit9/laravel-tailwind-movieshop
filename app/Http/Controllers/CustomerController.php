<?php

namespace App\Http\Controllers;

use App\Models\Movie;


class CustomerController extends Controller
{
    public function index()
    {
        return view('layouts.main');
    }
}
