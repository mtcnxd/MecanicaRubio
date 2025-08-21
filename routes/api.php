<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAjax;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\PayrollController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\Admin\EmployeesController;

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
    Route::post('load', [EmployeesController::class, 'loadEmployee'])->name('employees.load'); 

    Route::post('delete', [EmployeesController::class, 'destroy'])->name('employees.delete');
});

Route::group(['prefix' => 'cars', 'controller' => CarsController::class], function () {
    Route::post('createBrand', 'createBrand')->name('createBrand');
    Route::post('createModel', 'createModel')->name('createModel');
    Route::post('loadModels', 'loadModels')->name('loadModels');
    Route::post('searchByClient', 'searchByClient')->name('cars.searchByClient'); 
    Route::get('SearchCar', 'SearchCar')->name('cars.SearchCar');
});

// Payrolls
Route::group(['controller' => PayrollController::class], function() {
    Route::post('manageSalaries', 'manageSalaries')->name('manageSalaries');
    Route::post('addItem', 'addItem')->name('payroll.addItem');
    Route::post('removeItem', 'removeItem')->name('payroll.removeItem');
});

// Clients
Route::controller(ClientsController::class)->group(function () {
    Route::post('deleteClient', 'destroy')->name('clients.deleteClient');
    Route::post('searchByPostcode', 'searchByPostcode')->name('clients.searchByPostcode');    
    Route::post('searchByAddress', 'searchByAddress')->name('clients.searchByAddress');    
    
    Route::get('getClientsList', 'getClientsList')->name('clients.getClientsList');
});

// Services
Route::group(['controller' => ServicesController::class], function(){    
    Route::post('createServicePDF', 'createServicePDF')->name('services.createServicePDF');
    Route::post('getItemInformation', 'getItemInformation')->name('services.getItemInformation');

    Route::get('getServiceItems', 'getServiceItems')->name('services.getServiceItems');
    Route::get('getDataTableServices', 'getDataTableServices')->name('getDataTableServices');
    
    Route::get('/changeQuoteToService', 'changeQuoteToService')->name('services.change.quote');
});


Route::post('/finance/close', [FinanceController::class, 'close'])->name('finance.close');

Route::post('createBalancePDF', [FinanceController::class, 'createBalancePDF'])->name('finance.createBalancePDF');

Route::post('deleteItem', [ExpensesController::class, 'deleteItem'])->name('expenses.deleteItem');

Route::post('getEvent', [CalendarController::class, 'getEvent'])->name('calendar.getEvent');

Route::post('createItemInvoice', [ControllerAjax::class, 'createItemInvoice'])->name('createItemInvoice');

Route::post('getImageAttached', [ControllerAjax::class, 'getImageAttached'])->name('getImageAttached');

Route::post('removeItemInvoice', [ControllerAjax::class, 'removeItemInvoice'])->name('removeItemInvoice');

Route::post('createItemQuote', [ControllerAjax::class, 'createItemQuote'])->name('createItemQuote'); 
