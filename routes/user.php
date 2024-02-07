<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\FactoryController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\FactoryDetailController;
use App\Http\Controllers\user\ProductDetailController;

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.index');
    Route::get('/user/products', [ProductController::class, 'index'])->name('user.products');
    Route::get('/user/products/{id}', [ProductDetailController::class, 'index'])->name('product.details');
    Route::get('/user/factories', [FactoryController::class, 'index'])->name('user.factories');
    Route::get('/user/factories/{id}', [FactoryDetailController::class, 'index'])->name('factory.details');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/create', [CartController::class, 'addItem'])->name('cart.create');
    Route::post('/cart/update', [CartController::class, 'updateItem'])->name('cart.update');
    Route::post('/cart/delete', [CartController::class, 'deleteItem'])->name('cart.delete');

    Route::get('profile/settings',[ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/settings',[ProfileController::class, 'update'])->name('profile.settings.update');



    Route::get('checkout', [CheckoutController::class , 'index'])->name('checkout.index');
    Route::post('place-order', [CheckoutController::class , 'place_order'])->name('place-order');

    Route::get('/my-orders', [UserController::class , 'index'])->name('order.index');
    Route::get('/view-order/{id}', [UserController::class , 'view'])->name('order.view');


});
