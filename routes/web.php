<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExpoController::class, 'home']);
Route::get('/scan', [ExpoController::class, 'scan']);
Route::post('/absen', [ExpoController::class, 'absen']);
Route::get('/penilaian/{hash}', [ExpoController::class, 'penilaian']);
Route::post('/penilaian', [ExpoController::class, 'submitPenilaian']);
Route::get('/sertifikat/{hash}', [ExpoController::class, 'sertifikat']);
Route::get('/admin', [ExpoController::class, 'admin']);
