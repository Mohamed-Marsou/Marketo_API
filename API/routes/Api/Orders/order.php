<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;


Route::post('/user/purchase', [StripeController::class, 'PaymentIntent']);
Route::post('/orders/add', [StripeController::class, 'addProductOrder']);

