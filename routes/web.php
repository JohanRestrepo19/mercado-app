<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::group(['prefix' => '/users', 'middleware' => ['role:admin'], 'controller' => UserController::class], function () {
    Route::get('/', 'index')->name('users');
    Route::get('/create', 'create');
    Route::post('/create', 'store');
    Route::delete('/delete/{user}', 'delete');
    Route::get('/{user}/edit', 'edit');
    Route::post('/{user}', 'update');
});

// NOTE: Products routing
Route::group(['prefix' => '/products',  'controller' => ProductController::class], function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/', 'index')->name('products');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::delete('/delete/{product}', 'delete');
        Route::get('/{product}/edit', 'edit');
        Route::post('/{product}', 'update');
    });

    Route::get('/{product}', 'show');
});

// NOTE: Cart routing
Route::group(['prefix' => '/cart', 'middleware' => ['role:admin|user'], 'controller' => CartController::class], function () {
    Route::get('/', 'index')->name('cart');
    Route::get('/{item}', 'getCartItemImage');
});

// NOTE: Categories routing.
Route::group(['prefix' => '/categories', 'controller' => CategoryController::class], function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/', 'index')->name('categories');
        Route::get('/categoriesForDataTable', 'getCategoriesForDataTable');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{category}/edit', 'edit');
        Route::post('/{category}', 'update');
        Route::delete('/delete/{category}', 'delete');
    });

    Route::get('/{category}', 'showCategoryWithProducts');
});

Auth::routes();
