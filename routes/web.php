<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IPBlockMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return "HOME";
})->name('home');

//Route::middleware([\App\Http\Middleware\IPBlockMiddleware::class])->group(function() {

Route::middleware(['guest:web'])->group(function() {
    // moze da pristupi samo neko ko NIJE admin
    Route::get('/user/login', [UserAuthController::class, 'loginShow'])
        ->name('user.login.show');

    Route::post('/user/login', [UserAuthController::class, 'login'])
        ->name('user.login.store');
});

Route::middleware(['auth:web'])->group(function() {
    // samo za ulogovane administratore
    Route::post('/user/logout', [UserAuthController::class, 'logout'])
        ->name('user.logout');
});

Route::middleware(['guest:admin'])->group(function() {
    // moze da pristupi samo neko ko NIJE admin
    Route::get('/admin/login', [AdminAuthController::class, 'loginShow'])
        ->name('admin.login.show');

    Route::post('/admin/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.store');
});

Route::middleware(['auth:admin'])->group(function() {
    // samo za ulogovane administratore
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');
});

Route::middleware(['auth:admin,web'])->group(function() {
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
});
