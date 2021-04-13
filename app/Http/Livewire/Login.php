<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $tab='';
    public function openLoginForm(){
        $this->dispatchBrowserEvent('open-login-form');
    }
    public function changeTab($tab){
        $this->tab=$tab;
    }
    public function render()
    {
        return view('livewire.login');
    }

}
