<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use DB;

class ControllerEmployees extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('dashboard.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('dashboard.employees.create');
    }

    public function store(Request $request)
    {
        Employee::create($request->all());

        if ($request->create == 'on')
        {
            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => md5($request->password),
                'rol'      => 'Limit',
                'comments' => $request->comments,
            ]);
        }

        return to_route('employees')
            ->with('message', 'Los datos se guardaron correctamente');
    }

    public function edit(Request $request, string $id)
    {
        $employee = Employee::find($id);
        
        return view('dashboard.employees.edit', compact('employee'));
    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {
        DB::table('employees')->where('id', $request->user)->delete();

        sleep(random_int(1,3));

        return Response()->json([
            "success" => true,
            "message" => 'El usuario a sido eliminado',
            "data"    => $request->user
        ]);
    }
}
