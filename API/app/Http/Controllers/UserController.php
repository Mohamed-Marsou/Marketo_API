<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * login a user .
     */

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ], 200);
    }
    public function validateToken(Request $request)
    {
        $token = $request->input('token');

        try {
            // Validate the token using the JWT_SECRET
            $decodedToken = JWTAuth::setToken($token)->getPayload();

            // Token is valid
            return response()->json(['valid' => true]);
        } catch (\Exception $e) {
            // An error occurred or token is invalid
            return response()->json(['valid' => false]);
        }
    }
    /**
     * Store a newly created user .
     */
    public function register(Request $request): JsonResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);

        // Save the user record in the database
        $user->save();

        // Return a response with the newly created user data
        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        // Retrieve the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Hide the desired fields from the user object
        $user->makeHidden(['password', 'email_verified_at', 'created_at', 'updated_at']);
        // Return a JSON response with the user information
        return response()->json([
            'user' => $user,
        ], 200);
    }
    /**
     * add a Product to User Cart 
     */
    public function addToCart(Request $request): JsonResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'inStock' => 'required|integer',
            'image' => 'required|string',
        ]);

        // Check if the item is already in the cart
        $existingCartItem = Cart::where('user_id', $validatedData['user_id'])
            ->where('product_id', $validatedData['product_id'])
            ->first();

        if ($existingCartItem) {
            // Update the quantity if it's different
            if ($existingCartItem->quantity != $validatedData['quantity']) {
                $existingCartItem->quantity = $validatedData['quantity'];
                $existingCartItem->save();
                return response()->json(['message' => 'Item quantity updated in the cart'], 201);
            } else {
                return response()->json(['message' => 'Item already in the cart'], 200);
            }
        }

        // Create a new cart item
        $cartItem = Cart::create([
            'user_id' => $validatedData['user_id'],
            'product_id' => $validatedData['product_id'],
            'name' => $validatedData['name'],
            'quantity' => $validatedData['quantity'],
            'inStock' => $validatedData['inStock'],
            'image' => $validatedData['image'],
            'price' => $validatedData['price'],
        ]);

        // Return a response indicating success or failure
        if ($cartItem) {
            return response()->json(['message' => 'Cart item added successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to add cart item'], 500);
        }
    }
    public function addToWishlist(Request $request): JsonResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'inStock' => 'required|integer',
            'image' => 'required|string',
        ]);

        // Check if the item is already in the cart
        $existingItem = Wishlist::where('user_id', $validatedData['user_id'])
            ->where('product_id', $validatedData['product_id'])
            ->first();

        if ($existingItem) {
            return response()->json(['message' => 'Item already in the cart'], 200);
        }
        // Create a new cart item
        $wishlistItem = Wishlist::create([
            'user_id' => $validatedData['user_id'],
            'product_id' => $validatedData['product_id'],
            'name' => $validatedData['name'],
            'inStock' => $validatedData['inStock'],
            'image' => $validatedData['image'],
            'price' => $validatedData['price'],
        ]);

        // Return a response indicating success or failure
        if ($wishlistItem) {
            return response()->json(['message' => 'wishlist item added successfully'], 201);
        } else {
            return response()->json(['message' => 'Failed to add wishlist item'], 500);
        }
    }
    public function getCartItems($id): JsonResponse
    {
        // Retrieve cart items for the specified user
        $cartItems = Cart::where('user_id', $id)->get();

        // Return the cart items as a JSON response
        return response()->json(['cart_items' => $cartItems], 200);
    }
    public function getWishlistItems($id): JsonResponse
    {
        // Retrieve cart items for the specified user
        $WishlistItems = Wishlist::where('user_id', $id)->get();

        // Return the cart items as a JSON response
        return response()->json(['wishList_items' => $WishlistItems], 200);
    }

    /**
     * remove an Item from user Cart .
     */
    public function romoveItemCart($id)
    {
        try {
            // Find the cart item by ID
            $cartItem = Cart::findOrFail($id);

            // Delete the cart item
            $cartItem->delete();

            return response()->json(['message' => 'Cart item removed successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to remove cart item'], 500);
        }
    }
    public function romoveItemWishlist($id)
    {
        try {
            // Find the cart item by ID
            $cartItem = Wishlist::findOrFail($id);

            // Delete the cart item
            $cartItem->delete();

            return response()->json(['message' => 'Wishlist item removed successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to remove Wishlist item'], 500);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Retrieve the user ID from the request payload
        $id = $request->input('id');

        // Retrieve the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Retrieve the request data
        $data = $request->all();

        // Define validation rules
        $rules = [
            'id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string',
            'country' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'gender' => 'nullable|in:MALE,FEMALE',
        ];

        // Validate the request data
        $validator = Validator::make($data, $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        // Update the user information
        $user->update($data);

        // Return a JSON response with a success message
        return response()->json(['message' => 'User updated successfully', 'user' => $data], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
