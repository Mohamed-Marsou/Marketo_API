<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribersController;

Route::post('/subscriber/new', [SubscribersController::class, 'store'])->name('subscriber.store');
