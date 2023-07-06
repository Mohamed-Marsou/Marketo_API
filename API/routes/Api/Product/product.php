<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Fetch based on rating 
Route::get('/products/rating', [ProductController::class, 'hotProducts'])->name('products.hotProducts');
// Fetch newset Products
Route::get('/products/new', [ProductController::class, 'newProducts'])->name('products.newProducts');
// Fetch by category
Route::get('/products/{category}', [ProductController::class, 'fetchByCategory'])->name('products.fetchByCategory');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');
// Search in category page 
Route::get('/category/products/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
