<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients;
use App\Http\Controllers\Cars;
use App\Http\Controllers\Services;
use App\Http\Controllers\Expenses;
use App\Http\Controllers\Payroll;
use App\Http\Controllers\Employees;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Dashboard\Finance;
use App\Http\Controllers\Dashboard\Setting;
use App\Http\Controllers\Calendar;
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


Route::get('/', function(){
    return to_route("login");
});

Route::get('login', [Login::class, 'showLogin'])->name('login');
Route::post('login', [Login::class, 'login']);
Route::post('logout', [Login::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group( function ()
{
    Route::resource('clients', Clients::class);

    Route::resource('autos', Cars::class);

    Route::resource('services', Services::class);

    Route::resource('expenses', Expenses::class);

    Route::resource('payroll', Payroll::class);

    Route::resource('employees', Employees::class);

    Route::get('dashboard', [Services::class, 'dashboard'])->name('dashboard');    

    Route::get('calendar', [Calendar::class, 'index'])->name('calendar.index');

    Route::get('profile', [Employees::class, 'profileIndex'])->name('profile');

    Route::get('emailInvoice/{serviceid}', [Services::class, 'sendMail'])->name('sendMail');

    Route::post('profile', [Employees::class, 'profileUpdate'])->name('profileUpdate');

    Route::get('configuration', [Setting::class, 'index'])->name('config.index');

    Route::post('configuration', [Setting::class, 'store'])->name('config.store');

    # Reports
    Route::get('reports/employees/{userid}', [Employees::class, 'report'])->name('reports.employees');
    
    Route::get('reports/employees', [Employees::class, 'report'])->name('reports.employees');

    Route::get('reports/balance', [Expenses::class, 'report'])->name('reports.balance');
    
    Route::get('reports/autos', [Cars::class, 'report'])->name('reports.autos');
    
    Route::get('finance/{client}', [Finance::class, 'show'])->name('finance');

});
