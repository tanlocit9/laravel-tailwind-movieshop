<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Movie;
use Livewire\Component;

class MovieEdit extends Component
{
    public $movie;
    public $title;
    public $hours;
    public $minutes;
    public $secconds;
    public $limit;
    public $countryId;
    public $genreId;
    public $description;
    public $poster;
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
        if ($this->hours > 10) {
            $this->hours = 10;
        }
        if ($this->minutes > 59) {
            $this->minutes = 59;
        }
        if ($this->secconds > 59) {
            $this->secconds = 59;
        }
        if ($this->limit > 18) {
            $this->limit = 18;
        }
        return view('livewire.backend.modal.movie-edit');
    }
    public function saveMovie()
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"] . '/storage/posters';
        $filename = time() . '';
        $target_file = $target_dir . '/' . $filename;
        $path = $this->poster->path();
        $this->poster->storeAs('posters', $filename);

        $seconds = $this->hours * 3600 + $this->minutes * 60 + $this->secconds;
        move_uploaded_file($path, $target_file);
        $this->movie->title = $this->title;
        $this->movie->description = $this->description;
        $this->movie->duration = date('H:i:s', $seconds);
        $this->movie->poster = $this->poster;
        $this->movie->release_date = date('Y-m-d', strtotime($this->releaseDate));
        $this->movie->age_limit = $this->limit;
        $this->movie->country_id = $this->countryId;
        $this->movie->genres()->wherePivot('is_main', 1)->detach();
        $this->movie->genres()->attach($this->genreId, ['is_main' => 1]);
        $this->emit('openInformModal', "Movie update", "Success");
        $this->closeMovieEditModal();
    }
    public function openMovieEditModal($id)
    {
        $this->movie = Movie::find($id);
        $seconds = strtotime($this->movie->duration);
        $time = gmdate("H:i:s",$seconds);
        $times = explode(':',$time);
        $this->title = $this->movie->title;
        $this->hours = $times[0];
        $this->minutes = $times[1];
        $this->seconds = $times[2];
        $this->description = $this->movie->description;
        $this->poster = $this->movie->poster;
        $this->releaseDate = date('Y-m-d', strtotime($this->movie->release_date));
        $this->limit = $this->movie->age_limit;
        $this->countryId = $this->movie->country_id;
        $this->genreId = $this->movie->genres()->wherePivot('is_main', 1)->first()->id;
        $this->dispatchBrowserEvent('open-movie-edit');
    }

    public function closeMovieEditModal()
    {
        $this->dispatchBrowserEvent('close-movie-edit');
    }
}
