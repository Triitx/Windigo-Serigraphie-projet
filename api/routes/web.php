<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');//->middleware(['verified']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');