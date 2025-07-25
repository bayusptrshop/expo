<?php

use App\Http\Controllers\ExpoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/absen', [ExpoController::class, 'absenApi']);
