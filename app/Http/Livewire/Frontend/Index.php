<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Movie;
use Livewire\Component;

class Index extends Component
{
    public $tab = 'index';
    public $movies;
    public function changeTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount(){
        $this->movies= Movie::limit(8)->get();
    }
    public function render()
    {
        return view('livewire.frontend.index');
    }
}
