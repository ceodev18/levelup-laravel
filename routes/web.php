<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/', function () {
    return view('auth.login');
});

// Articles Routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Search Route
Route::get('/search', [ArticleController::class, 'search'])->name('articles.search');

Auth::routes();





Route::get('/home-usuario', [App\Http\Controllers\HomeController::class, 'usuario'])->name('home-usuario')->middleware('checkRole:usuario');

Route::get('/shopping', [App\Http\Controllers\HomeController::class, 'usuario'])->name('home-usuario')->middleware('checkRole:usuario');

Route::middleware(['auth'])->group(function () {
    Route::get('/add-to-cart', [App\Http\Controllers\CartController::class, 'showAddToCartForm'])->name('add-to-cart');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/view', [App\Http\Controllers\CartController::class, 'view'])->name('cart.view');
});


Route::get('/admin-usuario', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin-usuario')->middleware('checkRole:admin');
Route::get('/editor-usuario', [App\Http\Controllers\HomeController::class, 'editor'])->name('editor-usuario')->middleware('checkRole:editor');


Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::view('/access-denied', 'access-denied')->name('access-denied');




