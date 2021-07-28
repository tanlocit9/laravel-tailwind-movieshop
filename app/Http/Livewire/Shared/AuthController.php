<?php

namespace App\Http\Livewire\Shared;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Component
{
    public $tab = 'Login';
    public $name;
    public $email;
    public $idCardNumber;
    public $phoneNumber;
    public $password;
    public $confirmPassword;
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:16',
        'idCardNumber'=>'required|unique:users,id_card_number',
        'phoneNumber'=>'required|max:13',
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
                'id_card_number' => $validatedData['idCardNumber'],
                'phone_number' => $validatedData['phoneNumber'],
            ]);
            Auth::login($user);
            $this->emit('closeLoginForm');
        } else {
            session()->flash('message', 'Password and confirm password must be same.');
        }
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {
                if ($finduser->social_type != $provider)
                    session()->flash('message', 'This account email have been used in ' . $finduser->social_type . ' login.');
                else {
                    Auth::login($finduser);
                    $this->emit('closeLoginForm');
                }
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => 2,
                    'social_id' => $user->id,
                    'social_type' => $provider,
                    'password' => 'null',
                    'id_card_number' => rand(100000000, 99999999999),
                    'phone_number' => 1,
                ]);
                Auth::login($newUser);
                $this->emit('closeLoginForm');
            }
        } catch (Exception $e) {
            session()->flash('message', 'Something wrong :((');
        }
    }

    public function render()
    {
        return view('livewire.shared.auth-controller');
    }
}
