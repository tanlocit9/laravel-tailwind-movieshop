<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{

    public function openLoginForm(){
        $this->dispatchBrowserEvent('open-login-form');
    }

    public function render()
    {
        return view('livewire.login');
    }

}
