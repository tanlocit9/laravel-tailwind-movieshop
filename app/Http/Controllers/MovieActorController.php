<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieActor;
use App\Models\Movie;
use App\Models\Actor;
class MovieActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('actors')->get();
        dd($movies);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MovieEvent  $movieEvent
     * @return \Illuminate\Http\Response
     */
    public function show(MovieEvent $movieEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MovieEvent  $movieEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(MovieEvent $movieEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MovieEvent  $movieEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovieEvent $movieEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MovieEvent  $movieEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieEvent $movieEvent)
    {
        //
    }
}
