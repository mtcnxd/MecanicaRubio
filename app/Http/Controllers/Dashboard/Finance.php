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

        $resumen = DB::table('services')
            ->select('status', DB::raw('count(*) as count'), DB::raw('sum(total) as total'))
            ->where('client_id', $client)
            ->groupBy('status')
            ->get();

        return view('dashboard.clients.finance', compact('services', 'resumen'));
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
