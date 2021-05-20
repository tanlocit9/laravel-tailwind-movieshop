<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class ShowMovie extends Component
{
    public $movie;
    public function mount($movie)
    {
        $this->movie = $movie;
    }
    public function render()
    {
        return view('livewire.frontend.show-movie');
    }
}
