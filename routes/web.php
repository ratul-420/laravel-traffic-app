<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('introduction', function () { return view('introduction'); });
Route::middleware(['auth'])->group(function () {
    Route::get('user', function () { return view('user'); })->name('user');
    Route::get('admin', [App\Http\Controllers\AdminController::class, 'adminPage']);
});

Route::get('database', [App\Http\Controllers\DatabaseController::class, 'index'])->name('database');
