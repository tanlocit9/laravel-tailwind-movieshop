<?php

namespace App\Http\Livewire\Shared;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AuthView extends Component
{
    protected $listeners = ['closeLoginForm' => 'closeLoginForm', 'openLoginForm' => 'openLoginForm'];
    public function openLoginForm()
    {
        $this->dispatchBrowserEvent('open-login-form');
    }

    public function closeLoginForm()
    {
        $this->dispatchBrowserEvent('close-login-form');
    }

    public function logout()
    {
        Session::invalidate();
        Session::regenerateToken();
        $this->emit('changeTab', 'index');
    }

    public function render()
    {
        return view('livewire.shared.auth-view');
    }
}
