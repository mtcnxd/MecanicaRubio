<?php

namespace App\Http\Controllers\Admin;

use DB;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;
use App\Models\PayrollItems;
use App\Http\Controllers\Controller;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $startDate = Carbon::now()->subMonths(2)->startofMonth()->format('Y-m-d');
        $endDate   = Carbon::now()->addDay()->format('Y-m-d');

        $salaries = Payroll::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.payrolls.index', compact('startDate','endDate','salaries'));
    }

    public function create()
    {
        /* We plus one because current salarie is still not saved */

        $id    = Payroll::max('id') + 1;
        $items = PayrollItems::where('salary_id', $id)->get();

        return view('admin.payrolls.create', compact('items'));
    }

    public function store(Request $request)
    {
        $insert = Payroll::insert([
            "user_id"    => $request->employee,
            "type"       => $request->type,
            "status"     => 'Pendiente',
            "start_date" => $request->start_date,
            "end_date"   => $request->end_date,
            "total"      => $request->total,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        return to_route('payroll.index')->with('success', 'El registro se guardo correctamente');
    }

    public function update(Request $request, string $id)
    {
        Payroll::where('id', $id)->update([
            'status'    => 'Pagado',
            'blocked'   => true,
            'paid_date' => Carbon::now(),
        ]);

        return to_route('payroll.show', $id)
            ->with('success', 'El movimiento se guardo correctamente');
    }

    public function show(string $id)
    {
        $salary = Payroll::find($id);

        return view('admin.payrolls.show', compact('salary'));  
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
        $id = Payroll::max('id') +1;
        
        PayrollItems::insert([
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
        $item = PayrollItems::find($request->input('itemId'));
        $item->delete();

        return response()->json([
            "success" => true,
            "request" => $request->all()
        ]);
    }
}
