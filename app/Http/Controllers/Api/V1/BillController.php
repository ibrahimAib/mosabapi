<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bill;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BillResource;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BillResource::collection(Bill::all());
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
    public function store(StoreBillRequest $request)
    {

        Bill::create([
            'customer_id' => $request->customer_id,
            'overAll' => $request->overAll,
        ]);
        $lastRow = Bill::latest()->first();
        return response()->json([
            'message' => 'Data stored successfully!',
            'id' => $lastRow->id
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        return new BillResource($bill);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        $bill->update([
            'customer_id' =>  $request->customer_id == null ? $bill->customer_id : $request->customer_id,
            'overAll' => $request->overAll == null ? $bill->overAll : $request->overAll,
            'paid' => $request->paid
        ]);
        return response()->json([
            'message' => 'updated',
            'data' => new BillResource($bill)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
        return response()->json([
            'message' => 'Deleted!',
            'data' => new BillResource($bill)
        ]);
    }
}
