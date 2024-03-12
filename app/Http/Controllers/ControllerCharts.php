<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ControllerCharts extends Controller
{
    static function getServicesChart()
    {
        $startDate = date('Y-m-01');
        $endDate = Carbon::now();

        $data = DB::table('services_view')
            ->selectRaw('count(*) as count, client')
            ->groupBy('client')
            ->get();

        $values = array();
        $labels = array();
        foreach($data as $key => $value){
            $labels[] = $value->client;
            $values[] = $value->count;
        }

        return array(
            'labels' => $labels, 
            'values' => $values,
        );
    }
}
