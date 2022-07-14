<?php


use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuppliersController;

use App\Http\Controllers\VouchersController;

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
            Route::get("/add", [InvoicesController::class, "add"]);
            Route::get("/manage", [invoicesController::class, "manage"]);
            Route::post("/search", [invoicesController::class, "search"]);
            Route::get("/items/{id}", [InvoicesController::class, "getInvoiceItems"]);
            Route::delete("/delete", [InvoicesController::class, "destroy"])->name("deleteinvoice");
        }
    );
    Route::prefix("/medicine")->group(function ()
    {
        Route::get("/add", [MedicinesController::class, "add"]);
        Route::get("/manage", [MedicinesController::class, "manage"]);
        Route::post("/add", [MedicinesController::class, "store"]);
        Route::post("/show", [MedicinesController::class, "show"]);
        Route::delete("/delete", [MedicinesController::class, "destroy"]);
        Route::POST("/search", [MedicinesController::class, "search"]);
        Route::post("/exist", [MedicinesController::class, "isExist"]);
    });
    Route::prefix("/stock")->group(
        function ()
        {
            Route::get("/manage", [StockController::class, "manage"]);
            Route::post("/show", [StockController::class, "show"]);
            Route::Post("/search", [StockController::class, "search"]);
            Route::Post("/add", [StockController::class, "store"]);
            Route::delete("/delete", [StockController::class, "destroy"]);
        }
    );
    Route::prefix("/ajax")->group(function ()
    {
        Route::post("/chart", [AjaxController::class, "getChartData"]);
        Route::prefix("/popup")->group(function ()
        {

            Route::POST("/feedback", [AjaxController::class, "getFeedbackComponent"]);
            Route::POST("/confirm", [AjaxController::class, "getConfirmComponent"]);
            Route::POST("/customer/add", [AjaxController::class, "getCustomerNewEntryComponent"]);
            Route::POST("/medicine/add", [AjaxController::class, "getMedicineNewEntryComponent"]);
            Route::POST("/stock/add", [AjaxController::class, "getStockNewEntryComponent"]);
            Route::POST("/supplier/add", [AjaxController::class, "getSupplierNewEntryComponent"]);
        });
        Route::post("/medicinesuggestions", [AjaxController::class, "getMedicineSuggestions"]);
        Route::post("/suppliersuggestions", [AjaxController::class, "getSupplierSuggestions"]);
        Route::post("/customersuggestions", [AjaxController::class, "getCustomerSuggestions"]);
    });
    Route::prefix("/customer")->group(
        function ()
        {
            Route::get("/add", [CustomersController::class, "add"]);
            Route::post("/add", [CustomersController::class, "store"]);
            Route::get("/manage", [CustomersController::class, "manage"]);
            Route::post("/search", [CustomersController::class, "search"]);
            Route::delete("/delete", [CustomersController::class, "destroy"])->name("deleteCustomers");
        }
    );
    Route::prefix("/supplier")->group(
        function ()
        {
            Route::get("/add", [SuppliersController::class, "add"]);
            Route::POST("/add", [SuppliersController::class, "store"]);
            Route::get("/manage", [SuppliersController::class, "manage"]);
            Route::post("/search", [SuppliersController::class, "search"]);
            Route::delete("/delete", [SuppliersController::class, "destroy"])->name("deleteSuppliers");
        }
    );


    Route::prefix("/voucher")->group(function ()
    {

        Route::GET("/add", [VouchersController::class, "add"]);
        Route::POST("/add", [VouchersController::class, "store"]);
        Route::GET("/manage", [VouchersController::class, "manage"]);
        Route::post("/search", [VouchersController::class, "search"]);
        Route::delete("/delete", [VouchersController::class, "destroy"]);
    });

    Route::prefix("/purchase")->group(function ()
    {

        Route::POST("/add", [PurchasesController::class, "store"]);
        Route::GET("/add", [PurchasesController::class, "add"]);
        Route::GET("/manage", [PurchasesController::class, "manage"]);
        Route::get("/items/{id}", [PurchasesController::class, "getPurchaseItems"]);
        Route::post("/search", [PurchasesController::class, "search"]);
        Route::delete("/delete", [PurchasesController::class, "destroy"]);
    });



    Route::get("/returnedmedicines", [invoicesController::class, "returnedMedicines"])->name("returnedMedicines");
    Route::middleware(['active:outside'])->get('/notactive', [HomeController::class, 'accountDisabled'])->name("notactive");
});

require __DIR__ . '/auth.php';
