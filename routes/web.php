<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/product', function () {
    return redirect('/product');
});

Route::resource('product', ProductsController::class);

Route::get('/DetailProduct', function () {
    return view('DetailProduct');
});

