<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerClients;
use App\Http\Controllers\ControllerAutos;
use App\Http\Controllers\ControllerServices;
use App\Http\Controllers\ControllerExpenses;
use App\Http\Controllers\ControllerCalendar;
use App\Http\Controllers\ControllerCharts;

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

Route::get('profile', function () {
    return view('dashboard.profile');
})->name('profile');

Route::get('calendar', [ControllerCalendar::class, 'index'])->name('calendar');

Route::get('dashboard', function() 
{
    $services = DB::table('services_view')
        ->join('services_items','services_view.id','services_items.service_id')
        ->where('services_items.labour', true)
        ->where('services_view.status', 'Entregado')
        ->get();

    return view('dashboard.index',[
        'services' => $services,
        'expenses' => DB::table('expenses')->get(),
        'servicesChart' => ControllerCharts::getServicesChart(),
    ]);
})->name('dashboard');

Route::resource('clients', ControllerClients::class);

Route::resource('autos', ControllerAutos::class);

Route::resource('services', ControllerServices::class);

Route::resource('expenses', ControllerExpenses::class);