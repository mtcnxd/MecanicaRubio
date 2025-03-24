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
        $startDate = Carbon::now()->subDays(45);
        $endDate   = Carbon::now();

        $expenses = DB::table('expenses')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
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

        $rows = DB::table('montly_balance_view')
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get();

        $last = DB::table('montly_balances')->latest()->first();

        return view('dashboard.reports.balance', compact('rows','last'));
    }
}
