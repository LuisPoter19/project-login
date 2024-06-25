<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainPageController;


Route::get('/', [AuthController::class, 'index'])->name('viewLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/main-page', [MainPageController::class, 'index'])->name('main-page')->middleware('auth');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register',[AuthController::class, 'newRegister'])->name('register');




