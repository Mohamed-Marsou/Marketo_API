<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


require __DIR__.'/Api/Product/product.php';
require __DIR__.'/Api/Subscriber/subscriber.php';
require __DIR__.'/Api/User/user.php';


Route::get('/countries/all', [Controller::class, 'allCountries'])->name('allCountries');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) { 
    return $request->user();
});
