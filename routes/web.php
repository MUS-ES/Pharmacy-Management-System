<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UsersController::class, 'signin'])->middleware("guest");



Route::middleware(['auth'])->group(function ()
{
    Route::middleware(['active:inside'])->group(function ()
    {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });
    Route::post("/chart", [DashboardController::class, "getChartData"]);
    Route::get("/manageinvoices", [invoicesController::class, "manageInvoices"])->name("manageInvoices");
    Route::get("/addinvoice", [invoicesController::class, "addInvoice"])->name("addInvoice");
    Route::get("/returnedmedicines", [invoicesController::class, "returnedMedicines"])->name("returnedMedicines");
    Route::middleware(['active:outside'])->get('/notactive', [HomeController::class, 'accountDisabled'])->name("notactive");
});

require __DIR__ . '/auth.php';
