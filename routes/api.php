<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::post('/tokens/create', function (Request $request) {
//     $token = $request->user()->createToken($request->token_name);
//     return ['token' => $token->plainTextToken];
// });


//Route::apiResource('/products',ProductController::class);

Route::get('/product', [ProductController::class , 'index']);
Route::get('/product/{id}', [ProductController::class , 'show']);
Route::post('/product', [ProductController::class , 'store']);
Route::delete('/product/{id}', [ProductController::class , 'destroy']);
Route::put('/product/{id}', [ProductController::class , 'update']);


