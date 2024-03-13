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

        $data = DB::select(
            'select count(*) as services, date_format(created_at,"%d-%m-%Y") as created_at
            from services_view group by date_format(created_at,"%d-%m-%Y")'
        );

        $values = array();
        $labels = array();
        foreach($data as $key => $value){
            $labels[] = $value->created_at;
            $values[] = $value->services;
        }

        return array(
            'labels' => $labels, 
            'values' => $values,
        );
    }
}
