<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerReviewController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\WorkshopSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['web', 'throttle:login'])->group(function () {
    Route::post('/authenticate', [AuthController::class, 'authenticate']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::controller(RegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/verification', 'verification');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::post('/password-email', 'email');
    Route::post('/password-reset', 'reset');
});

//Routes CRUD users
Route::controller(UserController::class)->prefix('users')->group(function () {
    Route::get('', 'index');
    Route::get('/{user}', 'show');
    Route::post('', 'store');
    Route::put('/{user}', 'update');
    Route::delete('/{user}', 'destroy');
});

//Gestion des produits pour la boutique
Route::controller(ControllersProductController::class)->prefix('products')->group(function () {
    Route::get('', 'index');
    Route::get('/{product}', 'show');
    Route::get('/paginate', 'paginate');
});

//Gestion des sessions
Route::controller(WorkshopSessionController::class)->group(function () {
    Route::post('/workshops/{id}/sessions', 'store');
    Route::put('/sessions/{id}', 'update');
    Route::delete('/sessions/{id}', 'destroy');
});

//Gestion des réservations
Route::controller(BookingController::class)->group(function () {
    Route::get('/mes-reservations', 'index')->name('bookings.index');
    Route::post('/sessions/{id}/reserver', 'store')->name('bookings.store');
    Route::delete('/reservations/{id}', 'destroy')->name('bookings.destroy');
});


//Gestion des avis sur les produits
Route::controller(CustomerReviewController::class)->group(function () {
    Route::get('/reviews', 'index');
    Route::get('products/reviews/{customerreview}', 'show');
    Route::post('/reviews', 'store');
    Route::put('/reviews/{id}', 'update');
    Route::delete('/reviews/{customerreview}', 'destroy');
    Route::get('products/{product}/reviews', 'reviewsByProduct');
});

//Gestion du panier
Route::controller(CartController::class)->prefix('carts')->group(function () {
    Route::get('', 'show')->name('cart.show');
    Route::post('set', 'set');
    Route::post('add/{product_id}', 'add');
    Route::post('remove/{product_id}', 'remove');
    Route::post('delete/{product_id}', 'delete');
    Route::post('clear', 'clear');
});



//Routes Admin
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    // Produits
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'show');
        Route::post('', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
    //Gestion des ateliers
    Route::controller(WorkshopController::class)->prefix('workshops')->group(function () {
        Route::get('', 'index');
        Route::get('/{workshop}', 'show');
        Route::post('', 'store');
        Route::put('/{workshop}', 'update');
        Route::delete('/{workshop}', 'destroy');
    });
    // Catégories & options
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'show');
        Route::post('', 'store');
        Route::put('/{category}', 'update');
        Route::delete('/{category}', 'destroy');
    });
    Route::controller(OptionController::class)->prefix('options')->group(function () {
        Route::get('', 'index');
        Route::get('/{id}', 'show');
        Route::post('', 'store');
        Route::put('/{option}', 'update');
        Route::delete('/{option}', 'destroy');
    });
});
