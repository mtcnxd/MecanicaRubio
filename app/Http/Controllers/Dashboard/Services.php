<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Dashboard\Charts;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use PDF;
use DB;

class Services extends Controller
{
    public function index()
    {
        $services = DB::table('services')
            ->select('services.*', 'autos.brand', 'autos.model', 'clients.name')
            ->join('autos', 'services.car_id', 'autos.id')
            ->join('clients', 'services.client_id', 'clients.id')
            ->get();

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = DB::table('clients')->where('status','Activo')->orderBy('name')->get();

        return view('dashboard.services.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $serviceId = DB::table('services')->insertGetId([
            "client_id"    => $request->client,
            "car_id"       => $request->car,
            "odometer"     => (isset($request->odometer)) ? str_replace([' ', ','], '', $request->odometer) : null,
            "fault"        => $request->fault,
            "service_type" => $request->type,
            "comments"     => $request->comments,
            "created_at"   => Carbon::now(),
            "updated_at"   => Carbon::now(),
        ]);

        Telegram::send(
            sprintf("<b>New service created:</b> %s", $request->fault)
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
        $currentData = DB::table('services')->where('id', $id)->first();

        if ($currentData->status == 'Entregado'){
            $dueDate = $currentData->due_date;
        } else {
            $dueDate = Carbon::now();
        }

        DB::table('services')->where('id', $id)->update([
            'total'    => $request->total,
            'notes'    => $request->notes,
            'status'   => $request->status,
            'odometer' => $request->odometer,
            'due_date' => ($request->status == 'Entregado') ? $dueDate : null,
            'created_at' => Carbon::parse($request->entry)
        ]);

        if ($request->status == 'Entregado'){
            Telegram::send(
                sprintf("<b>New job submission:</b> Service #%s <b>Total:</b> $%s", $id, $request->total)
            );
        }

        return to_route('services.index')->with('message', 'Guardado con exito');
    }

    public function createServicePDF(Request $request)
    {
        $service = DB::table('services')->where('id', $request->serviceid)->first();
        $items   = DB::table('services_items')->where('service_id', $request->serviceid)->get();
        $client  = DB::table('clients')->where('id', $service->client_id)->first();
        $auto    = DB::table('autos')->where('id', $service->car_id)->first();

        $path = public_path('images/mainlogo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $image = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);

        $data = [
            "service" => $service,
            "client"  => $client,
            "auto"    => $auto,
            "items"   => $items,
            "image"   => $base64
        ];

        $pdf = PDF::loadView('dashboard.services.create_invoice', $data);
        
        return $pdf->download('invoice.pdf');
    }

    public function dashboard()
    {
        $services = DB::table('services_view')
            ->select(DB::raw('sum(price) as price, car, due_date'))
            ->join('services_items','services_view.id','services_items.service_id')
            ->where('services_items.labour', true)
            ->where('services_view.status', 'Entregado')
            ->whereBetween('services_view.due_date', [Carbon::now()->format('Y-m-01'), Carbon::now()])
            ->groupBy('services_view.car','due_date')
            ->orderBy('services_view.due_date')
            ->get();

        $expenses = DB::table('expenses')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->get();

        $salaries = DB::table('salaries')
            ->where('status','Pagado')
            ->whereBetween('created_at', [Carbon::now()->format('Y-m-01'), Carbon::now()])
            ->get();

        return view('dashboard.dashboard',[
            'services' => $services,
            'expenses' => $expenses,
            'salaries' => $salaries,
            'servicesChart' => Charts::getServicesChart(),
            'incomesChart'  => Charts::getIncomeChart(),
        ]);        
    }

    public function sendMail($serviceid)
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
