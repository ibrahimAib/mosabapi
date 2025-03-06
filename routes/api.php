<?php

use App\Http\Controllers\Api\UserController as ApiUserController;
use App\Http\Controllers\Api\V1\BillController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1' , 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('bills', BillController::class);
    Route::apiResource('carts', CartController::class);
    Route::post('/getDataFromLocalStorage', [ProductController::class, 'getDataFromLocalStorage']);

    // Route::get('/user', [UserController::class, 'index']);
});

Route::post('register', [ApiUserController::class, 'createUser']);
Route::post('login', [ApiUserController::class, 'loginUser']);
