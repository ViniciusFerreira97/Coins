<?php

use Illuminate\Support\Facades\Route;

Route::get('/coins/{price}', [App\Http\Controllers\ProductController::class, 'getAllCoins']);
Route::post('/shop', [App\Http\Controllers\LocationController::class, 'getShopLocation']);