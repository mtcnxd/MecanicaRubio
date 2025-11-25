<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Charts extends Model
{
    use HasFactory;

    protected $table = null;

    public static $months = [
        'Enero', 'Febrero', 'Marzo',
        'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre',
        'Octubre', 'Noviembre', 'Diciembre'
    ];

    public function chartAssetsIncrement()
    {
        return DB::table('assets_increment_chart')
            ->select('export_date', DB::raw('SUM(amount) as total'))
            ->groupBy('export_date')
            ->get();
    }

    public function chartServicesByMonth()
    {
        $data = DB::table('services_view')
            ->select(DB::raw('count(*) as services, date_format(entry_date, "%m") as month, date_format(entry_date, "%Y") as year'))
            ->groupBy('month','year')
            ->get();
        
        foreach ($data as $value) {
            $labels[] = self::$months[(Integer)$value->month -1] .' '.$value->year;
            $values[] = $value->services;
        }

        return array(
            'labels' => $labels,
            'values' => $values,
        );
    }
}
