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
                'title' => $request->title,
                'description' =>  $request->description,
                'duration' => date('H:i:s',$seconds),
                'poster'=>$filename,
                'release_date'=>date('Y-m-d',strtotime($request->release)),
                'age_limit'=>$request->limit,
                'country_id'=>$request->country,
                'type_id'=>1
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
    public function updateGenres(Request $request)
    {
        try {
            $movie = Movie::find($request->movie);
            $old_main_genre_id = $movie->main_genre->first()->id;
            if($old_main_genre_id != $request->main_genre){
                $movie->genres()->detach($old_main_genre_id);
                $movie->genres()->attach($request->main_genre,['is_main'=>1]);
            };
            $old_sub_genres_id = $movie->sub_genre;
            foreach($old_sub_genres_id as $sub_genre_id)
                $movie->genres()->detach($sub_genre_id);

            $sub_genres=explode(',',$request->sub_genre);
            foreach($sub_genres as $sub_genre)
                $movie->genres()->attach($sub_genre,['is_main'=>0]);

            return redirect()->route('manage_movie_genre')
                            ->with('type', 'Modify')
                            ->with('status', 'successed');
        } catch (\Throwable $th) {
            return redirect()->route('manage_movie_genre')
                            ->with('type', 'Modify')
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
        return view('frontend.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function editModalGenres($id){
        $movie = Movie::find($id);
        $title = 'Edit genres of movie '.$movie->title;
        $action = 'edit';
        return view('livewire.modal',compact('movie','title','action'));
    }

}
