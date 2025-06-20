<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/verification', 'verification');
});

Route::controller(ForgotPasswordController::class)->group(function() {
Route::post('/password-email', 'email');
Route::post('/password-reset', 'reset');
});

//Routes CRUD users
Route::controller(UserController::class)->prefix('users')->group(function() {
Route::get('','index');
Route::get('/{user}','show');
Route::post('','store');
Route::put('/{user}','update');
Route::delete('/{user}','destroy');
});

//Routes CRUD produits
Route::controller(AdminProductController::class)->prefix('products')->group(function() {
    Route::get('','index');
    Route::post('','store');
    Route::get('/{product}','show');
    Route::put('/{product}','update');
    Route::delete('/{product}','destroy');
    })->middleware('admin');

//Routes du panier
Route::controller(CartController::class)->prefix('carts')->group(function(){
    Route::get('','show')->name('cart.show');
    Route::post('set', 'set');
    Route::post('add/{product_id}', 'add');
    Route::post('remove/{product_id}', 'remove');
    Route::post('clear', 'clear');
    });