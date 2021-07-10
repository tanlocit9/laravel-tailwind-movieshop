<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectSeat extends Component
{
    public $user;
    public $movie;
    public $calendar;
    public $schedule;
    public $theater;
    public $seats;
    public $stringSeat = "ABCDEFGHIJ";
    public $userCart;
    public $totalTicket;
    public function mount($movie, $calendar)
    {
        $this->user = Auth::user();
        $this->userCart = $this->user->prices;
        $this->movie = $movie;
        $this->calendar = $calendar;
        $this->schedule = $calendar->schedule;
        $this->theater = $calendar->schedule->theater;
        $this->totalTicket = $this->user->getTotalTicketSelected($this->calendar->id);
        $this->seats = array_fill(1, 40, 0);
    }

    public function addToCart($seleted)
    {
    }
    public function render()
    {
        return view('livewire.frontend.select-seat');
    }
}
