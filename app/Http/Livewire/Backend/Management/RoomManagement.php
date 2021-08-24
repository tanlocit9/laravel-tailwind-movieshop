<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Room;
use Livewire\Component;

class RoomManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Room::all();
    }
    public function render()
    {
        $this->items = Room::all();
        $this->emit('datatable', 'room');

        return view('livewire.backend.management.room-management');
    }
}
