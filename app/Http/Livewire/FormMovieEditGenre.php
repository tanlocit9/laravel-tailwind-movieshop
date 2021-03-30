<?php

namespace App\Http\Livewire;

use App\Models\Genre;
use App\Models\Movie;
use Livewire\Component;

class FormMovieEditGenre extends Component
{
    public Movie $movie;
    public $listeners=['setMovieID'];
    public $sub_genre_id='';
    public $main_genre_id='';
    public $subGenresAvailable='';
    public function setMovieID($id){
        $this->movie = Movie::find($id);
        if($this->movie->main_genre->first())
            $this->main_genre_id = $this->movie->main_genre->first()->id;
        $this->dispatchBrowserEvent('edit-movie-genres');
    }
    public function render()
    {
        $genres = Genre::all();
        $subGenresAvailable = Genre::where('id','!=', $this->main_genre_id);
        return view('livewire.form-movie-edit-genre',compact('genres','subGenresAvailable'));
    }
    public function deleteGenre($id){
        $this->movie->genres()->detach($id);
    }

    public function editMainGenre(){
        if($this->main_genre_id){
            $this->movie->genres()->wherePivot('is_main', '=', 1)->detach();
            $this->movie->genres()->attach($this->main_genre_id,['is_main'=>1]);
        }
    }
    public function addSubGenre(){
        if($this->sub_genre_id)
            if($this->movie->sub_genre()->where('genre_id',$this->sub_genre_id))
                $this->movie->genres()->attach($this->sub_genre_id,['is_main'=>0]);
    }
}
