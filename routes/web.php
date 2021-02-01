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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', 'ProductController@index')->name('home');

Route::prefix('product')->group(function(){
    Route::get('view', 'ProductController@viewProduct')->name('view.product');
    Route::get('add', 'ProductController@addProduct')->name('add.product');
    Route::post('store', 'ProductController@storeProduct')->name('store.product');
    Route::get('edit/{id}', 'ProductController@editProduct')->name('edit.product');
    Route::post('update/{id}', 'ProductController@updateProduct')->name('update.product');
    Route::get('delete/{id}', 'ProductController@deleteProduct')->name('delete.product');
});