<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDraftController;
use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/drafts', [OrderDraftController::class, 'index'])->name('drafts.index');
Route::get('/drafts/create', [OrderDraftController::class, 'create'])->name('drafts.create');
Route::post('/drafts', [OrderDraftController::class, 'store'])->name('drafts.store');
Route::get('/drafts/{draft}/edit', [OrderDraftController::class, 'edit'])->name('drafts.edit');
Route::put('/drafts/{draft}', [OrderDraftController::class, 'update'])->name('drafts.update');
Route::delete('/drafts/{draft}', [OrderDraftController::class, 'destroy'])->name('drafts.destroy');
Route::post('/drafts/{draft}/finalize', [OrderDraftController::class, 'finalize'])
     ->name('drafts.finalize');
Route::get('/orders', function () {
    $orders = \App\Models\Order::latest()->get();
    return view('orders.index', compact('orders'));
})->name('orders.index');

Route::get('/', function () {
    return view('welcome');
});
