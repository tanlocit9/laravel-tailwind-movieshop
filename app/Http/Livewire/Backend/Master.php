<?php

namespace App\Http\Livewire\Backend;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Schedule;
use App\Models\Theater;
use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class Master extends Component
{
    public $tab;
    public $users;
    public $movies;
    public $genres;
    public $theaters;
    public $actors;
    public $schedules;
    public $countries;
    public $tickets;
    protected $listeners = ['refresh' => 'refresh'];
    public function mount()
    {
        $this->tab = 'index';
        $this->users = User::all();
        $this->movies = Movie::all();
        $this->genres = Genre::all();
        $this->theaters = Theater::all();
        $this->actors = Actor::all();
        $this->schedules = Schedule::all();
        $this->countries = Country::all();
        $this->tickets = Ticket::all();
    }
    public function refresh($tab)
    {
        $this->users = User::all();
        $this->movies = Movie::all();
        $this->genres = Genre::all();
        $this->theaters = Theater::all();
        $this->actors = Actor::all();
        $this->schedules = Schedule::all();
        $this->countries = Country::all();
        $this->tickets = Ticket::all();
        $this->emit('refresh', $tab);
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
        return view('livewire.backend.master');
    }
}
