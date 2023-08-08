<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::withCount(['products', 'products as sales_count' => function ($query) {
                $query->select(DB::raw('sum(order_products.quantity)'))
                    ->leftJoin('order_products', 'products.id', '=', 'order_products.product_id');
            }])->get();
            
            return response()->json([
                'categories' => $categories
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json([
                'message' => 'An error occurred in CategoryController.getAllCategoriesWithProductAndSalesCount',
                'error' => $e->getMessage()
            ], 500);
        }
        }
}
