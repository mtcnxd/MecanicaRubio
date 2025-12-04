<?php

namespace App\Http\Controllers\Admin;

use DB;
use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Payroll;
use App\Models\Employee;
use App\Models\PayrollItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Support\MailController;

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

    public function show(string $id)
    {
        $payroll = Payroll::find($id);
        return view('admin.payrolls.show', compact('payroll'));  
    }

    public function manageSalaries(Request $request)
    {
        $payroll = Payroll::find($request->id);
        
        switch ($request->action){
            case 'pay':
                try {
                    $payroll->update([
                        "status"     => 'Pagado',
                        "paid_date"  => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ]);
    
                    MailController::sendPayrollEmail($payroll);

                    $message = "El pago se realizo correctamente";
                } 

                catch (\Exception $e){
                    $message = 'Error: '. $e->getMessage();
                }

            break;

            case 'cancell':
                $payroll->update([
                    'status' => 'Cancelado',
                    "updated_at" => Carbon::now()
                ]);
                
                $message = "El movimiento se cancelo correctamente";
            break;

            case 'delete':
                $payroll->delete();
                $message = "El registro se elimino correctamente";
                break;
        }

        return response()->json([
            'status' => true,
            'message' => $message
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
