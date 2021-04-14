<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public $tab='Login';
    public function changeTab($tab){
        $this->tab=$tab;
    }
    public function render()
    {
        return view('livewire.login-form');
    }
}
