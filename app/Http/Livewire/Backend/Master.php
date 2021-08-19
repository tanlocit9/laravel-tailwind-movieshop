<?php

namespace App\Http\Livewire\Backend;


use App\Models\Component as ModelsComponent;
use App\Models\Country;
use App\Models\Genre;
use Livewire\Component;

class Master extends Component
{
    public $tab;
    public $genres;
    public $countries;
    public $accessibility;
    public $accessibleComponentIds;
    public $components;
    public function mount()
    {
        $this->tab = 'index';
        $this->genres = Genre::all();
        $this->countries = Country::all();
        $this->components = ModelsComponent::all();
        $this->accessibility=auth('staff')->user()->accessibilities();
        $this->accessibleComponentIds = array_keys($this->accessibility);
    }

    public function changeTab($tab)
    {
        if ($tab != $this->tab) {
            $this->tab = $tab;
        }

        $this->emit('datatable', $tab);
    }

    public function render()
    {
        return view('livewire.backend.master');
    }
}
