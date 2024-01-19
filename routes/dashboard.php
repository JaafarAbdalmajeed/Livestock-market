<?php

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');
});
