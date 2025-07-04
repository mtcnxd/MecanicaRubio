<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAjax;
use App\Http\Controllers\Dashboard\Services;
use App\Http\Controllers\Dashboard\Clients;
use App\Http\Controllers\Dashboard\Employees;
use App\Http\Controllers\Dashboard\Cars;
use App\Http\Controllers\Dashboard\Payroll;
use App\Http\Controllers\Dashboard\Finance;
use App\Http\Controllers\Dashboard\Expenses;
use App\Http\Controllers\Dashboard\Calendar;
use App\Http\Controllers\API\Clients as ApiClients;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['prefix' => 'employees'], function () {
    Route::post('load', [Employees::class, 'loadEmployee'])->name('employees.load'); 

    Route::post('delete', [Employees::class, 'destroy'])->name('employees.delete');
});

Route::group(['prefix' => 'cars'], function () {
    Route::post('createBrand', [Cars::class, 'createBrand'])->name('createBrand');

    Route::post('createModel', [Cars::class, 'createModel'])->name('createModel');

    Route::post('loadModels', [Cars::class, 'loadModels'])->name('loadModels');

    Route::post('searchByClient', [Cars::class, 'searchByClient'])->name('cars.searchByClient'); 
});

Route::post('manageSalaries', [Payroll::class, 'manageSalaries'])->name('manageSalaries');

Route::post('addItem', [Payroll::class, 'addItem'])->name('payroll.addItem');

Route::post('removeItem', [Payroll::class, 'removeItem'])->name('payroll.removeItem');

Route::controller(Clients::class)->group(function () {
    Route::post('deleteClient', 'destroy')->name('clients.deleteClient');
    
    Route::post('getClientsList', 'getClientsList')->name('clients.getClientsList');
    
    Route::post('searchByPostcode', 'searchByPostcode')->name('clients.searchByPostcode');
    
    Route::post('searchByAddress', 'searchByAddress')->name('clients.searchByAddress');    
});

// Services
Route::post('getServiceItems', [Services::class, 'getServiceItems'])->name('services.getServiceItems');

Route::get('getDataTableServices', [Services::class, 'getDataTableServices'])->name('getDataTableServices');

Route::post('createServicePDF', [Services::class, 'createServicePDF'])->name('services.createServicePDF');

Route::post('getItemInformation', [Services::class, 'getItemInformation'])->name('services.getItemInformation');

Route::post('closeMonth', [Finance::class, 'closeMonth'])->name('finance.closeMonth');

Route::post('createBalancePDF', [Finance::class, 'createBalancePDF'])->name('finance.createBalancePDF');

Route::post('deleteItem', [Expenses::class, 'deleteItem'])->name('expenses.deleteItem');

Route::post('getEvent', [Calendar::class, 'getEvent'])->name('calendar.getEvent');

Route::post('createItemInvoice', [ControllerAjax::class, 'createItemInvoice'])->name('createItemInvoice');

Route::post('getImageAttached', [ControllerAjax::class, 'getImageAttached'])->name('getImageAttached');

Route::post('createItemQuote', [ControllerAjax::class, 'createItemQuote'])->name('createItemQuote'); 

Route::post('removeItemInvoice', [ControllerAjax::class, 'removeItemInvoice'])->name('removeItemInvoice');