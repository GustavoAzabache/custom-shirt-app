<?php

use App\Http\Controllers\DesingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Desing;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'myDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/designs', [DesingController::class, 'create'])->name('design_create_form');
Route::get('/designs/{design}/edit', [DesingController::class, 'edit'])->name('design_edit_form');

Route::post('/designs/send', [DesingController::class, 'store'])->name('design_form_send');

Route::put('/designs/{design}', [DesingController::class, 'update'])->name('design_update');

Route::delete('/designs/{design}', [DesingController::class, 'destroy'])->name('design_destroy');