<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;


Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


Route::post('/user/purchase', [StripeController::class, 'PaymentIntent']);
Route::post('/orders/add', [StripeController::class, 'addProductOrder']);

