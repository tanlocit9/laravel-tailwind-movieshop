<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Staff;
use Livewire\Component;

class StaffManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Staff::all();
    }
    public function render()
    {
        $this->items = Staff::all();
        $this->emit('datatable', 'staff');
        return view('livewire.backend.management.staff-management');
    }
}
