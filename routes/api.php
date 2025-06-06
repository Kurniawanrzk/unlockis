<?php

use App\Http\Controllers\Jadwal\JadwalController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Pemesanan\PemesananController;
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
Route::get('jadwal', [JadwalController::class, 'getJadwalBooking'])->name("jadwal");
Route::post("status_pembayaran", [PemesananController::class, 'ubahStatusPembayaran'])->name('status_pembayaran');
Route::post("servis/pemesanan/post", [PemesananController::class, 'formPemesananPost'])->name("form-pemesanan-post");
Route::post("chatbot", [MainController::class, 'chatbotAPI'])->name("chatbot-api");
