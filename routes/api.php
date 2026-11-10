<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Halo, Laravel';
});

// Route custom HARUS sebelum Route::resource
// agar tidak tertimpa oleh {product} dari resource
Route::get('/products/trashed', [ProductsController::class, 'trashed']);
Route::patch('/products/{id}/restore', [ProductsController::class, 'restore']);

Route::resource('products', ProductsController::class);
Route::resource('categories', CategoryController::class);

Route::get('/about', [AboutController::class, 'about']);
