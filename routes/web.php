<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSanctumController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("login",[ApiSanctumController::class,"index"])->name("auth.index");
Route::post("register",[ApiSanctumController::class,"store"]);
Route::post("login",[ApiSanctumController::class,"login"]);
Route::post("logout",[ApiSanctumController::class,"logout"])->middleware("auth:sanctum");