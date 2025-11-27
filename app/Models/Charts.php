<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Carbon\Carbon;

class Charts extends Model
{
    use HasFactory;

    protected $table = null;

    protected static $months = [
        'En', 'Feb', 'Mar',
        'Ab', 'May', 'Jun',
        'Jul', 'Ago', 'Sep',
        'Oct', 'Nov', 'Dic'
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
            $labels[] = self::$months[(Integer)$value->month] .' '.$value->year;
            $values[] = $value->services;
        }

        return array(
            'labels' => $labels,
            'values' => $values,
        );
    }

    public function chartCarsReleaseThisMonth()
    {
        return Service::where('status','Entregado')
            ->whereBetween('finished_date', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->get();
    }

    static function getServicesChart()
    {
        $data = DB::table('chart_service_by_months')->get();

        foreach ($data as $value) {
            $labels[] = self::$months[(Integer) $value->month - 1] .' '.$value->year;
            $values[] = $value->services;
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    static function getIncomeChart()
    {
        $data = DB::table('chart_incomes_by_months')
            ->orderBy('month', 'asc')
            ->get();

        foreach($data as $value){
            $labels[] = self::$months[(Integer)$value->month - 1];
            $values[] = $value->price;
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }
}
