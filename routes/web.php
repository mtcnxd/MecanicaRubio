<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Cars;
use App\Http\Controllers\Dashboard\Clients;
use App\Http\Controllers\Dashboard\Services;
use App\Http\Controllers\Dashboard\Expenses;
use App\Http\Controllers\Dashboard\Payroll;
use App\Http\Controllers\Dashboard\Employees;
use App\Http\Controllers\Dashboard\Calendar;
use App\Http\Controllers\Dashboard\Finance;
use App\Http\Controllers\Dashboard\Settings;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth\Login;
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

Route::get('login', [Login::class, 'index'])->name('login');
Route::post('login', [Login::class, 'login']);
Route::post('logout', [Login::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group( function ()
{
    Route::resource('clients', Clients::class);

    Route::resource('cars', Cars::class);

    Route::resource('services', Services::class);

    Route::resource('expenses', Expenses::class);

    Route::resource('payroll', Payroll::class);

    Route::resource('employees', Employees::class);

    Route::get('calendar', [Calendar::class, 'index'])->name('calendar.index');

    Route::get('dashboard', [Services::class, 'dashboard'])->name('dashboard.index');

    Route::get('profile', [Employees::class, 'profileIndex'])->name('profile.index');

    Route::post('profile', [Employees::class, 'profileUpdate'])->name('profile.update');

    Route::get('setting', [Settings::class, 'index'])->name('setting.index');

    Route::post('setting', [Settings::class, 'update'])->name('setting.update');

    Route::get('emailInvoice/{serviceid}', [Services::class, 'sendMail'])->name('sendMail');

    # Reports
    Route::get('reports/employees/{userid}', [Employees::class, 'report'])->name('reports.employees');
    
    Route::get('reports/employees', [Employees::class, 'report'])->name('reports.employees');

    Route::get('reports/balance', [Expenses::class, 'report'])->name('reports.balance');
    
    Route::get('reports/autos', [Cars::class, 'report'])->name('reports.autos');
    
    Route::get('finance/{client}', [Finance::class, 'show'])->name('finance');

});
