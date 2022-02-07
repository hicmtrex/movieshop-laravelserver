<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//get all
Route::get('/products', [ProductController::class, "index"]);

Route::get('/products/search/{name}', [ProductController::class, "search"]);

Route::get('/orders', [OrderController::class, "index"]);
Route::get('/users', [AuthController::class, "index"]);

Route::get('/products/{id}', [ProductController::class, "show"]);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('/products/{id}', [ProductController::class, "destroy"]);
    Route::post('/products', [ProductController::class, "store"]);
    Route::put('/products/{id}', [ProductController::class, "update"]);
    Route::post('/orders', [OrderController::class, "store"]);
    Route::delete('/orders/{id}', [OrderController::class, "destroy"]);
    Route::get('/orders/{id}', [OrderController::class, "show"]);
});


//auth

Route::post('/register', [AuthController::class, "register"]);
Route::post('/login', [AuthController::class, "login"]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
