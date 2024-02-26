<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerClients;
use App\Http\Controllers\ControllerAutos;
use App\Http\Controllers\ControllerServices;
use App\Http\Controllers\ControllerExpenses;
use App\Http\Controllers\ControllerCalendar;

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

Route::get('calendar', [ControllerCalendar::class, 'index'])->name('calendar');

Route::get('dashboard', function() {
    $services = DB::table('services')
        ->join('autos', 'services.car_id', 'autos.id')
        ->where('services.status', 'Entregado')
        ->get();


    return view('dashboard.index',[
        'services' => $services,
        'expenses' => DB::table('expenses')->get(),
    ]);
})->name('dashboard');

Route::resource('clients', ControllerClients::class);

Route::resource('autos', ControllerAutos::class);

Route::resource('services', ControllerServices::class);

Route::resource('expenses', ControllerExpenses::class);