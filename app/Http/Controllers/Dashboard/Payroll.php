<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use DB;

class Payroll extends Controller
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

    public function create()
    {
        $details = null;

        $employees = DB::table('employees')
            ->join('users', 'employees.user_id', 'users.id')
            ->get();

        $id = DB::table('salaries')->max('id') + 1;
        
        $details = DB::table('salaries_details')
            ->where('salary_id', $id)
            ->get();

        return view('dashboard.payrolls.create', compact('employees', 'details'));
    }

    public function store(Request $request)
    {
        $insert = DB::table('salaries')->insert([
            "user_id"    => $request->employee,
            "type"       => $request->type,
            "status"     => 'Pendiente',
            "start_date" => $request->start_date,
            "end_date"   => $request->end_date,
            "total"      => $request->total,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        return to_route('payroll.index')->with('message', 'El registro se guardo correctamente');
    }

    public function show(string $id)
    {
        $salary = DB::table('salaries')
            ->join('users', 'salaries.user_id', 'users.id')
            ->where('salaries.id', $id)
            ->first();

        $details = DB::table('salaries_details')
            ->where('salary_id', $id)
            ->get();

        return view('dashboard.payrolls.show', compact('salary','details'));  
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

        return response()->json([
            'status' => true,
            'message' => $response
        ]);
    }
    
    public function addItem(Request $request)
    {   
        $id = DB::table('salaries')->max('id') +1;

        DB::table('salaries_details')->insert([
            'salary_id' => $id,
            'concept'   => $request->concept,
            'amount'    => $request->amount,
            'number'    => ""
        ]);

        return response()->json([
            'status'  => true,
            'message' => $request->all()
        ]);
    }

    public function removeItem(Request $request)
    {       
        DB::table('salaries_details')->where('id', $request->itemId)->delete();

        return response()->json([
            "success" => true,
            "request" => $request->all()
        ]);
    }
}
