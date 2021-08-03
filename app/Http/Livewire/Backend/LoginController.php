<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginController extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.backend.login-controller');
    }

    public function login()
    {
        $user = User::where('email', $this->email)->first();
        if ($user == null) {
            session()->flash('message', 'Staff not found.');
        }

        if (Hash::check($this->password, $user->password)) {
            session()->flash('message', 'Password not correct.');
        }

        Auth::login($user);
        return redirect('/admin');
    }
}
