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

Route::post('deleteUser', [
    Employees::class, 'destroy'
])->name('employees.deleteUser');

Route::post('loadEmployee', [
    Employees::class, 'loadEmployee'
])->name('employees.load');

Route::post('createBrand', [
    Cars::class, 'createBrand'
])->name('createBrand');

Route::post('createModel', [
    Cars::class, 'createModel'
])->name('createModel');

Route::post('loadModels', [
    Cars::class, 'loadModels'
])->name('loadModels');

Route::post('searchByClient', [
    Cars::class, 'searchByClient'
])->name('cars.searchByClient');

Route::post('manageSalaries', [
    Payroll::class, 'manageSalaries'
])->name('manageSalaries');

Route::post('addItem', [
    Payroll::class, 'addItem'
])->name('payroll.addItem');

Route::post('removeItem', [
    Payroll::class, 'removeItem'
])->name('payroll.removeItem');

Route::post('deleteClient', [
    Clients::class, 'destroy'
])->name('deleteClient');

Route::post('getClientsList', [
    Clients::class, 'getClientsList'
])->name('clients.getClientsList');

Route::post('searchByPostcode', [
    Clients::class, 'searchByPostcode'
])->name('clients.searchByPostcode');

Route::post('searchByAddress', [
    Clients::class, 'searchByAddress'
])->name('clients.searchByAddress');

Route::get('getDataTableServices', [
    Services::class, 'getDataTableServices'
])->name('getDataTableServices');

Route::post('createServicePDF', [
    Services::class, 'createServicePDF'
])->name('services.createServicePDF');

Route::post('getServiceItems', [
    Services::class, 'getServiceItems'
])->name('services.getServiceItems');

Route::post('getItemInformation', [
    Services::class, 'getItemInformation'
])->name('services.getItemInformation');

Route::post('closeMonth', [
    Finance::class, 'closeMonth'
]);

Route::post('createBalancePDF', [
    Finance::class, 'createBalancePDF'
])->name('finance.createBalancePDF');

Route::post('deleteItem', [
    Expenses::class, 'deleteItem'
])->name('expenses.deleteItem');

Route::post('getEvent', [
    Calendar::class, 'getEvent'
])->name('calendar.getEvent');

Route::post('arduinoPost', [
    Calendar::class, 'arduinoPost'
]);

Route::post('createItemInvoice', [
    ControllerAjax::class, 'createItemInvoice'
])->name('createItemInvoice');

Route::post('removeItemInvoice', [
    ControllerAjax::class, 'removeItemInvoice'
])->name('removeItemInvoice');

Route::post('getImageAttached', [
    ControllerAjax::class, 'getImageAttached'
])->name('getImageAttached');