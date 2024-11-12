<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use DB;

class ControllerPayroll extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employee  = null;
        $startDate = Carbon::now()->format('Y-m-01');
        $endDate   = Carbon::now()->addDay()->format('Y-m-d');

        $salaryData = DB::table('salaries')
            ->select('salaries.*', 'employees.name')
            ->join('employees', 'salaries.employee_id','employees.id')
            ->whereBetween('salaries.created_at', [$startDate, $endDate])
            ->get();

        if(isset($request->employee)){
            $employee   = $request->employee_id;
            $salaryData = DB::table('salaries')
            ->select('salaries.*', 'employees.name')
            ->join('employees', 'salaries.employee','employees.id')
            ->where('salaries.employee', $employee_id)
            ->get();
        }

        return view('dashboard.payrolls.index', [
            "startDate"  => $startDate,
            "endDate"    => $endDate,
            "salaryData" => $salaryData,
            "employee"   => $employee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.payrolls.create', [
            'employees' => Employee::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('salaries')->insert([
            'employee_id'   => $request->employee,
            'salary'        => $request->salary,
            'hours'         => $request->hours,
            'price'         => $request->price,
            'bonds_comment' => $request->bonds_comment,
            'bonds'         => $request->bonds,
            'discount_comment' => $request->discount_comment,
            'discount'      => $request->discount,
            'status'        => $request->status,
            'date_paid'     => $request->date_paid,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        return to_route('payroll.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = DB::table('salaries')
            ->join('employees','salaries.employee_id','employees.id')
            ->where('salaries.id', $id)
            ->first();

        return view('dashboard.payrolls.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
