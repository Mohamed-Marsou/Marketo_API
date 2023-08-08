<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard/info', [DashboardController::class, 'GetDashInfo'])->name('admin.GetDashInfo');
Route::get('/dashboard/orders/recent', [DashboardController::class, 'getRecentOrders'])->name('admin.getRecentOrders');
