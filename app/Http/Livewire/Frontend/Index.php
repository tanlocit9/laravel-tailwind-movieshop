<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Movie;
use Livewire\Component;

class Index extends Component
{
    public $movies;
    public $limit = 8;

    protected $listeners = [
        'load-more' => 'loadMore'
    ];

    public function loadMore()
    {
        $this->limit = $this->limit + 4;
    }

    public function render()
    {
        $this->movies = Movie::limit($this->limit)->get();
        return view('livewire.frontend.index');
    }
}
