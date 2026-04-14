<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminController;

// Route untuk siswa (dengan middleware role)
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/complaint', [ComplaintController::class, 'index']);
    Route::post('/complaint', [ComplaintController::class, 'store']);
});

// Route untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin/status/{id}', [AdminController::class, 'updateStatus']);
    Route::post('/admin/feedback/{id}', [AdminController::class, 'feedback']);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy']);
});

// Auth routes (pastikan sudah ada)
require __DIR__.'/auth.php';