<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Calendar;
use App\Models\Movie;
use App\Models\PayMode;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Master extends Component
{
    public $tab;
    public $movie;
    public $calendar;
    public $payModes;
    protected $listeners = [
        'changeTab' => 'changeTab',
        'openBookTicketForm' => 'openBookTicketForm',
        'openSpecificMovie' => 'openSpecificMovie',
        'openSelectSeatForm' => 'openSelectSeatForm'
    ];

    public function mount()
    {
        if(session('tab')!=null){
            $this->tab = session('tab');
        }
        else{
            $this->tab = 'index';
        }
        $this->payModes = PayMode::all();
    }

    public function changeTab($tab)
    {
        $this->tab = $tab;
    }
    public function openSpecificMovie($movieSlug)
    {
        $this->movie = Movie::findBySlug($movieSlug);
        $this->changeTab('show-movie');
    }
    public function openBookTicketForm($movieSlug, $calendarId)
    {
        if (Auth::check()) {
            $this->changeTab('book-ticket');
            $this->calendar = Calendar::find($calendarId);
            $this->movie = Movie::findBySlug($movieSlug);
        } else
            $this->emit('openLoginForm');
    }
    public function openSelectSeatForm()
    {
        if (Auth::check()) {
            $this->changeTab('select-seat');
        } else
            $this->emit('openLoginForm');
    }
    public function render()
    {
        return view('livewire.frontend.master');
    }
}
