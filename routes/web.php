<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerClients;
use App\Http\Controllers\ControllerAutos;
use App\Http\Controllers\ControllerServices;
use App\Http\Controllers\ControllerExpenses;
use App\Http\Controllers\ControllerCalendar;
use App\Http\Controllers\ControllerPayroll;
use App\Http\Controllers\ControllerEmployees;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\FinanceController;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailInvoice;
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


Route::get('/print', function () {
    $service = DB::table('services')->where('id', 1)->first();
    $items   = DB::table('services_items')->where('service_id', 1)->get();
    $client  = DB::table('clients')->where('id', $service->client_id)->first();
    $auto    = DB::table('autos')->where('id', $service->car_id)->first();
    
    $data = [
        "service" => $service,
        "client"  => $client,
        "auto"    => $auto,
        "items"   => $items
        ];
        
    return view('dashboard.services.create_invoice', compact('client','service','items','auto'));
});


Route::get('/', function(){
    return to_route("login");
});

Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group( function ()
{
    Route::resource('clients', ControllerClients::class);

    Route::resource('autos', ControllerAutos::class);

    Route::resource('services', ControllerServices::class);

    Route::resource('expenses', ControllerExpenses::class);

    Route::resource('payroll', ControllerPayroll::class);

    Route::resource('employees', ControllerEmployees::class);

    Route::get('dashboard', [ControllerServices::class, 'dashboard'])->name('dashboard');    

    Route::get('calendar', [ControllerCalendar::class, 'index'])->name('calendar.index');

    Route::get('profile', [ControllerEmployees::class, 'profileIndex'])->name('profile');

    Route::post('profile', [ControllerEmployees::class, 'profileUpdate'])->name('profileUpdate');

    Route::get('emailInvoice/{serviceid}', [ControllerServices::class, 'sendMail'])->name('sendMail');    

    Route::get('reports/autos', [ControllerAutos::class, 'report'])->name('reports.autos');
    
    Route::get('finance/{client}', [FinanceController::class, 'show'])->name('finance');

    Route::get('dashboard/balance', [ControllerExpenses::class, 'loadBalance'])->name('balance');
});
