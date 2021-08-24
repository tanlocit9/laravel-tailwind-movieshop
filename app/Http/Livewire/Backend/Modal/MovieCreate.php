<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MovieCreate extends Component
{
    use WithFileUploads;
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
        $this->title = 'Phim này hay nè';
        $this->hours = 1;
        $this->minutes = 30;
        $this->secconds = 20;
        $this->limit = 18;
        $this->country = 1;
        $this->genre = 1;
        $this->description = 'Phim hay lắm';
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
        if ($this->minutes < 0) {
            $this->minutes = 0;
        }
        if ($this->hours < 0) {
            $this->hours = 0;
        }
        if ($this->secconds < 0) {
            $this->secconds = 0;
        }
        if ($this->limit < 0) {
            $this->limit = 0;
        }
        return view('livewire.backend.modal.movie-create');
    }

    public function saveMovie()
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"] . '\storage\posters';

        $filename = time() . "." . explode('.', $this->poster->getClientOriginalName())[1];
        $target_file = $target_dir . '\\' . $filename;
        $this->poster->storeAs('posters', $filename);
        $savedDirectory = dirname($_SERVER["DOCUMENT_ROOT"]) . '\storage\app\posters\\' . $filename;
        copy($savedDirectory, $target_file);

        $seconds = $this->hours * 3600 + $this->minutes * 60 + $this->secconds;
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
        $this->emit('openInformModal', "Movie create", "Success");
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
