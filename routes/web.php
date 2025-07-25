<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FormController;
use App\Livewire\PenilaianComponent;

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// =========================

Route::get('/form', [FormController::class, 'showForm'])->name('form');
Route::post('/form/submit', [FormController::class, 'storeScore'])->name('storeScore');

Route::get('/', [ExpoController::class, 'scan']);
Route::get('/scan', [ExpoController::class, 'scan']);
Route::post('/absen', [ExpoController::class, 'absen']);
Route::get('/sertifikat/{hash}', [ExpoController::class, 'sertifikat'])->name('sertifikat');
Route::get('/admin', [ExpoController::class, 'admin']);
Route::get('/generateqrcode/{pesertaId}', [ExpoController::class, 'generateQRCode']);
Route::get('/sertifikat-saya', [ExpoController::class, 'sertifikatView']);
Route::post('/cek-sertifikat', [ExpoController::class, 'sertifikat'])->name('sertifikat-saya');

Route::get('/admin/kelompok/{id}/tampilkan', [ExpoController::class, 'tampilkanKelompok'])->name('admin.tampilkanKelompok');

Route::get('/penilaian', PenilaianComponent::class)->name('penilaian');
Route::get('/kontestan', [ExpoController::class, 'listKontestan'])->name('kontestan');
