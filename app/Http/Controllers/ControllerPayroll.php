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
            ->join('employees', 'salaries.employee','employees.id')
            ->whereBetween('salaries.created_at', [$startDate, $endDate])
            ->get();

        if(isset($request->employee)){
            $employee   = $request->employee;
            $salaryData = DB::table('salaries')
            ->select('salaries.*', 'employees.name')
            ->join('employees', 'salaries.employee','employees.id')
            ->where('salaries.employee', $employee)
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
            'employee'   => $request->employee,
            'salary'     => $request->salary,
            'hours'      => $request->hours,
            'price'      => $request->price,
            'bonds_comment'    => $request->bonds_comment,
            'bonds'      => $request->bonds,
            'discount_comment' => $request->discount_comment,
            'discount'   => $request->discount,
            'status'     => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return to_route('payroll.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
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
