<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LoginWithAuth extends Component
{
    protected $listeners = ['closeLoginForm' => 'closeLoginForm','openLoginForm' => 'openLoginForm'];
    public function openLoginForm(){
        $this->dispatchBrowserEvent('open-login-form');
    }

    public function closeLoginForm(){
        $this->dispatchBrowserEvent('close-login-form');
    }

    public function logout(){
        Session::invalidate();
        Session::regenerateToken();
        $this->emit('changeTab','index');
    }

    public function render()
    {
        return view('livewire.frontend.login-with-auth');
    }
}
