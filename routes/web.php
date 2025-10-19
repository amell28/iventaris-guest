<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/homeGuest', [GuestController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('warga', WargaController::class);

Route::resource('kategoriAset', KategoriAsetController::class);
