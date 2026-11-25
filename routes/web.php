<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductWebController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Halo, Laravel';
});

// CRUD Produk via Blade (web)
Route::resource('produk', ProductWebController::class);
