<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); })->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('dashboard', '/user')->name('dashboard');
});

require __DIR__.'/settings.php';

Route::get('introduction', function () { return view('introduction'); });
Route::middleware(['auth'])->group(function () {
    Route::get('user', function () { return view('user'); })->name('user');
    Route::get('admin', [App\Http\Controllers\AdminController::class, 'adminPage']);
});

Route::get('database', [App\Http\Controllers\DatabaseController::class, 'index'])->name('database');
Route::get('graph', [App\Http\Controllers\GraphController::class, 'index'])->name('graph');

Route::get('contact', [App\Http\Controllers\ContactController::class, 'show'])->name('contact');
Route::post('contact', [App\Http\Controllers\ContactController::class, 'store']);
Route::middleware(['auth'])->get('messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages');

Route::middleware(['auth', App\Http\Middleware\AdminOnly::class])->group(function () {
    Route::resource('crud', App\Http\Controllers\RestrictionController::class)
        ->except('show')
        ->parameters(['crud' => 'restriction']);
});
