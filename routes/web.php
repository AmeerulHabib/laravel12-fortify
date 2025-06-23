<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Additional routes for profile management
    Route::get('/profile/password', function () {
        return view('profile.password');
    })->name('profile.password.edit');

    Route::middleware(['auth', 'verified'])->group(function () {
        // …existing routes…

        // Security page (empty for now)
        Route::get('/security', function () {
            return view('security.index');
        })->name('security.index');
    });
});

require __DIR__ . '/auth.php';
