<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
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
        // dd($request);
        try {
            $target_dir = $_SERVER["DOCUMENT_ROOT"].'/storage/posters';
            $filename = strtolower($request->poster->getClientOriginalName());
            $target_file = $target_dir .'/'. $filename;
            $path=$request->poster->path();
            $request->poster->storeAs('posters',$filename);

            $times = explode(':',$request->duration);
            $seconds = $times[0]*3600+$times[1]*60+$times[2];
            move_uploaded_file($path, $target_file);
            $movie = Movie::create([
                'movie_name' => $request->movie_name,
                'movie_description' =>  $request->description,
                'movie_duration' => date('H:i:s',$seconds),
                'poster'=>$filename,
                'release_day'=>date('Y-m-d',strtotime($request->release)),
                'age_limit'=>$request->limit,
                'country_id'=>$request->country
            ]);
            $movie->genres()->attach($request->genre,['is_main'=>1]);
            return redirect()->route('manage_movie')
                            ->with('type', 'Add')
                            ->with('status', 'successed');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('manage_movie')
                        ->with('type', 'Add')
                        ->with('status', 'failed');
        }
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
