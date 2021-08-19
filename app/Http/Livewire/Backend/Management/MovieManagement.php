<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Movie;
use App\Models\Permission;
use Livewire\Component;

class MovieManagement extends Component
{
    public $items;
    public $staff;
    public $accessibilities;
    public $permissions;
    public function mount()
    {
        $this->staff = auth('staff')->user();
        $this->permissions = Permission::all();
        $this->accessibilities = $this->staff->getAccessibilitiesByComponent('movie');
        $this->items = Movie::all();
    }
    public function render()
    {
        return view('livewire.backend.management.movie-management');
    }
}
