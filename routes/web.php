<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [IndexController::class, 'index'])->name('indexController');
Route::get('/catalog{catalog}', [ProductController::class, 'showCatalog'])->name('showCatalog');
Route::get('/catalog{catalog}/{product_id}', [ProductController::class, 'show'])->name('showProduct');

Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::get('/basket/order', [BasketController::class, 'basketOrder'])->name('basketOrder');
Route::post('/basket/add/{id}', [BasketController::class, 'basketAdd'])->name('basketAdd');
Route::post('/basket/remove/{id}', [BasketController::class, 'basketRemove'])->name('basketRemove');
Route::post('/basket/order', [BasketController::class, 'basketConfirm'])->name('basketConfirm');

