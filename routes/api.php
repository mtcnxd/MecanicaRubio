<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAjax;
use App\Http\Controllers\Dashboard\Services;
use App\Http\Controllers\Dashboard\Clients;
use App\Http\Controllers\Dashboard\Employees;
use App\Http\Controllers\Dashboard\Cars;
use App\Http\Controllers\Dashboard\Payroll;

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
])->name('deleteUser');

Route::post('loadEmployee', [
    Employees::class, 'loadEmployee'
])->name('employees/load');

Route::post('createBrand', [
    Cars::class, 'createBrand'
])->name('createBrand');

Route::post('createModel', [
    Cars::class, 'createModel'
])->name('createModel');

Route::post('loadModels', [
    Cars::class, 'loadModels'
])->name('loadModels');

Route::post('manageSalaries', [
    Payroll::class, 'manageSalaries'
])->name('manageSalaries');

Route::post('addConcept', [
    Payroll::class, 'addConcept'
])->name('addConcept');

Route::post('deleteClient', [
    Clients::class, 'destroy'
])->name('deleteClient');

Route::post('getClientsList', [
    Clients::class, 'getClientsList'
])->name('getClientsList');

Route::post('createServicePDF', [
    Services::class, 'createServicePDF'
])->name('services.createServicePDF');

Route::post('searchPostcode', [
    ControllerAjax::class, 'searchPostcode'
])->name('searchPostcode');

Route::post('carsByClient', [
    ControllerAjax::class, 'carsByClient'
])->name('carsByClient');

Route::post('createItemInvoice', [
    ControllerAjax::class, 'createItemInvoice'
])->name('createItemInvoice');

Route::post('removeItemInvoice', [
    ControllerAjax::class, 'removeItemInvoice'
])->name('removeItemInvoice');

Route::post('searchPostalCode', [
    ControllerAjax::class, 'searchPostalCode'
])->name('searchPostalCode');

Route::post('loadEvent', [
    ControllerAjax::class, 'loadEvent'
])->name('loadEvent');

Route::get('getDataTableServices', [
    ControllerAjax::class, 'getDataTableServices'
])->name('getDataTableServices');

Route::get('getDataTableExpenses', [
    ControllerAjax::class, 'getDataTableExpenses'
])->name('getDataTableExpenses');

Route::post('markExpensesAsPaid', [
    ControllerAjax::class, 'markExpensesAsPaid'
])->name('markExpensesAsPaid');

Route::post('getImageAttached', [
    ControllerAjax::class, 'getImageAttached'
])->name('getImageAttached');

Route::post('removeItemExpense', [
    ControllerAjax::class, 'removeItemExpense'
])->name('removeItemExpense');