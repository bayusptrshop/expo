<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExpoController::class, 'home']);
Route::get('/scan', [ExpoController::class, 'scan']);
Route::post('/absen', [ExpoController::class, 'absen']);
Route::get('/penilaian/{hash}', [ExpoController::class, 'penilaian']);
Route::post('/penilaian', [ExpoController::class, 'submitPenilaian']);
Route::get('/sertifikat/{hash}', [ExpoController::class, 'sertifikat'])->name('sertifikat');
Route::get('/admin', [ExpoController::class, 'admin']);
Route::get('/generateqrcode/{pesertaId}', [ExpoController::class, 'generateQRCode']);
Route::get('/sertifikat-saya', [ExpoController::class, 'sertifikatView']);
Route::post('/cek-sertifikat', [ExpoController::class, 'sertifikat'])->name('sertifikat-saya');
