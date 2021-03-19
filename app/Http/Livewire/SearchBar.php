<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class SearchBar extends Component
{
    public $search="";

    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    public function render()
    {
        $movies = Movie::where('title','like','%' .$this->search. '%')->get();
        return view('livewire.search-bar',compact('movies'));
    }
}
