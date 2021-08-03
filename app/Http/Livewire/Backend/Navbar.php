<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.backend.navbar');
    }
    public function logout()
    {
        Session::invalidate();
        Session::regenerateToken();
        return redirect('/admin');
    }
}
