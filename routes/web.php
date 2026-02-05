<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

Route::get('/', function () {
return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::post('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
