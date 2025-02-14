<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerClients;
use App\Http\Controllers\ControllerAutos;
use App\Http\Controllers\ControllerServices;
use App\Http\Controllers\ControllerExpenses;
use App\Http\Controllers\ControllerCalendar;
use App\Http\Controllers\ControllerCharts;
use App\Http\Controllers\ControllerPayroll;
use App\Http\Controllers\ControllerEmployees;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Mail;
use App\Models\Employee;
use App\Mail\emailInvoice;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/print', function () {
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
        
    return view('dashboard.services.create_invoice', compact('client','service','items','auto'));
});
*/

Route::get('/', function(){
    return to_route("login");
});

Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group( function ()
{
    Route::get('dashboard', function() 
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
    })->name('dashboard');

    Route::resource('clients', ControllerClients::class);

    Route::resource('autos', ControllerAutos::class);

    Route::resource('services', ControllerServices::class);

    Route::resource('expenses', ControllerExpenses::class);

    Route::resource('payroll', ControllerPayroll::class);

    Route::resource('employees', ControllerEmployees::class);

    Route::get('calendar', [ControllerCalendar::class, 'index'])->name('calendar.index');

    Route::get('emailInvoice/{serviceid}', function($serviceid)
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
    
    })->name('sendMail');    

    Route::get('/reports/autos', function(){
        $statistics = DB::table('autos')
            ->select(DB::raw('count(*) as count, brand'))
            ->groupBy('brand')
            ->get();
    
        return view('dashboard.autos.reports', compact('statistics'));
    
    })->name('/reports/autos');

    Route::get('profile', function () {
        $self = Employee::find(Auth::user()->id);
        return view('dashboard.profile', compact('self'));

    })->name('profile');

});
