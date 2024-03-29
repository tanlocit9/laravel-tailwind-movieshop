<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;

class SocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirect($provider)
    {
        return FacadesSocialite::driver($provider)->redirect();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback($provider)
    {
        try {
            $user = FacadesSocialite::driver($provider)->user();
            $finduser = User::where('email',$user->email)->first();
            if($finduser){
                if($finduser->social_type!=$provider)
                    return redirect('/')->with('auth_msg','This account email have been used in '.$finduser->social_type.' login.');
                else{
                    FacadesAuth::login($finduser);

                    return redirect('/');
                }

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id'=>2,
                    'social_id'=> $user->id,
                    'social_type'=> $provider,
                    'password' => encrypt('my-google'),
                    'id_card_number' => rand(100000000, 99999999999),
                    'phone_number' => 1,
                ]);
                FacadesAuth::login($newUser);
                return redirect('/');
            }

        } catch (Exception $e) {
        }
    }
}
