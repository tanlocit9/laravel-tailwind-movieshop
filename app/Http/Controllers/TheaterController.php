<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TheaterController extends Controller
{
    public function store(Request $request)
    {
        try {
            $theater = Theater::create([
                'theater_name'=>$request->theater_name,
                'theater_address'=>$request->address,
                'theater_phone'=>$request->phone,
            ]);
            return redirect()
                ->route('manage_theater')
                ->with('type', 'Add')
                ->with('status', 'Succeeded');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('type', 'Add')
                ->with('status', 'failed');
        }
    }
}
