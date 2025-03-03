<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAjax;
use App\Http\Controllers\ControllerServices;
use App\Http\Controllers\ControllerClients;
use App\Http\Controllers\ControllerEmployees;
use App\Http\Controllers\ControllerAutos;
use App\Http\Controllers\ControllerPayroll;

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
    ControllerEmployees::class, 'destroy'
])->name('deleteUser');

Route::post('loadEmployee', [
    ControllerEmployees::class, 'loadEmployee'
])->name('loadEmployee');

Route::post('createBrand', [
    ControllerAutos::class, 'createBrand'
])->name('createBrand');

Route::post('createModel', [
    ControllerAutos::class, 'createModel'
])->name('createModel');

Route::post('loadModels', [
    ControllerAutos::class, 'loadModels'
])->name('loadModels');

Route::post('manageSalaries', [
    ControllerPayroll::class, 'manageSalaries'
])->name('manageSalaries');

Route::post('addConcept', [
    ControllerPayroll::class, 'addConcept'
])->name('addConcept');

Route::post('searchPostcode', [
    ControllerAjax::class, 'searchPostcode'
])->name('searchPostcode');

Route::post('carsByClient', [
    ControllerAjax::class, 'carsByClient'
])->name('carsByClient');

Route::post('deleteClient', [
    ControllerClients::class, 'destroy'
])->name('deleteClient');

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

Route::post('downloadPDF', [
    ControllerServices::class, 'downloadPDF'
])->name('downloadPDF');