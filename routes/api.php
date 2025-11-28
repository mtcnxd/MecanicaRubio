<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Bitso;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAjax;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\QuotesController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\PayrollController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Api\{
    Employee
};

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

// Employees
Route::group(['prefix' => 'employees_api', 'controller' => Employee::class], function(){
    Route::get('all', 'loadAll')->name('employees.load.all'); 
    Route::get('delete', 'delete')->name('employees.delete');
});

Route::group(['prefix' => 'employees', 'controller' => EmployeesController::class], function () {
    Route::post('vacations/create', 'createPendindVacationDay')->name('employees.vacations.create');
    Route::get('vacations/cancell', 'cancellPendingVacationDay')->name('employees.vacations.cancell');
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

Route::post('createItemInvoice', [ServicesController::class, 'createItemInvoice'])->name('createItemInvoice');

Route::post('removeItemInvoice', [ServicesController::class, 'removeItemInvoice'])->name('removeItemInvoice');

Route::post('/finance/close', [FinanceController::class, 'close'])->name('finance.close');

Route::post('createBalancePDF', [FinanceController::class, 'createBalancePDF'])->name('finance.createBalancePDF');

Route::post('deleteItem', [ExpensesController::class, 'deleteItem'])->name('expenses.deleteItem');

Route::post('getEvent', [CalendarController::class, 'getEvent'])->name('calendar.getEvent');

Route::post('getImageAttached', [ExpensesController::class, 'getImageAttached'])->name('getImageAttached');

Route::get('/bitso/destroy', [Bitso::class, 'destroy'])->name('bitso.destroy');