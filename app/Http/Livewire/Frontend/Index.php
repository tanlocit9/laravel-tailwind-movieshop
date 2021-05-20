<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Movie;
use Livewire\Component;

class Index extends Component
{
    public $movies;
    public function render()
    {
        $this->movies= Movie::limit(8)->get();
        return view('livewire.frontend.index');
    }
}
