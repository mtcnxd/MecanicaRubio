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
    return view('content');
});

Route::get('admin/login', [Login::class, 'index'])->name('login');
Route::post('admin/login', [Login::class, 'login']);
Route::post('admin/logout', [Login::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group( function ()
{
    Route::resource('admin/clients', Clients::class);

    Route::resource('admin/cars', Cars::class);

    Route::resource('admin/services', Services::class);

    Route::resource('admin/expenses', Expenses::class);

    Route::resource('admin/payroll', Payroll::class);

    Route::resource('admin/employees', Employees::class);

    Route::get('admin/calendar', [Calendar::class, 'index'])->name('calendar.index');

    Route::get('admin/dashboard', [Services::class, 'dashboard'])->name('dashboard.index');

    Route::get('admin/profile', [Employees::class, 'profileIndex'])->name('profile.index');

    Route::post('admin/profile', [Employees::class, 'profileUpdate'])->name('profile.update');

    Route::get('admin/settings', [Settings::class, 'index'])->name('setting.index');

    Route::post('admin/settings', [Settings::class, 'update'])->name('setting.update');

    Route::post('admin/settings/create', [Settings::class, 'store'])->name('setting.store');

    Route::get('admin/sendEmailInvoice/{service}', [Services::class, 'sendEmailInvoice'])->name('sendEmailInvoice');

    # Reports
    Route::get('admin/reports/employees/{userid}', [Employees::class, 'report'])->name('reports.employees');
    
    Route::get('admin/reports/employees', [Employees::class, 'report'])->name('reports.employees');

    Route::get('admin/reports/balance', [Expenses::class, 'report'])->name('reports.balance');
    
    Route::get('admin/reports/autos', [Cars::class, 'report'])->name('reports.autos');
    
    Route::get('admin/finance/{client}', [Finance::class, 'show'])->name('finance');

});
