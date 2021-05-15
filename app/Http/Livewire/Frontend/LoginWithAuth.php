<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class LoginWithAuth extends Component
{
    // protected $listeners = ['echo:login,LoginEvent' => 'openLoginForm'];
    public function getListeners()
    {
        return [
            'echo:login,LoginEvent' => 'openLoginForm',
            'LoginEvent' => 'openLoginForm',
        ];
    }
    public function openLoginForm(){
        $this->dispatchBrowserEvent('open-login-form');
    }

    public function render()
    {
        return view('livewire.frontend.login-with-auth');
    }

}
