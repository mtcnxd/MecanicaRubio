<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;

class ControllerExpenses extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endDate   = Carbon::now()->format('Y-m-d');

        $expenses = DB::table('expenses')
            ->whereBetween('created_at', [$startDate, Carbon::now()])
            ->get();

        return view('dashboard.expenses.index', [
            'expenses'  => $expenses,
            'startDate' => $startDate,
            'endDate'   => $endDate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.expenses.create', [
            "expenses"  => array(),
            "employees" => User::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('attach')){
            $result = $request->file('attach')->store('public');
            $filename = explode('/', $result)[1];
        }

        DB::table('expenses')->insert([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status,
            'amount'      => $request->amount,
            'price'       => $request->price,
            'responsible' => $request->responsible,
            'attach'      => isset($filename) ? $filename : '',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        return to_route('expenses.index');
    }

    public function loadBalance()
    {
        $services = DB::table('services')
            ->join('services_items','services.id','services_items.service_id')
            ->join('autos','services.car_id', 'autos.id')
            ->where('labour', true)
            ->where('services.status','Entregado')
            ->get();

        $salaries = DB::table('salaries')
            ->where('status', 'Pagado')
            ->get();

        $expenses = DB::table('expenses')
            ->where('status','Pagado')
            ->get();

        return view('dashboard.expenses.balance', compact('services', 'salaries', 'expenses'));
    }
}
