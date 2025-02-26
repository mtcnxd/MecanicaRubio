<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use DB;

class ControllerEmployees extends Controller
{
    public function index()
    {
        $employees = User::all();

        return view('dashboard.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('dashboard.employees.create');
    }

    public function store(Request $request)
    {
        if ($request->create == 'on'){
            User::create([
                "name"       => $request->name,
                "email"      => $request->email,
                "phone"      => $request->phone,
                "password"   => Hash::make($request->phone),
                "rol"        => 'Limit',
                "comments"   => $request->comments,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }

        DB::table('employees')
            ->insert([
                "user_id"     => User::where('email', $request->email)->first()->id,
                "salary"      => $request->salary,
                "extra"       => $request->extra,
                "periodicity" => $request->periodicity,
                "rfc"         => $request->rfc,
                "status"      => 'Activo',
                "comments"    => $request->comments,
                "created_at"  => Carbon::now(),
                "updated_at"  => Carbon::now()
            ]);        

        return to_route('employees.index')
            ->with('message', 'Los datos se guardaron correctamente');
    }

    public function edit(Request $request, string $id)
    {
        $employee = DB::table('employees')
            ->join('users','employees.userid','users.id')
            ->where('employees.userid', $id)
            ->first();

        $extra = Carbon::parse($employee->created_at);
        
        return view('dashboard.employees.edit', compact('employee','extra'));
    }

    public function update(Request $request)
    {
        dd($request);

        return "update";
    }

    public function destroy(Request $request)
    {
        DB::table('users')->where('id', $request->user)->delete();

        sleep(random_int(1,3));

        return Response()->json([
            "success" => true,
            "message" => 'El usuario a sido eliminado',
            "data"    => $request->user
        ]);
    }

    public function profileIndex()
    {
        $self = User::find(Auth::user()->id);
        return view('dashboard.profile', compact('self'));
    }

    public function profileUpdate(Request $request)
    {
        if ($request->password != $request->repeat){
            return to_route('profile')->with('message', 'Las contraseñas introducidas no coinciden');
        }

        $result = DB::table('users')->where('id', $request->id)->update([
            "name"     => $request->name,
            "phone"    => $request->phone,
            "password" => Hash::make($request->password)
        ]);

        return to_route('profile')->with('message', 'Los datos se actualizaron correctamente');
    }

    public function loadEmployee(Request $request)
    {
        $employee = DB::table('employees')
            ->join('users', 'employees.user_id', 'users.id')
            ->where('users.id', $request->employee)
            ->first();

        return Response()->json([
            "success" => true,
            "data"    => $employee
        ]);
    }
}
