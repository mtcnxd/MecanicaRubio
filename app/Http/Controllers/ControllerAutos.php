<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ControllerAutos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autos = DB::table('clients')
            ->join('autos', 'autos.client_id', 'clients.id')
            ->where('clients.status','Activo')
            ->get();

        # select brand, count(*) count from autos group by brand
        $statistics = DB::table('autos')
            ->select(DB::raw('count(*) as count, brand'))
            ->groupBy('brand')
            ->get();

        return view ('dashboard.autoslist', [
            'autos' => $autos,
            'statistics' => $statistics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.auto', [
            'brands'  => DB::table('brands')->orderBy('brand')->get(),
            'clients' => DB::table('clients')->where('status','Activo')->orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('autos')->insert([
            "brand" => $request->brand,
            "model" => $request->model,
            "year"  => $request->year,
            "plate" => $request->plate,
            "client_id"  => $request->client,
            "comments"   => $request->comments,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return to_route('autos.index')->with('message', 'Los datos se guardaron correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = DB::table('autos')
            ->join('clients','autos.client_id', 'clients.id')
            ->where('autos.id', $id)
            ->first();

        $services = DB::table('autos')
            ->join('services', 'services.car_id', 'autos.id')
            ->where('autos.id', $id)
            ->get();

        return view('dashboard.autoshow', [
            'services' => $services,
            'client'   => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auto = DB::table('autos')
            ->select('autos.*', 'clients.name')
            ->join('clients', 'autos.client_id','clients.id')
            ->where('autos.id', $id)
            ->first();

        return view('dashboard.autoedit', [
            'auto'    => $auto,
            'brands'  => array(),
            'clients' => array(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('autos')->where('id', $id)->update([
            "brand" => $request->brand,
            "model" => $request->model,
            "year"  => $request->year,
            "plate" => $request->plate,
            "comments" => $request->comments,
        ]);

        return to_route('autos.index')->with('message', 'Los datos se guardaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
