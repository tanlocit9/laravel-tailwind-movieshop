<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormLogin extends Component
{
    public $tab = 'Login';
    public $name;
    public $email;
    public $password;
    public $confirmPassword;
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:16',
        'confirmPassword' => 'required|min:8|max:16',
    ];
    public function changeTab($tab)
    {
        $this->tab = $tab;
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->confirmPassword = "";
    }
    public function render()
    {
        return view('livewire.frontend.form-login');
    }
    public function login()
    {
        $user = User::where('email', $this->email)->first();
        if ($user != null && Hash::check($this->password, $user->password)) {
            Auth::login($user);
            $this->emit('closeLoginForm');
        } else {
            session()->flash('message', 'Email or password isn\'t correct.');
        }
    }
    public function register()
    {
        $validatedData = $this->validate();
        if ($this->password == $this->confirmPassword) {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' =>  $validatedData['email'],
                'password' =>  Hash::make($validatedData['password']),
            ]);
            Auth::login($user);
            $this->emit('closeLoginForm');
        } else {
            session()->flash('message', 'Password and confirm password must be same.');
        }
    }
}
