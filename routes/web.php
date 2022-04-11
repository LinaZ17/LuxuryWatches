<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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


Auth::routes([
    'reset'=>'false',
    'confirm'=>'false',
    'verify'=>'false'
]);


Route::get('/logout', ' Auth\LoginController@logout ')->name('getLogout');

Route::group(['middleware' => 'auth',
    'namespace' => 'Admin'
], function (){
    Route::get('/orders', [OrderController::class, 'index'])->name('home');
});


Route::get('/', [IndexController::class, 'index'])->name('indexController');
Route::get('/catalog{catalog}', [ProductController::class, 'showCatalog'])->name('showCatalog');
Route::get('/catalog{catalog}/{product_id}', [ProductController::class, 'show'])->name('showProduct');

Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
Route::get('/basket/order', [BasketController::class, 'basketOrder'])->name('basketOrder');
Route::post('/basket/add/{id}', [BasketController::class, 'basketAdd'])->name('basketAdd');
Route::post('/basket/remove/{id}', [BasketController::class, 'basketRemove'])->name('basketRemove');
Route::post('/basket/order', [BasketController::class, 'basketConfirm'])->name('basketConfirm');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/contactEmail', [ContactController::class, 'contactEmail'])->name('contactEmail');


