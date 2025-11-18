<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SutiController;
use App\Http\Controllers\UzenetController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Főoldal (mindenki láthatja)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Kapcsolat űrlap (mindenki láthatja)
Route::get('/kapcsolat', [UzenetController::class, 'create'])->name('kapcsolat');
Route::post('/kapcsolat', [UzenetController::class, 'store'])->name('kapcsolat.store');


// Dashboard (Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Bejelentkezést igénylő oldalak
Route::middleware('auth')->group(function () {
    // Profil kezelés (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Üzenetek menü (csak bejelentkezett felhasználók láthatják)
    Route::get('/uzenetek', [UzenetController::class, 'index'])->name('uzenetek.index');
    
    // Diagram menü
    Route::get('/diagram', [DiagramController::class, 'index'])->name('diagram');
});

// Admin menü (csak admin láthatja)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // CRUD műveletek (csak admin)
    Route::get('/sutik/create', [SutiController::class, 'create'])->name('sutik.create');
    Route::post('/sutik', [SutiController::class, 'store'])->name('sutik.store');
    Route::get('/sutik/{suti}/edit', [SutiController::class, 'edit'])->name('sutik.edit');
    Route::put('/sutik/{suti}', [SutiController::class, 'update'])->name('sutik.update');
    Route::delete('/sutik/{suti}', [SutiController::class, 'destroy'])->name('sutik.destroy');
});

// Adatbázis menü - sütemények listája (mindenki láthatja) - ezek legyenek UTOLJÁRA!
Route::get('/sutik', [SutiController::class, 'index'])->name('sutik.index');
Route::get('/sutik/{suti}', [SutiController::class, 'show'])->name('sutik.show');

require __DIR__.'/auth.php';