<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

Route::get('/', function () {
return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

