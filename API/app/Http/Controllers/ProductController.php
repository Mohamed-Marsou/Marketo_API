<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $perPage =  16;
            $products = Product::Paginate($perPage);
            return response()->json([
                $products
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json([
                'message' => 'An error occurred in ProductController.index',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function hotProducts(): JsonResponse
    {
        try {
            $perPage =  8;
            $products = Product::orderBy('rating', 'desc')->Paginate($perPage);
            return response()->json([
                "products" => $products,
            ], 200);
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json([
                'message' => 'An error occurred in ProductController.hotProducts',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function newProducts(): JsonResponse
    {
        try {
            // retrive lastest 10 Products for slide 
            $products = Product::latest('id')->take(10)->get();
            return response()->json($products, 200);
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json([
                'message' => 'An error occurred in ProductController.newProducts',
                'error' => $e->getMessage()
            ], 500);
        }
    }

public function fetchByCategory($categoryId): JsonResponse
{
    try {
        $category = Category::find($categoryId);
        // Retrieve products for the specified category
        $products = Product::where('category_id', $categoryId)
            ->latest('id')->get();
        return response()->json([
            'products' => $products,
            'category' => $category
        ], 200);
    } catch (\Exception $e) {
        // Handle the exception
        return response()->json([
            'message' => 'An error occurred in ProductController.fetchByCategory',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $category = $request->input('category');

        $query = Product::where('category_id', $category)
            ->where(DB::raw('LOWER(name)'), 'LIKE', '%' . strtolower($searchTerm) . '%');

        $products = $query->paginate(8);

        return response()->json([
            'products' => $products,
        ]);
    }
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'rating' => 'required|numeric',
            'inStock' => 'required|integer',
            'coverImage' => 'required',
            'stock' =>'required|integer'
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }
    public function show(Product $product): JsonResponse
    {
        try {
            $product = Product::findOrFail($product->id);
            return response()->json($product, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found cehck ProductController.show'], 404);
        }
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'rating' => 'required|numeric',
            'inStock' => 'required|integer',
            'coverImage' => 'required|string',
        ]);

        $product->update($data);
        return response()->json($product);
    }

    public function clearUserCart($id)
    {
        try {
            // Find the user based on the provided ID
            $user = User::findOrFail($id);

            // Clear the user's cart
            $user->cart()->delete();

            return response()->json([
                'success' => true,
                'message' => 'User cart cleared successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function getUserOrderDetails($order_id)
    {
        $order = Order::with('products')->where('transaction_id', $order_id)->first();
    
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
    
        // Check if the order has associated products
        if ($order->products->isEmpty()) {
            return response()->json(['error' => 'No products found for this order'], 404);
        }
    
        return response()->json($order, 200);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
