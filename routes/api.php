<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('categories',[ApiCategoryController::class, 'index'])->middleware('auth:sanctum');
Route::post('categories',[ApiCategoryController::class, 'store']);

Route::get('categories/{category}',[ApiCategoryController::class, 'show']);
Route::put('categories/{category}',[ApiCategoryController::class, 'update']);

Route::delete('categories/{category}',[ApiCategoryController::class, 'destroy']);

Route::post('/login',[ApiCategoryController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
