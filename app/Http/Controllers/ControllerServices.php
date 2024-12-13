<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use DB;

class ControllerServices extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = DB::table('services')
            ->select('services.*', 'autos.brand', 'autos.model', 'clients.name')
            ->join('autos', 'services.car_id', 'autos.id')
            ->join('clients', 'services.client_id', 'clients.id')
            ->get();

        return view('dashboard.services.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create', [
            'clients' => DB::table('clients')->where('status','Activo')->orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('services')->insert([
            "client_id"  => $request->client,
            "car_id"     => $request->car,
            "odometer"   => $request->odometer,
            "fault"      => $request->fault,
            "comments"   => $request->comments,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        return to_route('services.index')->with('message', 'Los datos se guardaron con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = DB::table('services')
            ->select('services.*','autos.brand','autos.model','clients.name')
            ->join('autos', 'services.car_id', 'autos.id')
            ->join('clients', 'services.client_id', 'clients.id')
            ->where('services.id', $id)
            ->first();

        $items = DB::table('services_items')->where('service_id', $id)->get();

        return view('dashboard.services.show', [
            'service' => $service,
            'items'   => $items,
        ]);
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
        DB::table('services')->where('id', $id)->update([
            'total'    => $request->total,
            'notes'    => $request->notes,
            'status'   => $request->status,
            'due_date' => ($request->status == 'Entregado') ? Carbon::now() : null,
        ]);

        return to_route('services.index')->with('message', 'Guardado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function downloadPDF()
    {
        $service = DB::table('services')->where('id', 9)->first();
        $client  = DB::table('clients')->where('id', $service->client_id)->first();
        $auto    = DB::table('autos')->where('id', $service->car_id)->first();
        $items   = DB::table('services_items')->where('service_id', 9)->get();

        $data = [
            "service" => $service,
            "client"  => $client,
            "auto"    => $auto,
            "items"   => $items
        ];
        
        $pdf = PDF::loadView('dashboard.services.create_invoice', $data);
        
        return $pdf->download('invoice.pdf');
    }
}
