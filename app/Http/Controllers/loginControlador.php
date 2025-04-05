<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginControlador extends Controller
{
    public function login(Request $request){
        return view('login.login');
    }
    public function autenticacion(Request $request){
        
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credenciales)) {
            
            $request->session()->regenerate();

            return redirect()->intended(route('admin'));

        }else {

            return redirect(route('login'));

        }

    }
    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('inicio'));
    }
}
