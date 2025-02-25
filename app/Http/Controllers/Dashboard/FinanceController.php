<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FinanceController extends Controller
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
}
