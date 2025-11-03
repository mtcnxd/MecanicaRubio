<?php

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\PayrollController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ExpensesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\QuotesController;

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


// Index for client frontend
Route::get('/', function(){
    return view('content');
});

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

Route::group(['controller' => LoginController::class], function() {
    Route::get('/admin', 'index')->name('login');
    Route::get('/register', 'register')->name('user.register');
    
    Route::post('/register', 'store')->name('user.store');
    Route::post('/admin', 'login');
    Route::post('/admin/logout', 'logout')->name('logout');
});

Route::group(['prefix' => 'client', 'middleware' => 'isAdmin'], function(){
    Route::resource('clientServices', App\Http\Controllers\Client\ServicesController::class)->only('index','show');
});

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function()
    {
        Route::resource('services', ServicesController::class);
        Route::resource('clients', ClientsController::class);
        Route::resource('cars', CarsController::class);
        Route::resource('employees', EmployeesController::class);
        Route::resource('quotes', QuotesController::class)->only('index','show');
        Route::resource('users', UsersController::class)->except('update','destroy');

        Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
        Route::get('dashboard', [ServicesController::class, 'dashboard'])->name('dashboard.index');
        Route::get('profile', [EmployeesController::class, 'profileIndex'])->name('profile.index');

        # Reports
        Route::get('reports/employees/{userid}', [EmployeesController::class, 'report'])->name('reports.employees');
        Route::get('reports/employees', [EmployeesController::class, 'report'])->name('reports.employees');
        Route::get('reports/balance', [ExpensesController::class, 'report'])->name('reports.balance');
        Route::get('reports/autos', [CarsController::class, 'report'])->name('reports.autos');

        Route::group(['prefix' => 'finance'], function()
        {
            Route::get('/ingress', [FinanceController::class, 'listOfIngress'])->name('finance.listOfIngress');
            Route::get('/finance/{client}', [FinanceController::class, 'show'])->name('finance');
            
            Route::resource('/payroll', PayrollController::class);
            Route::resource('/expenses', ExpensesController::class);
        }
);
        Route::post('admin/profile', [EmployeesController::class, 'profileUpdate'])->name('profile.update');

        Route::get('admin/settings', [SettingsController::class, 'index'])->name('setting.index');

        Route::post('admin/settings/create', [SettingsController::class, 'store'])->name('setting.store');
        
        Route::post('admin/settings', [SettingsController::class, 'update'])->name('setting.update');

        Route::get('admin/sendEmailInvoice/{service}', [ServicesController::class, 'sendEmailInvoice'])->name('sendEmailInvoice');
    }
);
