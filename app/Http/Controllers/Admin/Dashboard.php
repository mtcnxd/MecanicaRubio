<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Charts;
use App\Models\Expense;
use App\Models\Payroll;

class Dashboard extends Controller
{
    public function index (
        Expense $expense, 
        Payroll $payroll,
        Charts $charts
    ){
        $data['income'] = $charts->chartCarsReleaseThisMonth()->sum(function ($service) {
            return $service->serviceItems->where('labour', true)->sum('price');
        });

        return view('admin.reports.dashboard', 
            compact('expense','payroll','charts','data')
        );
    }
}
