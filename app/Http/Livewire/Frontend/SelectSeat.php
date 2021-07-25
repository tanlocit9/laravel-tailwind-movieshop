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
    public $totalTicket;
    public $selectedSeat;
    public $isFullSelected;
    public function mount($movie, $calendar)
    {
        $this->selectedSeat = [];
        $this->isFullSelected = false;
        $this->user = Auth::user();
        $this->movie = $movie;
        $this->calendar = $calendar;
        $this->schedule = $calendar->schedule;
        $this->theater = $calendar->schedule->theater;
        $this->totalTicket = session('sessionTickets');
        $this->seats = array_fill(1, 40, 0);
    }

    public function selectSeat($slot)
    {
        if (!in_array($slot, $this->selectedSeat)) {
            $this->selectedSeat[] = $slot;
        } else {
            $this->selectedSeat = array_diff($this->selectedSeat, array($slot));
        }

        if ($this->totalTicket == count($this->selectedSeat)) {
            $this->isFullSelected = true;
        } else {
            $this->isFullSelected = false;
        }
    }

    public function openPaymentForm()
    {
        if ($this->totalTicket != count($this->selectedSeat)) {
            session()->flash('message', 'You need to choose enough seats');
        } else {
            $this->emit('openPaymentForm',$this->selectedSeat);
        }
    }

    public function render()
    {
        return view('livewire.frontend.select-seat');
    }
}
