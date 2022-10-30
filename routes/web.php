<?php

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('Search');


Route::post('/like/posts', [App\Http\Controllers\HomeController::class, 'ajaxlike'])->name('posts.ajaxlike');

Route::get('/mypage', [App\Http\Controllers\HomeController::class, 'mypage'])->name('Mypage');

Route::get('/mystoredetail', [App\Http\Controllers\HomeController::class, 'mystoredetail'])->name('Mystore.detail');


Route::get('/like/all', [App\Http\Controllers\HomeController::class, 'likeall'])->name('Like');


Route::get('/article/all', [App\Http\Controllers\HomeController::class, 'articleall'])->name('articleAll');


Route::resource('/post', 'PostController');
Route::resource('/storedetail', 'StoreDetailController');
Route::resource('/article', 'ArticleController')->except(['create']);

Route::get('/article/create/{article}', 'ArticleController@create')->name('article.create');


Route::get('/saunaregister', [App\Http\Controllers\HomeController::class, 'saunaregister'])->name('sauna_register');

Route::post('/stuff/register', [App\Http\Controllers\HomeController::class, 'stuff'])->name('stuff.register');
// Route::post('/stuff/register', 'Auth\RegisterController@stuff')->name('stuff.register');
// Route::get('/stuff/home', 'LoginController@index')->name('stuff.home');

Route::get('store/all', [App\Http\Controllers\HomeController::class, 'storeAll'])->name('storeall');

	
