<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard'); // Créez une vue pour le tableau de bord
    })->name('dashboard');

    Route::resource('orders', OrderController::class);
    

    // Module de gestion des stocks
    Route::prefix('stocks')->name('stocks.')->group(function () {
        Route::resource('products', App\Http\Controllers\ProductController::class);
        Route::get('/', [App\Http\Controllers\StockController::class, 'index'])->name('index');
    });

    // Module de statistiques
    Route::prefix('statistics')->name('statistics.')->group(function () {
        // Page de sélection de produit
        Route::get('/', [App\Http\Controllers\StatisticsController::class, 'index'])->name('index');
        
        // Afficher les statistiques d'un produit spécifique
        Route::post('/product', [App\Http\Controllers\StatisticsController::class, 'showProductStatistics'])->name('product');
    });


    Route::get('/cbn', [App\Http\Controllers\CbnController::class, 'index'])->name('cbn.index');
});
