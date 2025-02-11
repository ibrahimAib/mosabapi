<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductResource;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'products:',
            'data' => ProductResource::collection(Product::all())
        ], 201);
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
    public function store(StoreProductRequest $request)
    {
        Product::create([
            'title' => $request->title,
            'sn' => $request->sn,
            'price' => $request->price,
            'category' => $request->category,
            'stock' => $request->stock,
        ]);
        return response()->json([
            'message' => 'Data stored successfully!',
            'data' => ProductResource::collection(Product::all())
        ], 202);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
        
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Update the product with validated data
        $product->update([
            'title' => $request->title,
            'sn' => $request->sn,
            'price' => $request->price,
            'category' => $request->category,
            'stock' => $request->stock,
        ]);
    
        // Optionally return a response
        return response()->json([
            'message' => 'Product updated successfully',
            'data' => new ProductResource($product),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'this product has been deleted!',
            'data' => new ProductResource($product),
        ]);
    }
    public function getDataFromLocalStorage(Request $request)
    {
        $recs = $request->all();

        Product::create([
            'title' => $recs['title'],
            'sn' => $recs['sn'],
            'price' => $recs['price'],
            'category' => $recs['catagory'],
            'stock' => $recs['stock'],
        ]);
        return response()->json($recs['title']);
    }
}
