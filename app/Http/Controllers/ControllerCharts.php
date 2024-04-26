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
        foreach($data as $value){
            $labels[] = $value->created_at;
            $values[] = $value->services;
        }

        return array(
            'labels' => $labels, 
            'values' => $values,
        );
    }

    static function getIncomeChart()
    {
        $data = DB::select(
            "select date_format(created_at,'%m') as month, sum(price) as price
            from services a join services_items b on a.id = b.service_id
            where labour = true and a.status = 'Entregado' group by date_format(created_at,'%m')"
        );

        $months = [
            'Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'
        ];

        foreach($data as $value){
            $labels[] = $months[(Integer)$value->month -1];
            $values[] = $value->price;
        }

        return array(
            'labels' => $labels,
            'values' => $values,
        );
    }
}
