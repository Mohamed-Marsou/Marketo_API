<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Stripe\PaymentIntent;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StripeController extends Controller
{
    public function PaymentIntent(Request $request)
    {
        // Retrieve the data from the request
        $paymentMethodId = $request->input('payment_method_id');
        $amount = $request->input('amount');
        $userId = $request->input('userId');
        $wpOrderID = $request->input('wp_order_id');
        
        
        $userName = $request->input('costumerName');
        $userEmil = $request->input('costumerEmail');
        $userAdress = $request->input('costumerAddress');
        $userCity = $request->input('costumerCity');

        // Convert the amount to cents
        $amountInCents = intval($amount * 100);
        // Set your Stripe API secret key
        //// --- $stripeSecretKey = env('STRIPE_SECRET');
        $stripeSecretKey ="sk_test_51NSKUaLLOB7wszA9BjRZLrYyVBVRnDIFOpTnEcCbAdo9pt2DEm6hzmK0pPPLtkIfN75oUzB3YDRiS985lPbmuVGD0025mkTJ4G";
        Stripe::setApiKey($stripeSecretKey);

        // Create a new payment intent
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amountInCents, // The amount in cents
                'currency' => 'usd',
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            // Create a new user if userId is null
            if ($userId === null) {
                // Create a new user
                $user = new User();
                $user->name =  $userName;
                $user->email = $userEmil;
                $user->address = $userAdress;
                $user->city = $userCity;
                $user->password = Hash::make('password');
                $user->save();
                // Assign the user's ID to $userId
                $userId = $user->id;
            }
            //Create a new order
            $order = new Order();
            $order->user_id = $userId;
            $order->amount = $amount; 
            $order->transaction_id = $paymentMethodId;
            $order->wp_order_id = $wpOrderID;
            // Save the order
            $order->save();

            // Handle the success response
            return response()->json([
                'success' => true,
                'order_id'=> $order->id                
            ], 200);
        } catch (\Exception $e) {
            // Handle the error response
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function addProductOrder(Request $request)
    {
        // Retrieve the order ID and products data from the request
        $orderId = $request->input('order_id');
        $products = $request->input('products');
    
        // Loop through the products and process each one
        foreach ($products as $productData) {
            $quantity = $productData['quantity'];
            $productId = $productData['product_id'];
    
            // Create a new order_product record
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $orderId;
            $orderProduct->product_id = $productId;
            $orderProduct->quantity = $quantity;
            $orderProduct->save();
    
            // Decrease the quantity of the product in the product table
            $product = Product::find($productId);
            $product->inStock -= $quantity;
            $product->save();
        }
    
        // Return a response indicating success
        return response()->json([
            'success' => true,
            'message' => 'Products added to the order successfully.',
        ],201);
    }
}
