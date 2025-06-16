<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Dashboard\Charts;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers;
use Illuminate\Http\Request;
use App\Mail\SendEmailInvoice;
use Carbon\Carbon;
use DataTables;
use Exception;
use Mail;
use Str;
use PDF;
use DB;

class Services extends Controller
{
    public function index()
    {
        $services = array();

        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        $clients = DB::table('clients')
            ->where('status','Activo')
            ->orderBy('name')
            ->get();

        return view('dashboard.services.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $serviceId = DB::table('services')->insertGetId([
            "client_id"    => $request->client,
            "car_id"       => $request->car,
            "odometer"     => (isset($request->odometer)) ? str_replace([' ', ','], '', $request->odometer) : null,
            "fault"        => $request->fault,
            "service_type" => $request->type,
            "comments"     => $request->comments,
            "entry_date"   => Carbon::now(),
            "created_at"   => Carbon::now(),
            "updated_at"   => Carbon::now(),
        ]);

        $servicesDetails = DB::table('services')
            ->join('autos','services.car_id','autos.id')
            ->where('services.id', $serviceId)
            ->first();

        $carName = $servicesDetails->brand ." ". $servicesDetails->model ." ". $servicesDetails->year ;

        try {
            Telegram::send(
                sprintf("<b>New service created:</b> #%s - %s <b>Fault:</b> %s", $serviceId, $carName , $request->fault)
            );
        } catch (Exception $err){
            session()->flash('warning', 'ERROR: '. $err->getMessage());
		}

        return to_route('services.index')->with('message', 'Los datos se guardaron con exito');
    }

    public function show(string $id)
    {
        $service = DB::table('services')
            ->select('services.*','autos.brand','autos.model','autos.year','clients.name')
            ->join('autos', 'services.car_id', 'autos.id')
            ->join('clients', 'services.client_id', 'clients.id')
            ->where('services.id', $id)
            ->first();

        $items = DB::table('services_items')->where('service_id', $id)->get();

        return view('dashboard.services.show', compact('service','items'));
    }

    public function update(Request $request, string $id)
    {
        $currentData = DB::table('services')->where('id', $id)->first();

        if ($currentData->status == 'Entregado'){
            $finishedDate = isset($currentData->finished_date) ? $currentData->finished_date : Carbon::now();
        } else {
            $finishedDate = Carbon::now();
        }

        DB::table('services')->where('id', $id)->update([
            "total"         => $request->total,
            "notes"         => $request->notes,
            "status"        => $request->status,
            "odometer"      => $request->odometer,
            "finished_date" => ($request->status == 'Entregado') ? $finishedDate : null,
            "entry_date"    => Carbon::parse($request->entry),
            "updated_at"    => Carbon::now()
        ]);

        if ($request->status == 'Entregado'){
            try {
                Telegram::send(
                    sprintf("<b>Service completed:</b> #%s - %s <b>Total:</b> $%s", $id, $currentData->fault, number_format($request->total,2))
                );
            } catch (Exception $err) {
                session()->flash('warning', 'ERROR: '. $err->getMessage());
            }
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

        $pdf = PDF::loadView('dashboard.templates.pdf_invoice', $data);
        
        return $pdf->download('invoice.pdf');
    }

    public function dashboard()
    {
        $services = DB::table('services_view')
            ->select(DB::raw('sum(price) as price, car, finished_date'))
            ->join('services_items','services_view.service_id','services_items.service_id')
            ->where('services_items.labour', true)
            ->where('services_view.status', 'Entregado')
            ->whereBetween('services_view.finished_date', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->groupBy('services_view.car','finished_date')
            ->orderBy('services_view.finished_date')
            ->get();

        $expenses = DB::table('expenses')
            ->whereBetween('expense_date', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->get();

        $salaries = DB::table('salaries')
            ->where('status','Pagado')
            ->whereBetween('paid_date', [Carbon::now()->startOfMonth(), Carbon::now()])
            ->get();

        return view('dashboard.dashboard',[
            'services' => $services,
            'expenses' => $expenses,
            'salaries' => $salaries,
            'servicesChart' => Charts::getServicesChart(),
            'incomesChart'  => Charts::getIncomeChart(),
        ]);        
    }

    public function sendEmailInvoice($id)
    {
        $service = DB::table('services')
            ->join('clients', 'services.client_id', 'clients.id')
            ->where('services.id', $id)
            ->first();

        $items = DB::table('services_items')
            ->where('service_id', $id)
            ->get();

        $response = Mail::to('mtc.nxd@gmail.com')->send(
            new SendEmailInvoice($service, $items)
        );
        
        return to_route('services.show', $id);
    }

    public function getServiceItems(Request $request)
    {
        $results = DB::table('services_items')
            ->select('item')
            ->where('item', 'like', '%'.$request->text.'%')
            ->groupBy('item')
            ->orderBy('item')
            ->get();

        return Response()->json([
            "success" => true,
            "data"    => $results
        ]);
    }

    public function getItemInformation(Request $request)
    {
        $data = DB::table('services_items')
            ->select('brand','model','supplier','services_items.price')
            ->join('services','services_items.service_id','services.id')
            ->join('autos','services.car_id', 'autos.id')
            ->where('item', $request->item)
            ->get();

        return response()->json([
            "success" => true,
            "data"    => $data
        ]);
    }

    public function createQuote(Request $request)
    {
        $client = null;
        $genericClientId = DB::table('settings')->where('name','genericClient')->first()->value;
        
        if (isset($genericClientId)){
            $client = DB::table('clients')->where('id', $genericClientId)->first();
        }

        return view('dashboard.services.quote', compact('client'));
    }

    public function getDataTableServices(Request $request)
    {
        if($request->startDate && $request->endDate){
            $serviceData = DB::table('services_view')
                ->whereBetween('entry_date', [$request->startDate, $request->endDate])
                ->limit(75)
                ->get();
        }

        if ($request->status != 'Todos'){
            $serviceData = DB::table('services_view')
                ->where('status', $request->status)
                ->get();
        }

        return DataTables::of($serviceData)
            ->addColumn('service_id', function($service){
                return $service->service_id;
            })
            ->addColumn('fault', function($service){
                return '<a href="'. route("services.show", $service->service_id) .'">'. Str::limit($service->fault, 32) ."</a>";
            })
            ->addColumn('entry_date', function($service){
                return Carbon::parse($service->entry_date)->format('d-m-Y');
            })
            ->addColumn('finished_date', function($service){
                if ($service->finished_date == null){
                    return null;
                }

                return Carbon::parse($service->finished_date)->format('d-m-Y');
            })
            ->addColumn('status', function($service){
                if ($service->status == 'Entregado'){
                    return '<span class="badge text-bg-success">'. $service->status .'</span>';
                }
                else if ($service->status == 'Cancelado' || $service->status == 'Esperando refaccion') {
                    return '<span class="badge text-bg-secondary">'. $service->status .'</span>';
                }
                else {
                    return '<span class="badge text-bg-warning">'. $service->status .'</span>';
                }
            })
            ->addColumn('total', function($service){
                return '$'.number_format($service->total, 2);
            })
            ->rawColumns(['fault','status'])
            ->make(true);
    }
}
