<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ControllerUsers extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function edit(String $id)
    {
        $user = User::find($id);
        
        return view('dashboard.users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        if ($request->password != $request->repeat){
            return to_route('profile')
                ->with('error', 'Las contraseñas no coinciden');
        }

        try {
            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => md5($request->password),
                'rol'      => $request->rol,
                'comments' => $request->comments,
            ]);
        
        } catch (Exception $e){
            dd($e->getMessage());
        }

        return to_route('users.index')
            ->with('message', 'Los datos se guardaron correctamente');
    }
}
