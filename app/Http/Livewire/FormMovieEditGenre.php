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
    public $main_genre_id= 1;
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

    public function removeFocus(){
        $this->emit('removeFocus');
    }
    public function deleteGenre($id){
        $this->movie->genres()->detach($id);
        $this->emit('refreshLivewireDatatable');
    }

    public function editMainGenre(){
        $old_main_genre_id = $this->movie->main_genre->first()->id;
        if($old_main_genre_id != $this->main_genre_id){
            $this->movie->genres()->detach($old_main_genre_id);
            $this->movie->genres()->attach($this->main_genre_id,['is_main'=>1]);
        };
        $this->emit('refreshLivewireDatatable');

    }
    public function addSubGenre(){
        if($this->sub_genre_id)
            if($this->movie->sub_genre()->where('genre_id',$this->sub_genre_id))
                $this->movie->genres()->attach($this->sub_genre_id,['is_main'=>0]);
        $this->emit('refreshLivewireDatatable');

    }
}
