<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle($action = 'login')
    {
        session(['google_auth_action' => $action]);
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->user();
        $finduser = User::where('google_id', $user->id)->first();

        if($finduser){
            Auth::login($finduser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser);
        }

        return redirect()->route('home')->with('status', 'Inicio de sesión exitoso con Google. ¡Bienvenido a Alquimarket!');

    } catch (Exception $e) {
        return redirect('login')->with('error', 'Algo salió mal al iniciar sesión con Google');
    }
}
}