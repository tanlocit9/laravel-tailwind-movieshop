<?php

namespace App\Http\Livewire\Backend;

use App\Models\Staff;
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
        $staff = Staff::where('email', $this->email)->first();
        if ($staff == null) {
            session()->flash('message', 'Staff not found.');
        }

        if (!Hash::check($this->password, $staff->password)) {
            session()->flash('message', 'Password not correct.');
        }

        Auth::guard('staff')->login($staff);
        return redirect('/admin');
    }
}
