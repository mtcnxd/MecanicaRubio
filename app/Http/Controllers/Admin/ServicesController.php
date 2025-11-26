<?php

namespace App\Http\Controllers\Admin;

use DB;
use PDF;
use Mail;
use Carbon\Carbon;
use App\Models\{
    Client, Service, ServiceItems
};

use Illuminate\Http\Request;
use App\Mail\SendEmailInvoice;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Notifications\Telegram;
use App\Http\Controllers\Admin\ChartsController;

class ServicesController extends Controller
{
    public function index()
    {
        // Server side processing
        return view('admin.services.index');
    }

    public function create(Client $clients)
    {
        return view('admin.services.create', 
            compact('clients')
        );
    }

    public function store(Request $request, Telegram $telegram)
    {
        $isQuote = isset($request->quote) ? true :false;
        
        $request->merge([
            'quote' => $isQuote,
        ]);
        
        Service::create($request->except('_token'));

        if (!$isQuote){
            try {
                $latestServiceCreated = Service::latest()->first();

                $telegram->send(
                    sprintf("<b>New service created ID:</b> %s \n\r<b>Client name:</b> %s \n\r<b>Car model:</b> %s \n\r<b>Fault:</b> %s", 
                        $latestServiceCreated->id,
                        $latestServiceCreated->client->name,
                        $latestServiceCreated->car->carName(),
                        $latestServiceCreated->fault
                    )
                );

                session()->flash('success', 
                    sprintf("Servicio creado con folio: #%s", $latestServiceCreated->id)
                );
            }
            
            catch (\Exception $err){
                session()->flash('warning', 
                    sprintf("Ocurrio un error | Mensaje: %s", $err->getMessage())
                );
            }
        }

        return to_route('services.index');
    }

    public function show(string $id)
    {
        $service = Service::find($id);

        return view('admin.services.show', compact('service'));
    }

    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        $finishedDate = Carbon::now();

        if ($request->status == 'Entregado'){
            $finishedDate = isset($request->finished_date) ? $request->finished_date : Carbon::now();
        }
        
        $request->merge([
            'entry_date'    => isset($request->entry_date) ? Carbon::parse($request->entry_date) : null,
            'finished_date' => ($request->status == 'Entregado') ? Carbon::parse($finishedDate) : null,
        ]);

        try {
            $service->update($request->except('_token','_method'));
            
            session()->flash('success', 'Guardado con exito');
        }

        catch(\Exception $err){
            session()->flash('warning', 'Ocurrio un error | Mensaje: '. $err->getMessage());
        }

        if ($request->status == 'Entregado'){
            try {
                Telegram::send(
                    sprintf("<b>Service completed:</b> #%s - %s \n\r<b>Client:</b> %s \n\r<b>Fault:</b> %s \n\r<b>Total:</b> $%s", 
                        $service->id,
                        $service->car->brand ." ". $service->car->model,
                        $service->client->name,
                        $service->fault, 
                        number_format($request->total,2)
                    )
                );

                session()->flash('success', 'Guardado con exito');
            }
            
            catch (\Exception $err) {
                session()->flash('warning', 'Ocurrio un error | Mensaje: '. $err->getMessage());
            }
        }

        return to_route('services.index');
    }

    public function createServicePDF(Request $request)
    {
        $service = Service::find($request->serviceid);

        $path = public_path('images/mainlogo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $image = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);

        $pdf = PDF::loadView('admin.templates.pdf_invoice', [
            "title"   => 'COTIZACION',
            "service" => $service,
            "image"   => $base64,
        ]);
        
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

        catch (\Exception $err) {
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

        return \DataTables::of($servicesQuery)
            ->addColumn('service_id', function($service){
                return $service->service_id;
            })
            ->addColumn('fault', function($service){
                return '<a href="'. route("services.show", $service->service_id) .'">'. \Str::limit($service->fault, 32) ."</a>";
            })
            ->addColumn('entry_date', function($service){
                return Carbon::parse($service->entry_date)->format('j M Y');
            })
            ->addColumn('finished_date', function($service){
                if ($service->finished_date == null){
                    return null;
                }

                return Carbon::parse($service->finished_date)->format('j M Y');
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
