<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{Charts,Expense,Payroll,Service};

class Dashboard extends Controller
{
    public function index (
        Expense $expense, 
        Payroll $payroll,
        Charts $charts,
        Service $service
    ){
        $data['income'] = $charts->chartCarsReleaseThisMonth()->sum(function ($service) {
            return $service->serviceItems->where('labour', true)->sum('price');
        });

        $data['avg'] = $service->select(Service::raw('AVG(DATEDIFF(finished_date, entry_date)) as avg'))
            ->where('created_at', '>', Carbon::now()->subMonths(6))
            ->where('status', 'Entregado')
            ->first()->avg;

        return view('admin.reports.dashboard', compact('expense','payroll','charts','data'));
    }
}
