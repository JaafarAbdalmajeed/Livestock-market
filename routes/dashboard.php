<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\FactoryController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\CategoryController;


Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');

    Route::resource('/categories', CategoryController::class)->withTrashed();
    Route::resource('/factories', FactoryController::class)->withTrashed();
    Route::resource('/products', ProductController::class)->withTrashed();
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/categories/trashed', [CategoryController::class, 'trashedCategories'])->name('categories.trashed');
    Route::get('/categories/trashed', [FactoryController::class, 'trashedFactories'])->name('factories.trashed');
});
