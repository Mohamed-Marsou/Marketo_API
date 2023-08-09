<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $perPage =  12;
            $products = Product::with('category:id,name')->paginate($perPage);
            return response()->json([
                'products' => $products 
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
            $perPage =  12;
            $products = Product::orderBy('id', 'desc')->Paginate($perPage);
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
            'stock' => 'required|integer'
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


    public function syncAllProductsFromWooCommerce()
    {
        $storeUrl = 'http://localhost/wordpress';
        $apiEndpoint = '/wp-json/wc/v3/products';

        $USERNAME = 'mtm';
        $SECRET = 'yoFX VPL1 qoBn XWrE spHS yPJH';

        $perPage = 30; // Number of products per page
        $currentPage = 1; // Start with the first page

        do {
            try {
                $response = Http::withBasicAuth($USERNAME, $SECRET)
                    ->get($storeUrl . $apiEndpoint, [
                        'per_page' => $perPage,
                        'page' => $currentPage,
                    ]);

                $products = $response->json();
                if (empty($products)) {
                    // No more products to fetch, break the loop
                    break;
                }
                // Check and save only new products to the database
                foreach ($products as $productData) {
                    // Check if the product already exists in the database by product ID
                    $existingProduct = Product::where('slug', $productData['slug'])->first();

                    // Product doesn't exist, save it to the database
                    if (!$existingProduct) {
                        // Extract the "src" values from the "images" array
                        $images = $productData['images'];
                        $imagePaths = [];
                        foreach ($images as $image) {
                            $srcArray[] = $image['src'];
                            // Download the image and save it to storage
                            $imageData = file_get_contents($image['src']);
                            $imageName = basename($image['src']);
                            $imagePath ='/storage/prodcut-images/' . $productData['slug'] . '/' . $imageName;
                            Storage::put('public/prodcut-images/' . $productData['slug'] . '/' . $imageName, $imageData);
                            $imagePaths[] = 'http://localhost:8000' .$imagePath;
                        }

                        // Convert the array of "src" values to JSON before saving to the database
                        $imagePathsJson = json_encode($imagePaths);
                        $product = new Product([
                            'name' => $productData['name'],
                            'price' => (float) $productData['price'],
                            'regular_price' => (float) $productData['regular_price'],
                            'sale_price' => (float) $productData['sale_price'],
                            'average_rating' => (float)  $productData['average_rating'],
                            'inStock' => $productData['stock_quantity'],
                            'description' => $productData['description'],
                            'category_id' => rand(1, 4),
                            'slug' => $productData['slug'],
                            'imagePaths' => $imagePathsJson,
                            'status' => $productData['status'],
                            'short_description' => $productData['short_description'],
                            'weight' => json_encode($productData['weight']),
                            'dimensions' => json_encode($productData['dimensions']),
                            'specification' => json_encode($productData['attributes']),
                        ]);
                        $product->save();
                    }
                }

                $currentPage++; // Move to the next page for the next iteration

            } catch (\Exception $e) {
                // Handle any errors that occurred during the API request
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } while (!empty($products));

        // Synchronization completed, return success message
        return response()->json(['message' => 'Product synchronization completed.'], 200);
    }
}
