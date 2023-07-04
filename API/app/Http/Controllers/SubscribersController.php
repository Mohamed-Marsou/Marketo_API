<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
            'country' => 'string'
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $validatedData['email'];
        $subscriber->country = $validatedData['country'];

        $subscriber->save();

        return response()->json([
            'message' => "Subscriber created successfully: $subscriber->email",
        ], 201);
    } catch (\Exception $e) {

        return response()->json([
            'message' => 'An error occurred while creating the subscriber',
            'error' => $e->getMessage()
        ], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
