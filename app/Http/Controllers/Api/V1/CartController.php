<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CartResource;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CartResource::collection(Cart::all());
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
    public function store(StoreCartRequest $request)
    {
        Cart::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'bill_id' => $request->bill_id,
            'title' => $request->title,
            'sn' => $request->sn,
            'price' => $request->price,
            'category' => $request->category,
            'amount' => $request->amount,
        ]);
        DB::transaction(function () use ($request) {
            // Find the product and lock the row for update to prevent race conditions
            $product = Product::where('id', $request->product_id)->lockForUpdate()->first();
        
            // Check if the product exists
            if (!$product) {
                throw new \Exception('Product not found');
            }
        
            // Validate the amount
            if ($request->amount <= 0) {
                throw new \Exception('Invalid amount');
            }
        
            // Ensure the stock doesn't go negative
            if ($product->stock < $request->amount) {
                throw new \Exception('Insufficient stock');
            }
        
            // Update the stock
            $product->stock -= $request->amount;
            $product->save();
        });
        return response()->json([
            'message' => 'Data stored successfully!',
            'data' => $request
        ], 202);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return response()->json([
            'message' => 'deleted',
            'data'=> new CartResource($cart)
        ]);
    }
}
