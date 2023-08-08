<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class PaypalController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->all();
        // Log the incoming webhook payload for debugging
        Log::info('Received webhook payload:', $payload);
        // Respond with a 200 status to acknowledge receipt of the webhook
        return response()->json(['status' => 'success' , "req" => $payload], 200);
        //TODO FILL LARAVEL DATABASE

        //TODO  FILL WP WOO DATABASE
   

    }
}
