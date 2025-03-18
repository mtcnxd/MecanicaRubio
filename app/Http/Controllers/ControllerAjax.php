<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use Exception;
use Str;
use DB;

class ControllerAjax extends Controller
{
    public function searchPostcode(Request $request)
    {
        $result = DB::table('postalcodes')
            ->where('postalcode', $request->postcode)
            ->orderBy('address')
            ->get();

        return json_encode($result);
    }

    public function carsByClient(Request $request)
    {
        $autos = DB::table('autos')->where('client_id', $request->client)->orderBy('brand')->get();
        return json_encode($autos);
    }

    public function createItemInvoice(Request $request)
    {
        $labour = false;
        $item   = $request->item;
        $amount = $request->amount;

        if ($request->labour == 'true'){
            if ( empty($request->item) ){
                $item   = "Servicio (mano de obra)";
            }

            $labour = true;
            $amount = 1;
        }

        DB::table('services_items')->insert([
            'service_id' => $request->service,
            'amount'     => $amount,
            'item'       => $item,
            'supplier'   => $request->supplier,
            'price'      => $request->price,
            'labour'     => $labour,
        ]);

        $data = DB::table('services_items')->where('service_id', $request->service)->get();

        return response()->json([
            "success" => true,
            "message" => "Agregado correctamente",
            "data"    => $data
        ]);
    }

    public function removeItemInvoice(Request $request)
    {
        DB::table('services_items')
            ->where('id', $request->item)
            ->delete();

        return 'Eliminado correctamente';
    }

    public function removeItemExpense(Request $request)
    {
        DB::table('expenses')
            ->where('id', $request->id)
            ->delete();

        return 'Eliminado correctamente';
    }

    public function searchPostalCode(Request $request)
    {
        $addresses = DB::table('postalcodes')
            ->where('address','LIKE', "%".$request->address."%")
            ->limit(15)
            ->get();

        return json_encode($addresses);
    }

    public function loadEvent(Request $request)
    {
        $event = DB::table('calendar')
            ->select('calendar.*', 'clients.name','clients.phone', 'autos.brand', 'autos.model')
            ->join('clients', 'calendar.client_id', 'clients.id')
            ->join('autos', 'calendar.car_id', 'autos.id')
            ->where('calendar.id', $request->id)
            ->first();

        return Response()->json([
            "success" => true,
            "data"    => $event
        ]);
    }

    public function getDataTableServices(Request $request)
    {
        $serviceData = DB::table('services_view')
            ->get();

        if($request->startDate && $request->endDate){
            $serviceData = DB::table('services_view')
                ->whereBetween('created_at', [$request->startDate, $request->endDate])
                ->get();
        }

        if ($request->status != 'Todos'){
            $serviceData = DB::table('services_view')
                ->where('status', $request->status)
                ->get();
        }

        return DataTables::of($serviceData)
            ->addColumn('fault', function($service){
                return '<a href="'. route("services.show", $service->id) .'">'. Str::limit($service->fault, 40) ."</a>";
            })
            ->addColumn('created_at', function($service){
                return Carbon::parse($service->created_at)->format('d-m-Y');
            })
            ->addColumn('due_date', function($service){
                if ($service->due_date == null){
                    return null;
                }

                return Carbon::parse($service->due_date)->format('d-m-Y');
            })
            ->addColumn('status', function($service){
                if ($service->status == 'Entregado'){
                    return '<span class="badge text-bg-success">'. $service->status .'</span>';
                }
                else if ($service->status == 'Cancelado' || $service->status == 'Esperando refaccion') {
                    return '<span class="badge text-bg-secondary">'. $service->status .'</span>';
                }
                else {
                    return '<span class="badge text-bg-warning">'. $service->status .'</span>';
                }
            })
            ->addColumn('total', function($service){
                return '$'.number_format($service->total, 2);
            })
            ->rawColumns(['fault','status'])
            ->make(true);
    }

    public function getDataTableExpenses(Request $request)
    {
        $expensesData = DB::table('expenses')
            ->get();

        if($request->startDate && $request->endDate){
            $expensesData = DB::table('expenses')
                ->whereBetween('created_at', [$request->startDate, Carbon::parse($request->endDate)->addDay()])
                ->get();
        } 

        return DataTables::of($expensesData)
            ->addColumn('created_at', function($expense){
                return Carbon::parse($expense->created_at)->format('d-m-Y');
            })        
            ->addColumn('price', function($expense){
                return $expense->amount." / $".number_format($expense->price, 2);
            })
            ->addColumn('total', function($expense){
                return $expense->amount * $expense->price;
            })
            ->addColumn('attach', function($expense){
                return $expense->attach;
            })
            ->addColumn('delete', function($expense){
                return $expense->id;
            })
            ->make(true);
    }

    public function markExpensesAsPaid(Request $request)
    {
        DB::table('expenses')->whereIn('id', $request->checkboxResult)->update([
            'status' => 'Pagado'
        ]);

        return "Los gastos se marcaron como pagados";
    }

    public function getImageAttached(Request $request)
    {
        return DB::table('expenses')
            ->where('id', $request->id)
            ->first();
    }
}
