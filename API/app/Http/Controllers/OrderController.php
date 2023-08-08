<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        try {
            $perPage =  7;
            $orders = Order::Paginate($perPage);
            return response()->json([
                'Orders' => $orders 
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json([
                'message' => 'An error occurred in OrderController.index',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
