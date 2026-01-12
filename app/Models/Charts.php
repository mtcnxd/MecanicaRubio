<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\{
    Service, Investment
};
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

        return [
            'labels' => $data->pluck('month'),
            'values' => $data->pluck('services'),
        ];
    }

    static function getIncomeChart()
    {
        $data = DB::table('chart_incomes_by_months')
            ->orderBy('month', 'asc')
            ->get();

        return [
            'labels' => $data->pluck('month'),
            'values' => $data->pluck('price'),
        ];
    }

    static function getRevenueChart()
    {
        $data = DB::table('chart_assets_increment')
            ->select(DB::raw('sum(amount) as amount, export_date'))
            ->groupBy('export_date')
            ->orderBy('export_date', 'asc')
            ->limit(20)
            ->get();
        
        $labels = [];
        $values = [];

        foreach($data as $value){
            $labels[] = $value->export_date;
            $values[] = $value->amount;
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    static function getDiversificationChart()
    {
        $investments = Investment::where('active', true)->orderBy('name')->get();

        $labels = [];
        $values = [];
        foreach ($investments as $investment) {
            $labels[] = $investment->name;
            $values[] = number_format($investment->investmentPercentage(), 1);
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }
}
