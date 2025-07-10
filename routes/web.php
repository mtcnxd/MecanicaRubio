<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Dashboard\Cars;
use App\Http\Controllers\Dashboard\Clients;
use App\Http\Controllers\Dashboard\Services;
use App\Http\Controllers\Dashboard\Expenses;
use App\Http\Controllers\Dashboard\Payroll;
use App\Http\Controllers\Dashboard\Employees;
use App\Http\Controllers\Dashboard\Calendar;
use App\Http\Controllers\Dashboard\Finance;
use App\Http\Controllers\Dashboard\Settings;
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


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();
});


Route::get('/', function(){
    return view('content');
});

Route::get('admin', [Login::class, 'index'])->name('login');
Route::post('admin', [Login::class, 'login']);
Route::post('admin/logout', [Login::class, 'logout'])->name('logout');

Route::group(['prefix' => 'client'], function(){
    // Customer routes
});

Route::middleware(['auth'])->group( function ()
{
    Route::group(['prefix' => 'admin'], function(){
        
        Route::resource('services', Services::class);
        Route::resource('clients', Clients::class);
        Route::resource('cars', Cars::class);
        Route::resource('expenses', Expenses::class);
        Route::resource('payroll', Payroll::class);
        Route::resource('employees', Employees::class);        

        Route::get('quote', [Services::class, 'createQuote'])->name('quote.create');
        Route::get('calendar', [Calendar::class, 'index'])->name('calendar.index');
        Route::get('dashboard', [Services::class, 'dashboard'])->name('dashboard.index');
        Route::get('profile', [Employees::class, 'profileIndex'])->name('profile.index');

        # Reports
        Route::get('reports/employees/{userid}', [Employees::class, 'report'])->name('reports.employees');
        Route::get('reports/employees', [Employees::class, 'report'])->name('reports.employees');
        Route::get('reports/balance', [Expenses::class, 'report'])->name('reports.balance');
        Route::get('reports/autos', [Cars::class, 'report'])->name('reports.autos');
        Route::get('finance/{client}', [Finance::class, 'show'])->name('finance');

    });


    Route::post('admin/profile', [Employees::class, 'profileUpdate'])->name('profile.update');

    Route::get('admin/settings', [Settings::class, 'index'])->name('setting.index');

    Route::post('admin/settings', [Settings::class, 'update'])->name('setting.update');

    Route::post('admin/settings/create', [Settings::class, 'store'])->name('setting.store');

    Route::get('admin/sendEmailInvoice/{service}', [Services::class, 'sendEmailInvoice'])->name('sendEmailInvoice');

});
