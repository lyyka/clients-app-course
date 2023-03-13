<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Route::prefix('/clients')->group(function() {
//    Route::get('/', [ClientController::class, 'index'])->name('clients.index');
//    Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
//    Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
//    Route::post('/store', [ClientController::class, 'store'])->name('clients.store');
//    Route::put('/{id}/update', [ClientController::class, 'update'])->name('clients.update');
//    Route::delete('/{id}/delete', [ClientController::class, 'destroy'])->name('clients.destroy');
//});

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
Route::put('/clients/{client}/update', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}/delete', [ClientController::class, 'destroy'])->name('clients.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
