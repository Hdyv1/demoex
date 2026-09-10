<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\OrderController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/registerForm', [UserController::class, 'registerForm'])->name('registerForm');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/admin', [UserController::class, 'admin'])->name('admin');
Route::get('/order', [UserController::class, 'order'])->name('order');
Route::post('/createOrder', [OrderController::class, 'store'])->name('createOrder');
Route::get('/orders', [UserController::class, 'orders'])->name('orders');

Route::post('/createPlace', [PlaceController::class, 'store'])->name('createPlace');