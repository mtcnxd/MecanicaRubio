<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ControllerExpenses extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.expenseslist', [
            'expenses' => DB::table('expenses')->orderBy('created_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.expense', [
            'expenses' => array()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('expenses')->insert([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status,
            'amount'      => $request->amount,
            'price'       => $request->price,
            'responsible' => $request->responsible,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        return to_route('expenses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('expenses')
            ->where('id',$id)
            ->delete();

        return to_route('expenses.index')->with('error', 'El gasto se eliminó correctamente');
    }
}
