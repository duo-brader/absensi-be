<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("/v1")->group(function () {
    // auth aman
    Route::prefix("/auth")->group(function () {
        Route::post("/login", [AuthController::class, "Login"]);
        Route::post("/register", [AuthController::class, "Register"]);
        Route::post("/logout", [AuthController::class, "Logout"]);
    });

    Route::middleware("auth:sanctum")->group(function () {
        Route::get("/kelas", [KelasController::class, "index"]);
        Route::get("/kelas/{id}", [KelasController::class, "show"]);
        Route::post("/kelas", [KelasController::class, "store"]);
        Route::put("/kelas/{id}", [KelasController::class, "edit"]);
        Route::delete("/kelas/{id}", [KelasController::class, "delete"]);
        Route::post("/absen/{kelas:id}", [AbsenController::class, "store"]);
        Route::get("/absen", [AbsenController::class, "index"]);
        Route::post("/mapel", [MapelController::class, "store"]);
        Route::get("/mapel", [MapelController::class, "index"]);
    });
});