<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
Route::post('/categories/{categoryId}/restore-category', [CategoryController::class, 'restoreCategory'])->name('categories.restore');
Route::post('/categories/{categoryId}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.force-delete');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
// Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// Route::get('/categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
// Route::post('/categories/{categoryId}/restore-category', [CategoryController::class, 'restoreCategory'])->name('categories.restore');
// Route::post('/categories/{categoryId}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.force-delete');