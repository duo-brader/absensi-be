    <?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\admin\AbsenController as AdminAbsenController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaktuController;
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
        Route::post("/logout", [AuthController::class, "Logout"])->middleware("auth:sanctum");
    });

    Route::middleware("auth:sanctum")->group(function () {
        Route::get("/user", [UserController::class, "index"]);
        Route::get("/profile", [AuthController::class, "authUser"]);
        Route::get("/kelas", [KelasController::class, "index"]);
        Route::get("/kelas/{id}", [KelasController::class, "show"]);
        Route::post("/kelas", [KelasController::class, "store"]);
        Route::put("/kelas/{id}", [KelasController::class, "edit"]);
        Route::delete("/kelas/{id}", [KelasController::class, "destroy"]);
        Route::post("/absen/{kelas:id}", [AbsenController::class, "store"]);
        Route::get("/absen", [AbsenController::class, "index"]);
        Route::post("/mapel", [MapelController::class, "store"]);
        Route::get("/mapel", [MapelController::class, "index"]);
        Route::get("/mapel/{id}", [MapelController::class, "show"]);
        Route::put("/mapel/{id}", [MapelController::class, "edit"]);
        Route::delete("/mapel/{id}", [MapelController::class, "destroy"]);

        Route::prefix("/admin")->group(function () {
            Route::get("/absen", [AdminAbsenController::class, "index"]);
            Route::get("/jurusan", [JurusanController::class, "index"]);
            Route::get("/mapel", [MapelController::class, "index"]);
            Route::get("/roles", [AuthController::class, "indexRoles"]);
            Route::get("/waktu", [WaktuController::class, "index"]);
            Route::get("/absens", [AdminAbsenController::class, "indexAbsen"]);
            Route::get("/user/{id}", [AdminUserController::class, "show"]);
            Route::put("/user/{id}", [AdminUserController::class, "update"]);
            Route::delete("/user/{id}", [AdminUserController::class, "destory"]);
        });
    });
});