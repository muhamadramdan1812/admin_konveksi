<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDraftController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Resellers & Products
|--------------------------------------------------------------------------
*/
Route::resource('resellers', ResellerController::class);
Route::resource('products', ProductController::class);

/*
|--------------------------------------------------------------------------
| Orders
|--------------------------------------------------------------------------
*/
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])
    ->name('orders.updateStatus');

/*
|--------------------------------------------------------------------------
| Draft Orders
|--------------------------------------------------------------------------
*/
Route::get('/drafts', [OrderDraftController::class, 'index'])->name('drafts.index');
Route::get('/drafts/create', [OrderDraftController::class, 'create'])->name('drafts.create');
Route::post('/drafts', [OrderDraftController::class, 'store'])->name('drafts.store');
Route::get('/drafts/{draft}/edit', [OrderDraftController::class, 'edit'])->name('drafts.edit');
Route::put('/drafts/{draft}', [OrderDraftController::class, 'update'])->name('drafts.update');
Route::delete('/drafts/{draft}', [OrderDraftController::class, 'destroy'])->name('drafts.destroy');
Route::post('/drafts/{draft}/finalize', [OrderDraftController::class, 'finalize'])
    ->name('drafts.finalize');
