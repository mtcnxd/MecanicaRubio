<?php

namespace App\Http\Controllers\Admin;

use DB;
use PDF;
use Str;
use Mail;
use Exception;
use DataTables;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Service;
use App\Models\ServiceItems;
use Illuminate\Http\Request;
use App\Mail\SendEmailInvoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Admin\ChartsController;

class ServicesController extends Controller
{
    public function index()
    {
        $services = array();
        $clients  = Client::where('status','Activo')->orderBy('name')->get();

        return view('admin.services.index', compact('services', 'clients'));
    }

    public function create()
    {
        $clients = Client::where('status','Activo')
            ->orderBy('name')
            ->get();

        return view('admin.services.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $quote = false;
        
        if (isset($request->quote)){
            $quote = true;
        }

        $serviceId = Service::insertGetId([
            "client_id"    => $request->client,
            "car_id"       => $request->car,
            "odometer"     => isset($request->odometer) ? str_replace([' ', ','], '', $request->odometer) : null,
            "fault"        => $request->fault,
            "service_type" => $request->type,
            "quote"        => $quote,
            "comments"     => $request->comments,
            "entry_date"   => Carbon::now(),
            "created_at"   => Carbon::now(),
            "updated_at"   => Carbon::now(),
        ]);

        $servicesDetails = Service::find($serviceId);

        if (!$quote){
            try {
                Telegram::send(
                    sprintf("<b>New service created:</b> #%s - %s\n\r<b>Client:</b> %s  \n\r<b>Fault:</b> %s", 
                        $servicesDetails->id, 
                        $servicesDetails->car->brand ." ". $servicesDetails->car->model, 
                        $servicesDetails->client->name,
                        $servicesDetails->fault
                    )
                );
            }
            
            catch (Exception $err){
                session()->flash('warning', 'ERROR: '. $err->getMessage());
            }
        }

        return to_route('services.index')->with('success', 'Los datos se guardaron con exito');
    }

    public function show(string $id)
    {
        $service = Service::find($id);
        return view('admin.services.show', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $currentData = Service::find($id);

        if ($currentData->status == 'Entregado'){
            $finishedDate = isset($currentData->finished_date) ? $currentData->finished_date : Carbon::now();
        }
        
        else {
            $finishedDate = Carbon::now();
        }

        $currentData->update([
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
                    sprintf("<b>Service completed:</b> #%s - %s \n\r<b>Client:</b> %s \n\r<b>Fault:</b> %s \n\r<b>Total:</b> $%s", 
                        $currentData->id,
                        $currentData->car->brand ." ". $currentData->car->model,
                        $currentData->client->name,
                        $currentData->fault, 
                        number_format($request->total,2)
                    )
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

        $pdf = PDF::loadView('admin.templates.pdf_invoice', $data);
        
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

        return view('admin.services.dashboard',[
            'services' => $services,
            'expenses' => $expenses,
            'salaries' => $salaries,
            'servicesChart' => ChartsController::getServicesChart(),
            'incomesChart'  => ChartsController::getIncomeChart(),
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
        return Response()->json([
            "success" => true,
            "data"    => ServiceItems::findByCriteria($request->input('text'))
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

    public function changeQuoteToService(Request $request)
    {
        try {
            Service::where('id', $request->id)->update([
                'quote' => false
            ]);
        }

        catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => $err->getMessage(),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'La cotizacion es ahora un servicio',
        ]);
    }

    public function getDataTableServices(Request $request)
    {
        $servicesQuery = DB::table('services_view');

        if ($request->client != 'Todos') {
            $servicesQuery->where('client_id', [$request->client]);
        }

        if ($request->status != 'Todos') {
            $servicesQuery->where('status', $request->status);
        }

        $servicesQuery->orderBy('status', 'desc')->get();

        return DataTables::of($servicesQuery)
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
