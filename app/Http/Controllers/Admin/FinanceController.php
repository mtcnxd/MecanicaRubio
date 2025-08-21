<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use \DB;
use PDF;

class FinanceController extends Controller
{
    public function show($client)
    {
        $services = DB::table('services')
            ->where('client_id', $client)
            ->get();

        $items = DB::table('services')
            ->join('services_items', 'services.id', 'services_items.service_id')
            ->where('services.client_id', $client)
            ->get();

        return view('admin.clients.finance', compact('services', 'items'));
    }

    public function close(Request $request)
    {
        try {
            DB::table('montly_balances')->insert([
                "income"     => $request->income,
                "expenses"   => $request->expenses,
                "balance"    => $request->balance,
                "close_date" => Carbon::now(),
                "comments"   => 'Comentarios del cierre de mes',
                "created_at" => Carbon::now()
            ]);
        }
        
        catch (Exception $err){
            return Response()->json([
                "success"  => false,
                "messsage" => sprintf('Error: %s', $err->getMessage()) ,
                "data"     => $request->all()
            ]);
        }

        sleep(5);

        return Response()->json([
            "success"  => true,
            "message" => 'El mes actual se ha cerrado correctamente',
        ]);
    }

    public function createBalancePDF(Request $request)
    {
        $latest = DB::table('montly_balances')->latest()->first();

        $rows = DB::table('montly_balance_view')
            ->whereBetween('date', [Carbon::parse($latest->close_date), Carbon::now()])
            ->orderBy('date')
            ->get();

        $path = public_path('images/mainlogo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $image = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);

        $data = [
            "services" => array(),
            "image"    => $base64,
            "rows"     => $rows,
        ];

        $pdf = PDF::loadView('admin.templates.pdf_balance', $data);
        
        return $pdf->download('balance.pdf');
    }

    public function listOfIngress()
    {
        $list = DB::table('services')
            ->join('autos', 'services.car_id','autos.id')
            ->join('services_items','services.id','services_items.service_id')
            ->where('finished_date','>', Carbon::now()->startOfMonth())
            ->where('services_items.labour', true)
            ->where('services.status', 'Entregado')
            ->select('services.id', 'brand','model','services.finished_date','services_items.price')
            ->orderBy('services.finished_date')
            ->get();

        return view('admin.reports.services', compact('list'));
    }
}
