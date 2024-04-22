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
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('index');
});

Route::get('profile', function (){
    $employees = DB::table('employees')->orderBy('name')->get();

    return view('dashboard.profile')->with('employees', $employees);
})->name('profile');

Route::get('calendar', [ControllerCalendar::class, 'index'])->name('calendar');

Route::get('dashboard', function() 
{
    $services = DB::table('services_view')
        ->join('services_items','services_view.id','services_items.service_id')
        ->where('services_items.labour', true)
        ->where('services_view.status', 'Entregado')
        ->get();

    $expenses = DB::table('expenses')
        ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])
        ->get();

    return view('dashboard.index',[
        'services' => $services,
        'expenses' => $expenses,
        'servicesChart' => ControllerCharts::getServicesChart(),
    ]);
})->name('dashboard');

Route::resource('clients', ControllerClients::class);

Route::resource('autos', ControllerAutos::class);

Route::resource('services', ControllerServices::class);

Route::resource('expenses', ControllerExpenses::class);

Route::resource('payroll', ControllerPayroll::class);

Route::post('employees', [ControllerEmployees::class, 'store'])->name('employees.store');

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