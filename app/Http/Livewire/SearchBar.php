<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class SearchBar extends Component
{
    public $search="";

    public function render()
    {
        $movies = Movie::where('title','like','%' .$this->search. '%')->limit(5)->get();
        return view('livewire.search-bar',compact('movies'));
    }
}
