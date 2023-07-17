<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

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

header('Access-Control-Allow-Origin: http://localhost:5173');

require __DIR__.'/Api/Product/product.php';
require __DIR__.'/Api/Subscriber/subscriber.php';
require __DIR__.'/Api/User/user.php';
require __DIR__.'/Api/Orders/order.php';



//* -- Countries endpoint --
Route::get('/countries/all', [Controller::class, 'allCountries'])->name('allCountries');
//* -- Countries endpoint --

Route::middleware('auth:sanctum')->get('/user', function (Request $request) { 
    return $request->user();
});
