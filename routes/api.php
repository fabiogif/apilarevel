<?php

use App\Http\Controllers\{ProductController, PlanController, DetailPlanController};
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
Route::delete('/product/{id}', [ProductController::class , 'delete']);
Route::put('/product/{id}', [ProductController::class , 'update']);

Route::get('/plan/{id}/detail', [DetailPlanController::class , 'index']);
Route::get('/plan/{id}/detail/{id}', [DetailPlanController::class , 'show']);
Route::post('/plan/{id}/detail', [DetailPlanController::class , 'store']);
Route::delete('/plan/{id}/detail/{id}', [DetailPlanController::class , 'delete']);
Route::put('/plan/{id}/detail/{id}', [DetailPlanController::class , 'update']);

Route::get('/plan', [PlanController::class , 'index']);
Route::get('/plan/{id}', [PlanController::class , 'show']);
Route::post('/plan', [PlanController::class , 'store']);
Route::delete('/plan/{id}', [PlanController::class , 'delete']);
Route::put('/plan/{id}', [PlanController::class , 'update']);

