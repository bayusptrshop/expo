<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FormController;
use App\Livewire\PenilaianComponent;
use App\Http\Middleware\AuthMiddleware;
use App\Models\Peserta;
use Barryvdh\DomPDF\Facade as DomPDF;

// login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
// =========================

Route::get('/form', [FormController::class, 'showForm'])->name('form');
Route::post('/form/submit', [FormController::class, 'storeScore'])->name('storeScore');

Route::get('/scan', [ExpoController::class, 'scan']);
Route::get('/scanpost', [ExpoController::class, 'scan']);
Route::post('/absen', [ExpoController::class, 'absen']);
Route::get('/sertifikat/{hash}', [ExpoController::class, 'sertifikat'])->name('sertifikat');
// Route untuk verifikasi sertifikat
Route::get('/verify-sertifikat/{id}', [ExpoController::class, 'verifySertifikat'])->name('sertifikat.verify');
Route::get('/admin', [ExpoController::class, 'admin']);
Route::get('/generateqrcode/{pesertaId}', [ExpoController::class, 'generateQRCode']);
Route::get('/sertifikat-saya', [ExpoController::class, 'sertifikatView']);
Route::post('/cek-sertifikat', [ExpoController::class, 'sertifikat'])->name('sertifikat-saya');

Route::get('/admin/kelompok/{id}/tampilkan', [ExpoController::class, 'tampilkanKelompok'])->name('admin.tampilkanKelompok');

Route::get('/penilaian', PenilaianComponent::class)->name('penilaian')->middleware(AuthMiddleware::class);
Route::get('/kontestan', [ExpoController::class, 'listKontestan'])->name('kontestan');


Route::post('/admin/import/kontestan', [ExpoController::class, 'import'])->name('admin.import.kontestan');


Route::get('/certificate/download/{hash}', function($hash) {
    $peserta = Peserta::where('qr_hash', $hash)->firstOrFail();
    $pdf = DomPDF::loadView('sertifikat', ['peserta' => $peserta]);
    return $pdf->download('Sertifikat_TechnoVision2025_'.$peserta->nim.'.pdf');
})->name('certificate.download');
