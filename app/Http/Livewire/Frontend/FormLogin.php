<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class FormLogin extends Component
{
    public $tab='Login';
    public function changeTab($tab){
        $this->tab=$tab;
    }
    public function render()
    {
        return view('livewire.frontend.form-login');
    }
}
