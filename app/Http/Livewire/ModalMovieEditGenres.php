<?php

namespace App\Http\Livewire;

use App\Models\Genre;
use App\Models\Movie;
use Livewire\Component;

class ModalMovieEditGenres extends Component
{
    public $genre_ids = [];
    public $movie_id = "";
    public $movie = "";
    public $main_genre = "";
    public $title= '';
    public $action= '';
    public function mount($movie_id)
    {
        if($this->movie_id){
            $this->movie = Movie::find($movie_id);
            $this->main_genre = $this->movie->main_genre->first();
            $this->title = 'Editing genres of '.$this->movie->type->type.' '.$this->movie->title;
        }
    }
    public function render()
    {
        $genres = Genre::all();
        $movies = Movie::all();

        $this->action = 'edit';
        return view('livewire.modal.modal-movie-edit-genres',compact('genres','movies'));
    }
}
