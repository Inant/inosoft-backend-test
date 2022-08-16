<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenjualanController;
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

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::group(['prefix' => 'kendaraan', 'middleware' => 'jwt.verify'],function () {
    Route::get('/', [KendaraanController::class, 'index']);
    Route::get('/{id}', [KendaraanController::class, 'show']);
});

Route::group(['prefix' => 'motor', 'middleware' => 'jwt.verify'],function () {
    Route::get('/', [MotorController::class, 'index']);
    Route::post('/', [MotorController::class, 'store'])->name('motor.store');
});

Route::group(['prefix' => 'mobil', 'middleware' => 'jwt.verify'],function () {
    Route::get('/', [MobilController::class, 'index']);
    Route::post('/', [MobilController::class, 'store'])->name('mobil.store');
});

Route::get('stok-kendaraan', [KendaraanController::class, 'getStok'])->middleware('jwt.verify')->name('stok-kendaraan');

Route::post('penjualan', [PenjualanController::class, 'store'])->middleware('jwt.verify')->name('penjualan.store');
Route::get('penjualan/laporan', [PenjualanController::class, 'laporan'])->middleware('jwt.verify')->name('penjualan.laporan');
