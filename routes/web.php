<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// NOTE: test routing
Route::group(['prefix' => '/test'], function () {
    Route::get('/', [CategoryController::class, 'getAllCategoriesPreview']);
    Route::get('/category/{category}', [CategoryController::class, 'categoryWithProducts']);
});

Route::get('/', [CategoryController::class, 'showAllCategoriesWithProducts'])->name('home');

// NOTE: Users routing
Route::group(['prefix' => '/users', 'controller' => UserController::class], function () {
    Route::get('/', 'index')->name('users');
    Route::get('/create', 'create');
    Route::post('/create', 'store');
    Route::delete('/delete/{user}', 'delete');
    Route::get('/{user}/edit', 'edit');
    Route::post('/{user}', 'update');
});

// NOTE: Products routing
Route::group(['prefix' => '/products', 'controller' => ProductController::class], function () {
    Route::get('/', 'index')->name('products');
    Route::get('/create', 'create');
    Route::delete('/delete/{product}', 'delete');
});

// NOTE: Categories routing
Route::group(['prefix' => '/categories', 'controller' => CategoryController::class], function () {
    Route::get('/{category}', 'showCategoryWithProducts');
});

// NOTE: Sales routing
Route::group(['prefix' => '/sales', 'controller' => SaleController::class], function () {
});

Auth::routes();
