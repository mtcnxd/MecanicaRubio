<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ControllerPayroll extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.payrollslist', [
            "startDate" => "", 
            "endDate"   => "",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = DB::table('employees')->get();

        return view('dashboard.payroll', [
            'employees' => $employees
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

        return view('');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
