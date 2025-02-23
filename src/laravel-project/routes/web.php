<?php

use Illuminate\Support\Facades\Route;

// コントローラー読み込み
use App\Http\Controllers\ProductController;

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

// 商品一覧画面
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 商品一覧画面から登録画面
Route::get('/products/register', [ProductController::class, 'create'])->name('products.register');

// 商品登録処理（追加）
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 商品一覧画面から詳細画面
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');
Route::put('/products/{productId}', [ProductController::class, 'update'])->name('products.update');  // 商品更新
Route::delete('/products/{productId}', [ProductController::class, 'destroy'])->name('products.destroy'); // 削除
