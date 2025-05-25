<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/testing', function () {
    return 'cobaaaa';
})->middleware('auth', 'role:pemerintah');

    // Route::middleware('role:admin')->group(function () {
    //     // Route khusus admin
    //     Route::get('/dashboard', [DashboardController::class, 'index']);
    // });

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/penyelenggara/dashboard', function () {
        return view('penyelenggara.dashboard');
    });

    Route::get('/warga/dashboard', function () {
        return view('warga.dashboard');
    });
});

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');
