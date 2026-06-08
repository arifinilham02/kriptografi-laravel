<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptoController;

Route::get('/', [CryptoController::class, 'home']);
Route::get('/crypto', [CryptoController::class, 'index']);
Route::post('/process', [CryptoController::class, 'process']);
Route::delete('/history/{id}', [CryptoController::class, 'deleteHistory']);
Route::delete('/history/delete/all', [CryptoController::class, 'deleteAllHistory']);
Route::get('/history/export/pdf', [CryptoController::class, 'exportPdf']);
