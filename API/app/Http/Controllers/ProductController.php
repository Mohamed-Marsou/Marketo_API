<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

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

    public function fetchByCategory( $categoryId): JsonResponse
    {
        try {
            $category = Category::find($categoryId);
            // Retrieve the latest 16 products for the specified category with pagination
            $products = Product::where('category_id', $categoryId)
            ->latest('id')
            ->paginate(16);
            return response()->json(
                [$products, $category]
                , 200);
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json([
                'message' => 'An error occurred in ProductController.fetchByCategory',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'rating' => 'required|numeric',
            'inStock' => 'required|integer',
            'coverImage' => 'required|string',
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

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
