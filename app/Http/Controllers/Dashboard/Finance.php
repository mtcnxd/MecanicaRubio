<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use \DB;
use PDF;

class Finance extends Controller
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

        return view('dashboard.clients.finance', compact('services', 'items'));
    }

    public function closeMonth(Request $request)
    {
        try {
            DB::table('montly_balances')->insert([
                "income"     => $request->income,
                "expenses"   => $request->expenses,
                "balance"    => 
                "close_date" => Carbon::now(),
                "comments"   => 'Comentarios del cierre de mes',
                "created_at" => Carbon::now()
            ]);
        } catch (Exception $err){
            dd($err->getMessage());
        }

        sleep(5);

        return Response()->json([
            "success"  => true,
            "messsage" => 'El balance del mes actual a sido cerrado correctamente',
            "data"     => $request->all()
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

        $pdf = PDF::loadView('dashboard.templates.pdf_balance', $data);
        
        return $pdf->download('balance.pdf');
    }
}
