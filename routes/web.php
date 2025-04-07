<?php

use Illuminate\Support\Facades\Route;
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


Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::get('auth/google', [App\Http\Controllers\PageController::class, 'redirect'])->name('google-auth');
Route::get('/auth/google/call-back', [App\Http\Controllers\PageController::class, 'callbackGoogle'] );
Route::get('/dummydata', [App\Http\Controllers\PageController::class, 'dummyData']);


Route::group(['middleware' => 'auth:client'], function () {

    Route::get('/view-cart', [App\Http\Controllers\PageController::class, 'view_cart']);
    Route::post('/add_to_cart/', [App\Http\Controllers\PageController::class, 'addToCart']);
    Route::get('/product/detail/{id}', [App\Http\Controllers\PageController::class, 'product_detail']);
    Route::get('/product/delete/{id}', [App\Http\Controllers\PageController::class, 'deleteCart']);
    Route::post('/increment/{id}', [App\Http\Controllers\PageController::class, 'increment']);
    Route::post('/decrement/{id}', [App\Http\Controllers\PageController::class, 'decrement']);
    Route::POST('/checkout/', [App\Http\Controllers\PageController::class, 'checkout']);

});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/register/', [App\Http\Controllers\Client\ClientController::class, 'register']);
    Route::post('/register/store/', [App\Http\Controllers\Client\ClientController::class, 'store']);
    Route::get('/login', [App\Http\Controllers\Client\ClientController::class, 'login'])->name('login');
    Route::post('/login/store/', [App\Http\Controllers\Client\ClientController::class, 'loginStore']);
    Route::post('/logout', [App\Http\Controllers\Client\ClientController::class, 'logout'])->name('logout');


});


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/product_create', [App\Http\Controllers\ProductController::class, 'create']);
    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store']);
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
    Route::PUT('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update']);
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete']);

    Route::get('/category', [App\Http\Controllers\CategoryCOntroller::class, 'index']);
    Route::get('/category/create', [App\Http\Controllers\CategoryCOntroller::class, 'create']);
    Route::post('/category/store', [App\Http\Controllers\CategoryCOntroller::class, 'store']);
    Route::get('/category/edit/{id}', [App\Http\Controllers\CategoryCOntroller::class, 'edit']);
    Route::put('/category/update/{id}', [App\Http\Controllers\CategoryCOntroller::class, 'update']);
    Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryCOntroller::class, 'delete']);

    Route::get('/brand', [App\Http\Controllers\BrandController::class, 'index']);
    Route::get('/brand/create', [App\Http\Controllers\BrandController::class, 'create']);
    Route::post('/brand/store', [App\Http\Controllers\BrandController::class, 'store']);
    Route::get('/brand/edit/{id}', [App\Http\Controllers\BrandController::class, 'edit']);
    Route::put('/brand/update/{id}', [App\Http\Controllers\BrandController::class, 'update']);
    Route::get('/brand/delete/{id}', [App\Http\Controllers\BrandController::class, 'delete']);


    Route::get('/order', [App\Http\Controllers\OrderController::class, 'index']);



});

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {

    Route::get('/register/', [App\Http\Controllers\Admin\AdminController::class, 'register']);
    Route::post('/register/store/', [App\Http\Controllers\Admin\AdminController::class, 'store']);
    Route::get('/login', [App\Http\Controllers\Admin\AdminController::class, 'login']);
    Route::post('/login/store/', [App\Http\Controllers\Admin\AdminController::class, 'loginStore']);

});


