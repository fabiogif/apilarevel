<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::apiResource('/products',ProductController::class);

Route::get('/product/{id}', [ProductController::class , 'show']);
Route::post('/product', [ProductController::class , 'store']);
Route::delete('/product/{id}', [ProductController::class , 'destroy']);
Route::put('/product', [ProductController::class , 'update']);


