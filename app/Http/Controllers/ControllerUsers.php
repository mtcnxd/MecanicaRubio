<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
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

    public function update(Request $request, string $id)
    {
        if ($request->change == 'on'){
            if($request->password != $request->repeat){
                return back()->with('error', 'Las contraseñas no coinciden. Intente nuevamente');
            }

            DB::table('users')->where('id', $id)->update([
                'rol'      => $request->rol,
                'status'   => $request->status,
                'password' => Hash::make($request->password),
                'comments' => $request->comments,
            ]);

            return to_route('users.index')
                ->with('message', 'Los datos se actualizaron correctamente');
        }

        DB::table('users')->where('id', $id)->update([
            'rol'      => $request->rol,
            'status'   => $request->status,
            'comments' => $request->comments,
        ]);

        return to_route('users.index')
            ->with('message', 'Los datos se actualizaron correctamente');
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

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado correctamente'
        ]);
    }

    public function login(Request $request)
    {
        $ok = DB::table('users')
            ->where('email', $request->username)
            ->where('password', md5($request->password))
            ->first();

        session([
            "comments" => 'Prueba holra mundo'
        ]);

        sleep(3);

        if ($ok){
            Auth::guard('usuarios')->login($ok);

            return response()->json([
                "success" => true,
                "message" => 'login success',
            ]);
        }

        return response()->json([
            "success" => false,
            "message" => 'login error',
        ]);
    }
}
