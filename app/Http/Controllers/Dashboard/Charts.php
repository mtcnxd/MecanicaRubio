<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class Charts extends Controller
{
    static function getServicesChart()
    {
        $startDate = date('Y-m-01');
        $endDate = Carbon::now();

        $data = DB::select(
            'select count(*) as services, entry_date
            from services_view group by entry_date
            order by entry_date asc;'
        );

        $values = array();
        $labels = array();
        foreach($data as $value){
            $labels[] = Carbon::parse($value->entry_date)->format('d-m-Y');
            $values[] = $value->services;
        }

        return array(
            'labels' => $labels, 
            'values' => $values,
        );
    }

    static function getIncomeChart()
    {
        $labels = array();
        $values = array();

        $data   = DB::select(
            "select date_format(finished_date,'%m') as month, sum(price) as price
            from services a join services_items b on a.id = b.service_id
            where labour = true and a.status = 'Entregado' group by date_format(finished_date,'%m');"
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
