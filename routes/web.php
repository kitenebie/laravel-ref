<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//TODO: #7 add the middlewareroutes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'SecurityCheckUserType'])->name('dashboard');

Route::middleware(['auth', 'SecurityCheckUserType'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
