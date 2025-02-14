<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password]))
        {
            $request->session()->regenerate();

            return to_route('services.index');
        }

        return to_route('login')->with('error', 'No se puede iniciar sesion con los datos proporcionados');
    }

    public function logout(Rquest $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
