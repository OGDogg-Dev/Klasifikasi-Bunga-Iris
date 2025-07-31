<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IrisController;

Route::get('/klasifikas', [IrisController::class, 'index']);
Route::post('/klasifikasi', [IrisController::class, 'classify']);
