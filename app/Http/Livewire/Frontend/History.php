<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public $user;
    public $tickets;

    public function render()
    {
        return view('livewire.frontend.history');
    }

    public function mount()
    {
        if(Auth::check()){
            $this->user = Auth::user();
            $this->tickets = $this->user->tickets;
        }

    }
}
