<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Master extends Component
{
    public $tab;
    public $movie;
    protected $listeners = ['changeTab' => 'changeTab',
                            'openBookTicketForm' => 'openBookTicketForm',
                            'openSpecificMovie' => 'openSpecificMovie'];
    public function mount(){
        $this->tab='index';
    }

    public function changeTab($tab)
    {
        $this->tab = $tab;
    }
    public function openSpecificMovie($movieSlug){
        $this->movie=Movie::findBySlug($movieSlug);
        $this->changeTab('show-movie');
    }
    public function openBookTicketForm($movieSlug){
        if(Auth::check()){
            $this->changeTab('book-ticket');
            $this->movie=Movie::findBySlug($movieSlug);
        }else
            $this->emit('openLoginForm');
    }

    public function render()
    {
        return view('livewire.frontend.master');
    }
}
