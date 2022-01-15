<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('user',[UserController::class,'store']);
Route::post('login',[UserController::class,'login']);
Route::get('product',[ProductController::class,'index']);
Route::post('add-product',[ProductController::class,'store']);
Route::delete('delete-product/{id}',[ProductController::class,'destroy']);
Route::get('get-product/{id}',[ProductController::class,'getProduct']);
Route::post('update-product/{id}',[ProductController::class,'update']);
Route::get('search/{key}',[ProductController::class,'search']);
