<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;

class ControllerPayroll extends Controller
{
    public function index(Request $request)
    {
        $employee  = null;
        $startDate = Carbon::now()->format('Y-m-01');
        $endDate   = Carbon::now()->addDay()->format('Y-m-d');

        $salaryData = DB::table('salaries')
            ->select('salaries.*', 'users.name')
            ->join('users', 'salaries.user_id','users.id')
            ->whereBetween('salaries.created_at', [$startDate, $endDate])
            ->get();

        if(isset($request->employee)){
            $employee   = $request->employee_id;
            $salaryData = DB::table('salaries')
            ->join('users', 'employees.userid','users.id')
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
        $employees = DB::table('employees')
            ->join('users', 'employees.user_id', 'users.id')
            ->get();

        return view('dashboard.payrolls.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $insert = DB::table('salaries')->insert([
            'user_id'           => $request->employee,
            'salary'            => $request->salary,
            'hours'             => $request->hours,
            'price'             => $request->price,
            'bonds_comment'     => $request->bonds_comment,
            'bonds'             => $request->bonds,
            'discount_comment'  => $request->discount_comment,
            'discount'          => $request->discount,
            'status'            => 'Pendiente',
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        return to_route('payroll.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = DB::table('salaries')
            ->join('users','users.id','salaries.user_id')
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
        return Response()->json([
            'status' => true,
            'message' => 'Data has been deleted',
        ]);
    }

    public function manageSalaries(Request $request)
    {
        switch ($request->action){
            case 'pay':
                DB::table('salaries')->where('id', $request->id)->update([
                    'status' => 'Pagado'
                ]);
                $response = "El pago se realizo correctamente";
                break;

                case 'cancell':
                DB::table('salaries')->where('id', $request->id)->update([
                    'status' => 'Cancelado'
                ]);
                $response = "El movimiento se cancelo correctamente";
                break;

            case 'delete':
                DB::table('salaries')->where('id', $request->id)->delete();
                $response = "El registro se elimino correctamente";
                break;
        }

        return Response()->json([
            'status' => true,
            'message' => $response
        ]);
    }    
}
