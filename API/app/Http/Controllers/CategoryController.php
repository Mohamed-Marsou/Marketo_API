<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
    public function updateCategory(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'name' => 'required|string',
                'description' => 'required|string',
                'cover_image' => 'file|mimes:jpeg,png',
                'hero_image' => 'file|mimes:jpeg,png',
            ]);

            $category = Category::findOrFail($request->input('id'));

            $category->name = $request->input('name');
            $category->description = $request->input('description');

            // Handle cover image upload
            if ($request->hasFile('cover_image')) {
                $coverImageName = time() . '.' . $request->file('cover_image')->getClientOriginalExtension();
                $coverImagePath = $request->file('cover_image')->storeAs('category_images/caregory-' . $category->id . '/cover_images', $coverImageName, 'public');
                $category->image_path = asset('storage/' . $coverImagePath);
            }

            // Handle hero image upload
            if ($request->hasFile('hero_image')) {
                $heroImageName = time() . '.' . $request->file('hero_image')->getClientOriginalExtension();
                $heroImagePath = $request->file('hero_image')->storeAs('category_images/caregory-' . $category->id . '/hero_images', $heroImageName, 'public');
                $category->cover_image_path = asset('storage/' . $heroImagePath);
            }

            $category->save();

            return response()->json(['message' => 'Category updated successfully']);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the category. ' . $e], 500);
        }
    }

    public function fetchByCategory($slug): JsonResponse
    {
        try {
            // Retrieve all categories
            $allCategories = Category::all();
    
            // Find the category that matches the provided slug
            $category = $allCategories->first(function ($item) use ($slug) {
                return Str::slug($item->name) === $slug;
            });
    
            if (!$category) {
                return response()->json([
                    'message' => 'Category not found'
                ], 404);
            }
    
            // Retrieve products for the specified category
            $products = Product::where('category_id', $category->id)
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

}
