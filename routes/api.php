<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSanctumController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::resource("auth",ApiAuth::class);

Route::get("index",[ApiSanctumController::class,"index"])->middleware("auth:sanctum");

Route::get("login",[ApiSanctumController::class,"loginform"]);
Route::post("register",[ApiSanctumController::class,"store"]);
Route::post("login",[ApiSanctumController::class,"login"]);


Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post("logoutnow",[ApiSanctumController::class,"logout"]);
    Route::get("dashboard",[ApiSanctumController::class,"dashboardindex"]);
});

Route::group(['middleware'=>'auth:sanctum'],function(){
   Route::resource("product",ProductController::class); 
});