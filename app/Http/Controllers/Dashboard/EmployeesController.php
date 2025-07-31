<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use DB;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')
            ->select('employees.*', 'users.name','users.phone','users.email', DB::raw('users.status as user_status'))
            ->join('users','employees.user_id','users.id')
            ->get();

        return view('dashboard.employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::all();

        return view('dashboard.employees.create', compact('users'));
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
        
        return view('dashboard.employees.show', compact('employee','extra'));
    }

    public function edit(Request $request, string $id)
    {
        $employee = DB::table('employees')
            ->join('users','employees.user_id','users.id')
            ->where('employees.user_id', $id)
            ->first();

        $extra = Carbon::parse($employee->created_at);
        
        return view('dashboard.employees.edit', compact('employee','extra'));
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

        return view('dashboard.users.profile', compact('self'));
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
        $employees = DB::table('employees')
            ->join('users', 'employees.user_id', 'users.id')
            ->orderBy('users.name')
            ->get();

        if ($request->employee)
        {
            $results = DB::table('employees')
                ->select('concept','type','salaries.id','salaries.start_date','salaries.end_date','salaries.paid_date','amount')
                ->join('salaries','employees.id','salaries.user_id')
                ->join('salaries_details', 'salaries.id', 'salaries_details.salary_id')
                ->where('employees.id', $request->employee)
                ->where('salaries.status','Pagado')
                ->where('salaries_details.concept','Caja de Ahorro')
                ->orderBy('salaries.paid_date')
                ->get();

            $employeeInfo = DB::table('employees')
                ->join('users', 'employees.user_id', 'users.id')
                ->where('employees.user_id', $request->employee)
                ->first();

            return view('dashboard.reports.employees', compact('employees','results', 'employeeInfo'));
        }

        return view('dashboard.reports.employees', compact('employees'));
    }
}
