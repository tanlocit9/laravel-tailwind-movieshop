<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('layouts.main');
    }

    public function momoPaymentResult(Request $request)
    {
        if($request["errorCode"]=="0"){

        }
        session()->flash("tab","history");
        return view('layouts.main');
    }
}
