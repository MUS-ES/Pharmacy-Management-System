<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminSessionController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuppliersController;
use App\Models\Customer;
use App\View\Components\Feedback;
use App\View\Components\Nav;
use Illuminate\Http\Request;
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


    Route::prefix("/invoice")->group(
        function ()
        {
            Route::post("/add", [InvoicesController::class, "store"]);
            Route::get("/add", [InvoicesController::class, "addInvoice"]);
            Route::get("/manage", [invoicesController::class, "manageInvoices"]);
            Route::post("/search", [invoicesController::class, "searchInvoices"]);
            Route::get("/items/{id}", [InvoicesController::class, "getInvoiceItems"]);
            Route::delete("/delete", [InvoicesController::class, "destroy"])->name("deleteinvoice");
        }
    );
    Route::prefix("/medicine")->group(function ()
    {
        Route::get("/add", [MedicinesController::class, "addMedicine"]);
        Route::post("/add", [MedicinesController::class, "storeMedicine"]);
        Route::get("/manage", [MedicinesController::class, "manageMedicine"]);
        Route::POST("/search", [MedicinesController::class, "searchMedicines"]);
        Route::post("/exist", [MedicinesController::class, "isExist"]);
        Route::post("/qty", [MedicinesController::class, "getAvailableQuantity"]);
        Route::post("/exp", [MedicinesController::class, "getMedicineExpiryDates"]);
        Route::post("/price", [MedicinesController::class, "getMedicinePrice"]);
    });
    Route::prefix("/stock")->group(
        function ()
        {
            Route::get("/manage", [StockController::class, "manage"]);
            Route::Post("/search", [StockController::class, "search"]);
            Route::Post("/add", [StockController::class, "store"]);
        }
    );
    Route::prefix("/ajax")->group(function ()
    {
        Route::post("/chart", [AjaxController::class, "getChartData"]);
        Route::prefix("/popup")->group(function ()
        {

            Route::POST("/feedback", [AjaxController::class, "getFeedbackComponent"]);
            Route::POST("/customer/add", [AjaxController::class, "getCustomerNewEntryComponent"]);
            Route::POST("/medicine/add", [AjaxController::class, "getMedicineNewEntryComponent"]);
            Route::POST("/stock/add", [AjaxController::class, "getStockNewEntryComponent"]);
            Route::POST("/supplier/add", [AjaxController::class, "getSupplierNewEntryComponent"]);
        });
        Route::post("/medicineautocomplete", [AjaxController::class, "getAutoCompleteMedicine"]);
    });
    Route::prefix("/customer")->group(function ()
    {

        Route::POST("/add", [CustomersController::class, "store"]);
    });
    Route::prefix("/supplier")->group(function ()
    {

        Route::POST("/add", [SuppliersController::class, "store"]);
    });





    //here

    Route::get("/returnedmedicines", [invoicesController::class, "returnedMedicines"])->name("returnedMedicines");
    Route::middleware(['active:outside'])->get('/notactive', [HomeController::class, 'accountDisabled'])->name("notactive");
});

require __DIR__ . '/auth.php';
