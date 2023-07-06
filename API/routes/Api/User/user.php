<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');