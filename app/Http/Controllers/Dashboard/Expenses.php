<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;

class Expenses extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate   = Carbon::now();

        $expenses = DB::table('expenses')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        return view('dashboard.expenses.index', compact('expenses'));
    }

    public function create()
    {
        $employees = User::orderBy('name')->get();

        return view('dashboard.expenses.create', compact('employees'));
    }

    public function edit(string $id)
    {
        $expense = DB::table('expenses')
            ->select('expenses.*', 'users.name', DB::raw('expenses.name as concept'))
            ->join('users', 'expenses.responsible','users.id')
            ->where('expenses.id', $id)
            ->first();

        return view('dashboard.expenses.edit', compact('expense'));
    }

    public function update(Request $request, string $id)
    {
        if($request->hasFile('attach')){
            $newFilename = time() .'.'. $request->attach->extension();
            $request->attach->move(public_path('uploads/expenses'), $newFilename);

            DB::table('expenses')->where('id', $id)->update([
                "attach" => isset($newFilename) ? $newFilename : ''
            ]);
        }

        return to_route('expenses.index')->with('message', 'Egreso actualizado correctaamente');
    }

    public function store(Request $request)
    {
        if($request->hasFile('attach')){
            $newFilename = time() .'.'. $request->attach->extension();
            $request->attach->move(public_path('uploads/expenses'), $newFilename);
        }

        DB::table('expenses')->insert([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status,
            'amount'      => $request->amount,
            'price'       => $request->price,
            'responsible' => $request->responsible,
            'attach'      => isset($newFilename) ? $newFilename : '',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        Telegram::send(
            sprintf("<b>New expense created:</b> %s <b>Total:</b> $%s", $request->name, $request->price)
        );

        return to_route('expenses.index');
    }

    public function deleteItem(Request $request)
    {
        DB::table('expenses')
            ->where('id', $request->id)
            ->delete();

        return response()->json([
            "success" => true,
            "message" => 'Eliminado correctamente'
        ]);
    }

    public function report()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate   = Carbon::now();

        $services = DB::table('services')
            ->join('services_items','services.id','services_items.service_id')
            ->join('autos','services.car_id', 'autos.id')
            ->where('labour', true)
            ->where('services.status','Entregado')
            ->get();

        $salaries = DB::table('salaries')
            ->where('status', 'Pagado')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        $expenses = DB::table('expenses')
            ->where('status','Pagado')
            ->get();

        $lastBalance = DB::table('montly_balances')
            ->orderBy('id', 'desc')
            ->first();

        return view('dashboard.reports.balance', compact('services', 'salaries', 'expenses', 'lastBalance'));
    }
}
