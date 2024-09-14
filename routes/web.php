<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('store-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'storeSignup'])->name('store-signup');



Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->middleware('auth');
});


