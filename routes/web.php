<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/registerForm', [UserController::class, 'registerForm'])->name('registerForm');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');