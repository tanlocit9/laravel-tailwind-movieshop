<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Actor;
use Livewire\Component;

class ActorManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Actor::all();
    }
    public function render()
    {
        return view('livewire.backend.management.actor-management');
    }
}
