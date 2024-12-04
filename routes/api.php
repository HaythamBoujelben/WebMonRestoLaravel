<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
    ], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refreshToken', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    });
    Route::get('users/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('categories', CategoriesController::class);//Done
Route::resource('menus', MenusController::class);//Done
Route::resource('carts', CartsController::class);//Done
Route::resource('articles', ArticlesController::class);//Done
Route::resource('orders', OrdersController::class);//Done
Route::resource('userProfiles', UserProfileController::class);//Done
Route::resource('orderItems', OrderItemController::class);//Done
Route::resource('cartItems', CartItemsController::class);//Done

Route::get('/articles/category/{categoryId}', [ArticlesController::class, 'getByCategory']);
Route::get('/api/cartitems/cartId/{cartId}', [ArticlesController::class, 'getCartItemsByCartID']);



