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
            "select date_format(due_date,'%m') as month, sum(price) as price
            from services a join services_items b on a.id = b.service_id
            where labour = true group by date_format(due_date,'%m')"
        );

        $months = [
            'Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'
        ];

        for ($i=0; $i<count($months); $i++){
            $labels[] = $months[$i];

            if ( (Integer)$data[0]->month == $i +1 ){
                $values[$i] = $data[0]->price;
            } else {
                $values[$i] = 0;
            }
        }

        return array(
            'labels' => $labels,
            'values' => $values,
        );
    }
}
