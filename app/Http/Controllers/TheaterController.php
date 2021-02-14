<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function store(Request $request)
    {
        $theater = Theater::create([
            'theater_name'=>$request->theater_name,
            'theater_address'=>$request->address,
            'theater_phone'=>$request->phone,

        ]);
        if($theater)
            return redirect()
                    ->route('manage_theater')
                    ->with('type', 'Add')
                    ->with('status', 'Succeeded');

        return redirect()->back()
                ->with('type', 'Add')
                ->with('status', 'failed');

    }
}
