<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// get users with transaction Count  
Route::get('/user/all', [UserController::class, 'index'])->name('user.index');

//? Validating user jwt token with try limit (35 request in 1 min)
Route::post('/validateToken', [UserController::class, 'validateToken'])->middleware('throttle:60,1')->name('user.validateToken');

// getting user cart items 
Route::get('/user/cart/{id}', [UserController::class, 'getCartItems'])->name('user.getCartItems');
//  getting user wishlist items 
Route::get('/user/wishlist/{id}', [UserController::class, 'getWishlistItems'])->name('user.getWishlistItems');

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');

Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register');

Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');

// add to cart 
Route::post('/user/add/item', [UserController::class, 'addToCart'])->name('user.addToCart');
// Delete an Item from the user cart
Route::post('/user/cart/remove/{id}', [UserController::class, 'romoveItemCart'])->name('user.romoveItemCart');

// add to Wishlist
Route::post('/wishlist/add', [UserController::class, 'addToWishlist'])->name('user.addToWishlist');
//  Delete an Item from the user cart
Route::post('/user/wishlist/remove/{id}', [UserController::class, 'romoveItemWishlist'])->name('user.romoveItemWishlist');