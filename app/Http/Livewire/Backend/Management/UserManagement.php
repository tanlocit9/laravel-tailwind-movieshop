<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\User;
use Livewire\Component;

class UserManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = User::all();
    }

    public function render()
    {
        return view('livewire.backend.management.user-management');
    }
}
