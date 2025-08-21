<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ChartsController extends Controller
{
    static $months = [
        'Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'
    ];

    static function getServicesChart()
    {
        $startDate = date('Y-m-01');
        $endDate = Carbon::now();

        $data = DB::select(
            "select count(*) as services, DATE_FORMAT(entry_date, '%m') as month
            from services_view 
            group by DATE_FORMAT(entry_date, '%m')
            order by DATE_FORMAT(entry_date, '%m') asc"
        );

        $values = array();
        $labels = array();
        foreach($data as $value){
            $labels[] = self::$months[(Integer) $value->month -1];
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
            where labour = true and a.status = 'Entregado' 
            group by date_format(finished_date,'%m');"
        );

        foreach($data as $value){
            $labels[] = self::$months[(Integer)$value->month -1];
            $values[] = $value->price;
        }

        return array(
            'labels' => $labels,
            'values' => $values,
        );
    }
}
