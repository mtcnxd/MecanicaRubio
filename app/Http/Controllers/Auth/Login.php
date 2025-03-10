<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class Login extends Controller
{
    public function showLogin()
    {
        // dd(Hash::make('nodoubt'));

        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password]))
        {
            $request->session()->regenerate();

            return to_route('services.index');
        }

        sleep(random_int(1,3));
        return to_route('login')->with('error', 'Error al iniciar sesion');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
