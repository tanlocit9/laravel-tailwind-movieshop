<?php

namespace App\Http\Livewire\Backend;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Theater;
use App\Models\User;
use Livewire\Component;

class Master extends Component
{
    public $tab;
    public function mount()
    {
        $this->tab = 'index';
    }

    public function changeTab($tab)
    {
        if ($tab != $this->tab) {
            $this->tab = $tab;
        }
        $this->emit('datatable', $tab);
    }

    public function render()
    {
        $users = User::all();
        $movies = Movie::all();
        $genres = Genre::all();
        $theaters = Theater::all();
        $actors = Actor::all();
        $schedules = Schedule::all();
        return view('livewire.backend.master', compact(
            'users',
            'movies',
            'genres',
            'theaters',
            'actors',
            'schedules'
        ));
    }
}
