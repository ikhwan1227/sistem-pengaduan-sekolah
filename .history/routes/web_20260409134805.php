<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if(auth()->user()->role == 'admin'){
        return redirect('/admin');
    }
    return redirect('/complaint');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/complaint', [ComplaintController::class, 'index']);
    Route::post('/complaint', [ComplaintController::class, 'store']);

    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin/status/{id}', [AdminController::class, 'updateStatus']);
    Route::post('/admin/feedback/{id}', [AdminController::class, 'feedback']);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy']);
});

require __DIR__.'/auth.php';