<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ControllerCharts;
use App\Http\Controllers\Helpers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use PDF;
use DB;

class ControllerServices extends Controller
{
    public function index()
    {
        $services = DB::table('services')
            ->select('services.*', 'autos.brand', 'autos.model', 'clients.name')
            ->join('autos', 'services.car_id', 'autos.id')
            ->join('clients', 'services.client_id', 'clients.id')
            ->get();

        dd($services);

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        try {
            Helpers::sendWhatsapp();
        } catch(Exception $err){
            session()->flash('title','Error message');
            session()->flash('message', $err->getMessage());
        }
        */

        return view('dashboard.services.create', [
            'clients' => DB::table('clients')->where('status','Activo')->orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serviceId = DB::table('services')->insertGetId([
            "client_id"  => $request->client,
            "car_id"     => $request->car,
            "odometer"   => $request->odometer,
            "fault"      => $request->fault,
            "comments"   => $request->comments,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        Helpers::sendTelegram(
            sprintf("Service created: %s Reported fail: %s", $serviceId, $request->fault)
        );

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

        return view('dashboard.services.show', compact('service','items'));
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

    public function dashboard()
    {
        $services = DB::table('services_view')
            ->select(DB::raw('sum(price) as price, car'))
            ->join('services_items','services_view.id','services_items.service_id')
            ->where('services_items.labour', true)
            ->where('services_view.status', 'Entregado')
            ->whereBetween('created_at', [Carbon::now()->format('Y-m-01'), Carbon::now()])
            ->groupBy('services_view.car')
            ->get();

        $expenses = DB::table('expenses')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->get();

        $salaries = DB::table('salaries')
            ->where('status','Pagado')
            ->whereBetween('created_at', [Carbon::now()->format('Y-m-01'), Carbon::now()])
            ->get();

        return view('dashboard.index',[
            'services' => $services,
            'expenses' => $expenses,
            'salaries' => $salaries,
            'servicesChart' => ControllerCharts::getServicesChart(),
            'incomesChart'  => ControllerCharts::getIncomeChart(),
        ]);        
    }

    public function sendMail()
    {
        $service = DB::table('services')
        ->join('clients', 'services.client_id', 'clients.id')
        ->where('services.id', $serviceid)
        ->first();

        $items = DB::table('services_items')
            ->where('service_id', $serviceid)
            ->get();

        $mailResponse = Mail::to($service->email)->send(
            new emailInvoice($service, $items)
        );
        
        return to_route('services.show', $serviceid);
    }
}
