<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamController;

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
});

Route::get('/peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
Route::get('/peminjam/create', [PeminjamController::class, 'create'])->name('peminjam.create');
Route::post('/peminjam', [PeminjamController::class, 'store'])->name('peminjam.store');
Route::get('/peminjam/{id}/edit', [PeminjamController::class, 'edit'])->name('peminjam.edit');
Route::put('/peminjam/{id}', [PeminjamController::class, 'update'])->name('peminjam.update');
Route::delete('/peminjam/{id}', [PeminjamController::class, 'destroy'])->name('peminjam.destroy');

require __DIR__.'/auth.php';
