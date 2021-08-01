<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Price;
use App\Models\Theater;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookTicket extends Component
{
    public $movie;
    public $amount;
    public $total_price;
    public $cart_item;
    public $user;
    public $cart;
    public $prices;
    public $total_ticket;
    public $total_combo;
    public $calendar;
    public $theater;
    public $schedule;
    public $sessionTickets;
    public $sessionAmount;
    public function mount($movie, $calendar)
    {
        $this->sessionTickets = 0;
        $this->user = Auth::user();
        $this->movie = $movie;
        $this->calendar = $calendar;
        $this->schedule = $calendar->schedule;
        $this->theater = $calendar->schedule->theater;
        if (session()->has('sessionAmount')) {
            $this->amount = session('sessionAmount');
        } else {
            $this->amount = array_fill(1, Price::all()->count(), 0);
        }

        $this->total_price = array_fill(1, Price::all()->count(), 0);
        $this->prices = Price::all();
    }

    public function render()
    {
        $this->countPrice($this->prices);
        return view('livewire.frontend.book-ticket');
    }

    public function getDataFromSession()
    {
    }

    public function increase($price_id)
    {
        if ($this->getTotalTicket() < 10) {
            $this->amount[$price_id]++;
            if (Price::checkIsTicketType($price_id)) {
                if ($this->getTotalTicket() <= 0) {
                    session()->put('sessionTickets', 0);
                } else {
                    session()->put('sessionTickets', $this->getTotalTicket());
                }
                session()->put('sessionAmount', $this->amount);
            }
        }
    }

    public function decrease($price_id)
    {
        if ($this->amount[$price_id] != 0) {
            $this->amount[$price_id]--;
        }

        if (Price::checkIsTicketType($price_id)) {
            if ($this->getTotalTicket() <= 0) {
                session()->put('sessionTickets', 0);
            } else {
                session()->put('sessionTickets', $this->getTotalTicket());
            }
            session()->put('sessionAmount', $this->amount);
        }
    }

    public function countPrice($prices)
    {
        $this->total_ticket = 0;
        $this->total_combo = 0;
        foreach ($prices as $price) {
            $this->total_price[$price->id] = (int) $this->amount[$price->id] * $price->price;
        }
        for ($i = 1; $i <= 3; $i++) {
            $this->total_ticket += $this->total_price[$i];
            $this->total_combo += $this->total_price[$i + 3];
        }
        session()->put('sessionTotalPriceTickets', $this->total_ticket);
        session()->put('sessionTotalPriceCombos', $this->total_combo);
    }

    public function openSelectSeatForm()
    {
        if ($this->total_ticket == 0) {
            session()->flash('message', 'Choose at least 1 ticket to continue!');
        } else {
            $this->emit('openSelectSeatForm');
        }
    }

    public function validateInput($value)
    {
        if (!is_numeric($value) && $value < 0) {
            return false;
        }
    }

    public function getTotalTicket()
    {
        $tickets = 0;
        foreach ($this->amount as $k => $v) {
            if (Price::checkIsTicketType($k)) {
                $tickets += $v;
            }
        }

        return $tickets;
    }
}
