<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\OrderController;

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/products', [ProductController::class, 'index'])->name('fetch.list.products');
    Route::post('/checkout', [OrderController::class, 'store'])->name('save.order');
    Route::get('/orders', [OrderController::class, 'index'])->name('fetch.list.order');
});
