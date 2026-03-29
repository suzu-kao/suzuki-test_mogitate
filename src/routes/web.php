<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Season;
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

// 商品一覧
Route::get('/products', [ProductController::class, 'index']);

// 商品詳細
Route::get('/products/detail/{productId}', [ProductController::class, 'show']);


// 登録画面
Route::get('/products/register',[ProductController::class, 'create']);

// 商品登録
Route::post('/products/register',[ProductController::class, 'store']);

// 検索
Route::get('/products/search', [ProductController::class, 'search']);

// 商品更新
Route::post('/products/{productId}/update', [ProductController::class, 'update']);

// 削除
Route::post('/products/{productId}/delete', [ProductController::class, 'destroy']);


