<?php

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard'); // Créez une vue pour le tableau de bord
    })->name('dashboard');

    // Module de gestion des ventes
    Route::prefix('sales')->name('sales.')->group(function () {
        Route::get('/', [App\Http\Controllers\SalesController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\SalesController::class, 'create'])->name('create');
        Route::post('/', [App\Http\Controllers\SalesController::class, 'store'])->name('store');
        Route::get('/{sale}', [App\Http\Controllers\SalesController::class, 'show'])->name('show');
        Route::get('/{sale}/edit', [App\Http\Controllers\SalesController::class, 'edit'])->name('edit');
        Route::put('/{sale}', [App\Http\Controllers\SalesController::class, 'update'])->name('update');
        Route::delete('/{sale}', [App\Http\Controllers\SalesController::class, 'destroy'])->name('destroy');
    });

    // Module de gestion des stocks
    Route::prefix('stocks')->name('stocks.')->group(function () {
        Route::resource('products', App\Http\Controllers\ProductController::class);
        Route::get('/', [App\Http\Controllers\StockController::class, 'index'])->name('index');
    });

    // Module de statistiques
    Route::prefix('statistics')->name('statistics.')->group(function () {
        Route::get('/', [App\Http\Controllers\StatisticsController::class, 'index'])->name('index');
        // Ajoutez d'autres routes pour des fonctionnalités de statistiques ici
    });

    Route::get('/cbn', [App\Http\Controllers\CbnController::class, 'index'])->name('cbn.index');
});
