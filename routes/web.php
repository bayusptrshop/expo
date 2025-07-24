<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FormController;

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// =========================

Route::get('/form', [FormController::class, 'showForm'])->name('form');
Route::post('/form/submit', [FormController::class, 'storeScore'])->name('storeScore');

Route::get('/', [ExpoController::class, 'scan']);
Route::post('/absen', [ExpoController::class, 'absen']);
Route::get('/penilaian/{hash}', [ExpoController::class, 'penilaian']);
Route::post('/penilaian', [ExpoController::class, 'submitPenilaian']);
Route::get('/sertifikat/{hash}', [ExpoController::class, 'sertifikat'])->name('sertifikat');
Route::get('/admin', [ExpoController::class, 'admin']);
Route::get('/generateqrcode/{pesertaId}', [ExpoController::class, 'generateQRCode']);
Route::get('/sertifikat-saya', [ExpoController::class, 'sertifikatView']);
Route::post('/cek-sertifikat', [ExpoController::class, 'sertifikat'])->name('sertifikat-saya');
