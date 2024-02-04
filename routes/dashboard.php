<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\FactoryController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DescriptionController;

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::resource('/categories', CategoryController::class)->withTrashed();
    Route::resource('/factories', FactoryController::class)->withTrashed();
    Route::resource('/products', ProductController::class)->withTrashed();
    Route::resource('/users', UserController::class);

    Route::get('/description/factories/{id}', [DescriptionController::class, 'indexDescriptionFactory'])->name('descriptions.indexFactory');
    Route::get('/description/products/{id}', [DescriptionController::class, 'indexDescriptionProduct'])->name('descriptions.indexProduct');


    Route::get('/description/factories/create/{id}', [DescriptionController::class, 'createDescriptionFactory']) ->name('descriptions.createFactory');
    Route::get('/description/products/create/{id}', [DescriptionController::class, 'createDescriptionProduct']) ->name('descriptions.createProduct');


    Route::post('/description/factories/store', [DescriptionController::class, 'storeDescriptionFactory'])->name('descriptions.storeFactory');
    Route::post('/description/products/store', [DescriptionController::class, 'storeDescriptionProduct']) ->name('descriptions.storeProduct');


    Route::get('/description/factories/edit/{description_id}/{factory_id}', [DescriptionController::class, 'editDescriptionFactory']) ->name('descriptions.editFactory');
    Route::get('/description/products/edit/{id}', [DescriptionController::class, 'editDescriptionProduct']) ->name('descriptions.editProduct');


    Route::patch('/description/factories/update/{id}', [DescriptionController::class, 'updateDescriptionFactory']) ->name('descriptions.updateFactory');
    Route::patch('/description/products/update/{id}', [DescriptionController::class, 'updateDescriptionProduct']) ->name('descriptions.updateProduct');

    Route::get('/description/factories/delete/{id}', [DescriptionController::class, 'destroyDescriptionProduct']) ->name('descriptions.destroyFactory');
    Route::get('/description/products/delete/{id}', [DescriptionController::class, 'destroyDescriptionFactory']) ->name('descriptions.destroyProduct');

    Route::get('orders',[OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}',[OrderController::class, 'destroy'])->name('orders.delete');
    Route::get('orders/{id}/address/',[OrderController::class, 'orderAddress'])->name('orders.address');
    Route::get('orders/{id}/items/',[OrderController::class, 'orderItems'])->name('orders.items');

    Route::get('/categories/trashed', [CategoryController::class, 'trashedCategories'])->name('categories.trashed');
    Route::get('/categories/trashed', [FactoryController::class, 'trashedFactories'])->name('factories.trashed');
});
