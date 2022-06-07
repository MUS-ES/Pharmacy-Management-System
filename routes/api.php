<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\StockController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/signup", [AuthController::class, "signup"]);
Route::post("/signin", [AuthController::class, "signin"]);


Route::middleware('auth:sanctum')->group(function ()
{
    Route::post("/signout", [AuthController::class, "signout"]);
    Route::prefix("/medicine")->group(function ()
    {
        Route::get("/all", [MedicinesController::class, "all"]);
        Route::post("/add", [MedicinesController::class, "store"]);
        Route::post("/show", [MedicinesController::class, "show"]);
        Route::put("/modify", [MedicinesController::class, "modify"]);
        Route::delete("/delete", [MedicinesController::class, "destroy"]);
        Route::post("/exist", [MedicinesController::class, "isExist"]);
    });
    Route::prefix("/stock")->group(
        function ()
        {
            Route::post("/add", [StockController::class, "store"]);
            Route::post("/show", [StockController::class, "show"]);
            Route::delete("/delete", [StockController::class, "destroy"]);
        }
    );
    Route::prefix("/customer")->group(
        function ()
        {
            Route::post("/add", [CustomersController::class, "store"]);
            Route::put("/modify", [CustomersController::class, "modify"]);
            Route::delete("/delete", [CustomersController::class, "destroy"]);
        }
    );
    Route::prefix("/supplier")->group(function ()
    {

        Route::POST("/add", [SuppliersController::class, "store"]);
        Route::put("/modify", [SuppliersController::class, "modify"]);
        Route::POST("/delete", [SuppliersController::class, "destroy"]);
    });
    Route::prefix("/purchase")->group(function ()
    {

        Route::POST("/add", [PurchasesController::class, "store"]);
        Route::get("/items/{id}", [PurchasesController::class, "getPurchaseItems"]);
        Route::delete("/delete", [PurchasesController::class, "destroy"]);
    });

    Route::prefix("/invoice")->group(
        function ()
        {
            Route::post("/add", [InvoicesController::class, "store"]);
            Route::get("/add", [InvoicesController::class, "addInvoice"]);
            Route::get("/items/{id}", [InvoicesController::class, "getInvoiceItems"]);
            Route::delete("/delete", [InvoicesController::class, "destroy"]);
        }
    );
});


Route::get("tokens/{id}", function ($id)
{
    $tokens = User::find($id)->tokens;
    return ['token' => $tokens];
});
