<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Models\SalaryItems;
use App\Http\Controllers\Controller;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $startDate = Carbon::now()->subMonths(2)->startofMonth()->format('Y-m-d');
        $endDate   = Carbon::now()->addDay()->format('Y-m-d');

        $salaries = Salary::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.payrolls.index', [
            "startDate" => $startDate,
            "endDate"   => $endDate,
            "salaries"  => $salaries
        ]);
    }

    public function create()
    {
        /* Current salarie is still not saved */
        $id = Salary::max('id') + 1;

        $employees = User::get();
        $items     = SalaryItems::where('salary_id', $id)->get();

        return view('dashboard.payrolls.create', compact('employees', 'items'));
    }

    public function store(Request $request)
    {
        $insert = Salary::insert([
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
        $salary = Salary::find($id);

        return view('dashboard.payrolls.show', compact('salary'));  
    }

    public function manageSalaries(Request $request)
    {
        switch ($request->action){
            case 'pay':
                DB::table('salaries')->where('id', $request->id)->update([
                    "status"     => 'Pagado',
                    "paid_date"  => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
                $response = "El pago se realizo correctamente";
                break;

                case 'cancell':
                DB::table('salaries')->where('id', $request->id)->update([
                    'status' => 'Cancelado',
                    "updated_at" => Carbon::now()
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
        $id = Salary::max('id') +1;
        
        SalaryItems::insert([
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
        $item = SalaryItems::find($request->input('itemId'));
        $item->delete();

        return response()->json([
            "success" => true,
            "request" => $request->all()
        ]);
    }
}
