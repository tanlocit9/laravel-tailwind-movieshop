<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Schedule;
use Livewire\Component;

class ScheduleManagement extends Component
{
    public $items;
    public function mount()
    {
        $this->items = Schedule::all();
    }
    public function render()
    {
        return view('livewire.backend.management.schedule-management');
    }
}
