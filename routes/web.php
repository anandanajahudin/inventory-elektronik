<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAssetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', [DataController::class, 'index'])->name('index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DataController::class, 'dashboard'])->name('dashboard');

    //user account
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //asset
    Route::get('/assets', [AssetController::class, 'index'])->name('asset.index');
    Route::post('/assets/store', [AssetController::class, 'store'])->name('asset.store');
    Route::get('/assets/{asset}', [AssetController::class, 'show']);
    Route::put('/assets/{asset}', [AssetController::class, 'update'])->name('asset.update');
    Route::delete('/assets/{asset}', [AssetController::class, 'destroy']);

    //category
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    //product
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    //product_asset
    Route::get('/product_assets', [ProductAssetController::class, 'index'])->name('product_asset.index');
    Route::post('/product_assets/store', [ProductAssetController::class, 'store'])->name('product_asset.store');
    Route::get('/product_assets/{product_asset}', [ProductAssetController::class, 'show']);
    Route::put('/product_assets/{product_asset}', [ProductAssetController::class, 'update'])->name('product_asset.update');
    Route::delete('/product_assets/{product_asset}', [ProductAssetController::class, 'destroy']);

    //user
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});