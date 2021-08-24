<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Genre;
use Livewire\Component;

class GenreManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Genre::all();
    }
    public function render()
    {
        $this->items = Genre::all();
        return view('livewire.backend.management.genre-management');
    }
}
