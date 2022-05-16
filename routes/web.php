<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\CustomersController;
use App\Models\Customer;
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
    Route::get("/addinvoice", [InvoicesController::class, "addInvoice"])->name("addInvoice");
    Route::get("/manageinvoices/{to?}/{from?}", [invoicesController::class, "manageInvoices"])->name("manageInvoices");
    Route::get("/addmedicine", [MedicinesController::class, "addMedicine"])->name("addMedicine");
    Route::post("/addmedicine", [MedicinesController::class, "storeMedicine"]);
    Route::post("/getavqty", [MedicinesController::class, "getAvQty"])->name("getQtymed");
    Route::post("/ismedexist", [MedicinesController::class, "isMedExist"]);
    Route::post("/getmedexpdates", [MedicinesController::class, "getMedExpDates"]);
    Route::post("/getmedprice", [MedicinesController::class, "getMedPrice"]);
    Route::post("/autocompletemed", [MedicinesController::class, "getAutoCompleteData"]);
    Route::post("/storeinvoice", [InvoicesController::class, "store"]);
    Route::post("/newcustomer", [CustomersController::class, "store"]);
    Route::get("/deleteinvoice/{id}", [InvoicesController::class, "destroy"]);
    Route::get("/getinvoiceitems/{id}", [InvoicesController::class, "getInvoiceItems"]);
    Route::get("/returnedmedicines", [invoicesController::class, "returnedMedicines"])->name("returnedMedicines");
    Route::middleware(['active:outside'])->get('/notactive', [HomeController::class, 'accountDisabled'])->name("notactive");
});

require __DIR__ . '/auth.php';
