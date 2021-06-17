<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Movie;
use Livewire\Component;

class MovieEdit extends Component
{
    public $movie;
    public $countries;
    public $genres;
    public $releaseDate;
    protected $listeners = ['openMovieEditModal' => 'openMovieEditModal'];

    public function mount($countries, $genres)
    {
        $this->countries = $countries;
        $this->genres = $genres;
    }
    public function render()
    {
        return view('livewire.backend.modal.movie-edit');
    }

    public function openMovieEditModal($id)
    {
        $this->movie = Movie::find($id);
        $this->dispatchBrowserEvent('open-movie-edit');
    }

    public function closeMovieEditModal()
    {
        $this->dispatchBrowserEvent('close-movie-edit');
    }
}
