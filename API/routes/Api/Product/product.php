<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//// Fetch based on rating 
Route::get('/products/rating', [ProductController::class, 'hotProducts'])->name('products.hotProducts');
//// Fetch newset Products
Route::get('/products/new', [ProductController::class, 'newProducts'])->name('products.newProducts');
//// Fetch by category
Route::get('/products/{category}', [ProductController::class, 'fetchByCategory'])->name('products.fetchByCategory');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');
//// Search in category page 
Route::get('/category/products/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
//// Get Order details with it products 
Route::get('/orders/{order_id}', [ProductController::class, 'getUserOrderDetails'])->name('products.getUserOrderDetails');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// // - Clear user Cart 
Route::delete('/cart/clear/{id}', [ProductController::class, 'clearUserCart'])->name('products.clearUserCart');



Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

//TODO DLETEEEEEEEEEE 
// // - Get Products from WOO DB -
Route::get('/woo/products', [ProductController::class, 'syncAllProductsFromWooCommerce'])->name('products.syncAllProductsFromWooCommerce');

