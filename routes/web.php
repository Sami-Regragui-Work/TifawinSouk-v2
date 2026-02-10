<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::prefix('admin')->name('admin.')->group(function (){
//     //Route::get('/', []) statistiques
//     Route::get('/users', [UserController::class, 'index']);
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::post('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::prefix('admin')->name('admin.')->group(function (){
//     //Route::get('/', []) statistiques
//     Route::get('/users', [UserController::class, 'index']);
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// sami

Route::middleware(['auth'])->prefix('client')->name('client.')->group(function () {
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [ClientOrderController::class, 'index'])->name('index');
        Route::post('/', [ClientOrderController::class, 'store'])->name('store');
        Route::prefix('{order}')->group(function () {
            Route::get('/', [ClientOrderController::class, 'show'])->name('show');
            Route::delete('/', [ClientOrderController::class, 'destroy'])->name('destroy');
        })->middleware('owns.order:order');
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('index');
        Route::get('/{order}', [AdminOrderController::class, 'show'])->name('show');
    });
    // ait
     Route::prefix('users')->name('users.')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'store'])->name('store');
        Route::get('/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit/{user}', [UserController::class, 'update'])->name('update');
    });
    //Route::get('/', [UserController::class, 'index'])->name('index');
    //Route::post('/', [AdminController::class, 'login'])->name('login');
});

require __DIR__.'/auth.php';

