<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Salary;
use App\Models\Employee;
use App\Models\SalaryItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')
            ->select('employees.*', 'users.name','users.phone','users.email', DB::raw('users.status as user_status'))
            ->join('users','employees.user_id','users.id')
            ->get();

        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::all();

        return view('admin.employees.create', compact('users'));
    }

    public function store(Request $request)
    {        
        $status = 'Inactivo';
        if ($request->create == 'on'){
            $status = 'Activo';
        }

        User::create([
            "name"       => $request->name,
            "email"      => $request->email,
            "phone"      => $request->phone,
            "password"   => Hash::make($request->phone),
            "status"     => $status,
            "rol"        => 'Limit',
            "comments"   => $request->comments,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

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

    public function show(string $id)
    {
        $employee = DB::table('employees')
            ->join('users','employees.user_id','users.id')
            ->where('employees.user_id', $id)
            ->first();

        $extra = Carbon::parse($employee->created_at);

        $vacations = DB::table('employees_vacations')->where('employee_id', $id)->get();
        
        return view('admin.employees.show', compact('employee','extra', 'vacations'));
    }

    public function edit(Request $request, string $id)
    {
        $employee = DB::table('employees')
            ->join('users','employees.user_id','users.id')
            ->where('employees.user_id', $id)
            ->first();

        $extra = Carbon::parse($employee->created_at);
        
        return view('admin.employees.edit', compact('employee','extra'));
    }

    public function update(Request $request, string $id)
    {
        DB::table('employees')->where('user_id', $id)->update([
            "rfc"  => $request->rfc,
            "curp" => $request->curp,
            "nss"  => $request->nss,
        ]);

        DB::table('users')->where('id', $id)->update([
            "name"  => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
        ]);

        return to_route('employees.index')
            ->with('message', 'Los datos se actualizaron correctamente');
    }

    public function destroy(Request $request)
    {
        
        DB::table('users')->where('id', $request->user)->update([
            "status" => 'Inactivo'
        ]);
        
        sleep(random_int(1,5));

        return Response()->json([
            "success" => true,
            "message" => 'El usuario a sido eliminado',
            "data"    => $request->user
        ]);
    }

    public function profileIndex()
    {
        $self = User::find(Auth::user()->id);

        return view('admin.users.profile', compact('self'));
    }

    public function profileUpdate(Request $request)
    {
        if ($request->password != $request->repeat){
            return to_route('profile.index')->with('message', 'Las contraseñas introducidas no coinciden');
        }

        $result = DB::table('users')->where('id', $request->id)->update([
            "name"     => $request->name,
            "phone"    => $request->phone,
            "password" => Hash::make($request->password)
        ]);

        return to_route('profile.index')->with('message', 'Los datos se actualizaron correctamente');
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

    public function report(Request $request)
    {
        if ($request->employee)
        {
            $employee = Employee::find($request->employee);
            $salaries = Salary::where('user_id', $request->employee)->orderBy('paid_date')->get();
            $vacations = DB::table('employees_vacations')->where('employee_id', $request->employee)->get();

            return view('admin.reports.employees', compact('employee', 'salaries', 'vacations'));
        }

        return view('admin.reports.employees');
    }

    public function vacations(Request $request)
    {
        DB::table('employees_vacations')->insert([
            'employee_id' => $request->employee,
            'type'        => $request->type,
            'date'        => $request->date,
            'comment'     => $request->comment,
            'updated_at'  => Carbon::now(),
            'created_at'  => Carbon::now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'El registro se creo con exito',
        ]);
    }
}
