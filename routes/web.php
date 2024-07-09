<?php

use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\NilaiAlternatifController;
use App\Http\Controllers\TOPSISController;
use Illuminate\Support\Facades\Route;

// Set the login route as the default route
Route::get('/', function () {
    return redirect()->route('login');
});

// Routes untuk Kriteria
Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
Route::get('/kriteria/{kriteria}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::put('/kriteria/{kriteria}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::delete('/kriteria/{kriteria}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

// Routes untuk Alternatif
Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
Route::get('/alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
Route::post('/alternatif/storeWithNilai', [AlternatifController::class, 'storeWithNilai'])->name('alternatif.storeWithNilai');
Route::get('/alternatif/{alternatif}/edit', [AlternatifController::class, 'edit'])->name('alternatif.edit');
Route::put('/alternatif/{alternatif}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::delete('/alternatif/{alternatif}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

// Routes untuk Nilai Alternatif
Route::post('nilai-alternatif', [NilaiAlternatifController::class, 'store'])->name('nilai-alternatif.store');


use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


// Routes untuk TOPSIS
Route::get('/topsis', [TOPSISController::class, 'index'])->name('topsis.index');
