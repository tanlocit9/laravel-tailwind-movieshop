<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithFileUploads;

class MovieCreate extends Component
{
    use WithFileUploads;
    public $movie;
    public $title;
    public $hours;
    public $minutes;
    public $secconds;
    public $limit;
    public $country;
    public $genre;
    public $description;
    public $poster;
    public $countries;
    public $genres;
    public $releaseDate;
    protected $listeners = ['openMovieAddModal' => 'openMovieAddModal'];

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
        return view('livewire.backend.modal.movie-create');
    }

    public function saveMovie()
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"] . '/storage/posters';
        $filename = time().'';
        $target_file = $target_dir . '/' . $filename;
        $path = $this->poster->path();
        $this->poster->storeAs('posters', $filename);

        $seconds = $this->hours * 3600 + $this->minutes * 60 + $this->secconds;
        move_uploaded_file($path, $target_file);

        $movie = Movie::create([
            'title' => $this->title,
            'description' =>  $this->description,
            'duration' => date('H:i:s', $seconds),
            'poster' => $filename,
            'release_date' => date('Y-m-d', strtotime($this->releaseDate)),
            'age_limit' => $this->limit,
            'country_id' => $this->country,
            'type_id' => 1
        ]);

        $movie->genres()->attach($this->genre, ['is_main' => 1]);
        session()->flash("tab","movie");
        $this->emit('openInformModal', "Movie create", "Success");
        $this->emit('refreshBackend');
        $this->closeMovieAddModal();
    }
    public function openMovieAddModal()
    {
        $this->dispatchBrowserEvent('open-movie-create');
    }

    public function closeMovieAddModal()
    {
        $this->dispatchBrowserEvent('close-movie-create');
    }
}
