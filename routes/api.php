<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CartItemsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Test API routes

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::resource('categories', CategoriesController::class);//Done
});
Route::middleware('api')->group(function () {
    Route::resource('menus', MenusController::class);//Done
});
Route::middleware('api')->group(function () {
    Route::resource('carts', CartsController::class);//Done
});
Route::middleware('api')->group(function () {
    Route::resource('articles', ArticlesController::class);//Done
});
Route::middleware('api')->group(function () {
    Route::resource('orders', OrdersController::class);//Done
});
Route::middleware('api')->group(function () {
    Route::resource('userProfiles', UserProfileController::class);//Done
});
Route::middleware('api')->group(function () {
    Route::resource('orderItems', OrderItemController::class);//Done
});
Route::middleware('api')->group(function () {
    Route::resource('cartItems', CartItemsController::class);//Done
});

