<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if(auth()->user()->role == 'admin'){
        return redirect('/admin');
    }
    return redirect('/student/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============ ROUTE UNTUK SISWA ============
Route::middleware(['auth', 'role:siswa'])->group(function () {
    // Dashboard Student
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    
    // Tips
    Route::get('/student/tips', function () {
        return view('student.tips');
    })->name('student.tips');
    
    // Complaint
    Route::get('/complaint', [ComplaintController::class, 'index'])->name('complaint.index');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
    // route history menjadi redirect ke index
    // Route untuk histori - redirect ke index dengan tab histori
    Route::get('/complaint/history', function () {
        return redirect()->to('/complaint#histori');
    })->name('complaint.history');
    Route::post('/complaint/draft', [ComplaintController::class, 'saveDraft'])->name('complaint.draft');
    Route::get('/complaint/draft/{id}/edit', [ComplaintController::class, 'editDraft'])->name('complaint.edit.draft');
    Route::delete('/complaint/draft/{id}', [ComplaintController::class, 'deleteDraft'])->name('complaint.delete.draft');
    Route::get('/student/tips', function () {
        return view('student.tips');
    })->name('student.tips');
});

// ============ ROUTE UNTUK ADMIN ============
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/status/{id}', [AdminController::class, 'updateStatus']);
    Route::post('/admin/feedback/{id}', [AdminController::class, 'feedback']);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy']);

    // ROUTE KATEGORI (BARU)
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/complaint/{id}/json', [AdminController::class, 'getComplaintJson']);
});



require __DIR__.'/auth.php';