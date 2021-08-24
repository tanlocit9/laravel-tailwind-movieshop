<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Theater;
use Livewire\Component;

class TheaterManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Theater::all();
    }
    public function render()
    {
        $this->items = Theater::all();
        $this->emit('datatable', 'theater');
        return view('livewire.backend.management.theater-management');
    }
}
