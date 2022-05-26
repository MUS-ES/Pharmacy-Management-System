<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\MedicinesController;

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

Route::middleware('auth:sanctum')->group(function ()
{

    Route::prefix("/medicine")->group(function ()
    {
        Route::post("/add", [MedicinesController::class, "store"]);
        Route::get("/all", [MedicinesController::class, "all"]);
        Route::post("/add", [MedicinesController::class, "store"]);
        Route::post("/show", [MedicinesController::class, "show"]);
        Route::delete("/delete", [MedicinesController::class, "destroy"]);
        Route::POST("/search", [MedicinesController::class, "search"]);
        Route::post("/exist", [MedicinesController::class, "isExist"]);
    });
});


Route::get("tokens/{id}", function ($id)
{
    $tokens = User::find($id)->tokens;
    return ['token' => $tokens];
});
