<?php

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Cars;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Dashboard\Clients;
use App\Http\Controllers\Dashboard\Finance;
use App\Http\Controllers\Dashboard\Payroll;
use App\Http\Controllers\Dashboard\Calendar;
use App\Http\Controllers\Dashboard\Expenses;
use App\Http\Controllers\Dashboard\Services;
use App\Http\Controllers\Dashboard\Settings;
use App\Http\Controllers\Dashboard\EmployeesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\QuotesController;

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

// Login and registration routes
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google-redirect');
 
Route::get('/auth/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email'         => $googleUser->email,
        ], [
            'name'          => $googleUser->name,
            'avatar'        => $googleUser->avatar,
            'google_token'  => $googleUser->token,
            'google_userid' => $googleUser->id,
        ]);
    
        Auth::login($user);

        return to_route('services.index');
    }
    catch (Exception $err) {
        print_r(
            sprintf("Error: %s", $err->getMessage())
        );
    }
});

Route::get('admin', [Login::class, 'index'])->name('login');
Route::post('admin', [Login::class, 'login']);
Route::post('admin/logout', [Login::class, 'logout'])->name('logout');


Route::get('/', function(){
    return view('content');
});

Route::group(['prefix' => 'client'], function(){
    // Customer routes
});

Route::middleware(['auth'])->group( function ()
    {
        Route::group(['prefix' => 'admin'], function()
            {
                Route::resource('services', Services::class);
                Route::resource('clients', Clients::class);
                Route::resource('cars', Cars::class);
                Route::resource('expenses', Expenses::class);
                Route::resource('payroll', Payroll::class);
                Route::resource('employees', EmployeesController::class);
                Route::resource('quotes', QuotesController::class);
                Route::resource('users', UsersController::class);

                Route::get('calendar', [Calendar::class, 'index'])->name('calendar.index');
                Route::get('dashboard', [Services::class, 'dashboard'])->name('dashboard.index');
                Route::get('profile', [EmployeesController::class, 'profileIndex'])->name('profile.index');

                # Reports
                Route::get('reports/employees/{userid}', [EmployeesController::class, 'report'])->name('reports.employees');
                Route::get('reports/employees', [EmployeesController::class, 'report'])->name('reports.employees');
                Route::get('reports/balance', [Expenses::class, 'report'])->name('reports.balance');
                Route::get('reports/autos', [Cars::class, 'report'])->name('reports.autos');
                Route::get('finance/{client}', [Finance::class, 'show'])->name('finance');
            }
        );


        Route::post('admin/profile', [EmployeesController::class, 'profileUpdate'])->name('profile.update');

        Route::get('admin/settings', [Settings::class, 'index'])->name('setting.index');

        Route::post('admin/settings', [Settings::class, 'update'])->name('setting.update');

        Route::post('admin/settings/create', [Settings::class, 'store'])->name('setting.store');

        Route::get('admin/sendEmailInvoice/{service}', [Services::class, 'sendEmailInvoice'])->name('sendEmailInvoice');
    }
);
