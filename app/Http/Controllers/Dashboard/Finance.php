<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use \DB;

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

    public function closeMontlyBalance(Request $request)
    {
        DB::table('montly_balances')->insert([
            "income"     => $request->income,
            "expenses"   => $request->expenses,
            "close_date" => Carbon::now(),
            "comments"   => 'Comentarios del cierre de mes'
        ]);

        sleep(5);

        return Response()->json([
            "success"  => true,
            "messsage" => 'El balance del mes actual a sido cerrado correctamente',
            "data"     => $request->all()
        ]);
    }
}
