<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Room;
use App\Models\Theater;
use Livewire\Component;

class RoomCreate extends Component
{
    public $name;
    public $slot;
    public $theater;
    public $theaters;
    protected $listeners = ['openRoomAddModal' => 'openRoomAddModal'];
    public function mount()
    {
        $this->name = 'Room not found';
        $this->slot = 100;
        $this->theaters = Theater::all();
    }
    public function openRoomAddModal()
    {
        $this->dispatchBrowserEvent('open-room-create');
    }

    public function closeRoomAddModal()
    {
        $this->dispatchBrowserEvent('close-room-create');
    }
    public function saveRoom()
    {
        Room::create([
            'name'=>$this->name,
            'slot'=>$this->slot,
            'theater_id'=>$this->theater
        ]);
        $this->emit('openInformModal', "Room create", "Success");
        $this->closeRoomAddModal();
    }
    public function render()
    {
        return view('livewire.backend.modal.room-create');
    }
}
