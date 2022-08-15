<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MobilController;
use App\Models\Kendaraan;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('kendaraan')->group(function () {
    Route::get('/', [KendaraanController::class, 'index']);
    // Route::post('/', [KendaraanController::class, 'store']);
});

Route::prefix('motor')->group(function () {
    Route::get('/', [MotorController::class, 'index']);
    Route::post('/', [MotorController::class, 'store']);
});

Route::prefix('mobil')->group(function () {
    Route::get('/', [MobilController::class, 'index']);
    Route::post('/', [MobilController::class, 'store']);
});

Route::get('stok-kendaraan', [KendaraanController::class, 'getStok']);

Route::post('penjualan', [KendaraanController::class, 'getStok']);
