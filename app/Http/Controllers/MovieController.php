<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = Movie::create([
            'name' => $request->name,
            'movie_description' =>  $request->description,
            'movie_duration' => strtotime($request->duration),
            'poster_path'=>$request->poster,
            'age_limit'=>$request->limit,
            'country_id'=>$request->country
        ]);
        $target_dir = $_SERVER["DOCUMENT_ROOT"].'/storage/posters';
        $filename = $request->poster->getClientOriginalName();
        $target_file = $target_dir .'/'. $filename;
        $path=$request->poster->path();
        $request->poster->storeAs('posters',$filename);
        if(move_uploaded_file($path, $target_file));
        return redirect()->back()
                        ->with('type', 'Add')
                        ->with('status', 'successed');

        return redirect()->back()
                        ->with('type', 'Add')
                        ->with('status', 'failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
