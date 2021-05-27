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

Route::middleware(['auth:sanctum' , 'verified'])->get('/dashboard' , function() {
    return view('dashboard');
})->name('dashboard');


Route::get('/', 'ProductController@index_all')->name('main');

Route::get('/detalles/{id}' , 'ProductController@index_one')->name('products.index');

Route::get('/manage' , 'ProductController@index_user')->name('products.index.user');

Route::middleware(['auth:sanctum' , 'verified'])->delete('/delete/{id}' , 'ProductController@delete')->name('products.delete');

Route::middleware(['auth:sanctum' , 'verified'])->get('/create' , 'ProductController@product_form')->name('products.create');

Route::middleware(['auth:sanctum' , 'verified'])->post('/create' , 'ProductController@save_product')->name('products.create.post');

Route::middleware(['auth:sanctum' , 'verified'])->put('/edit/{id}' , 'ProductController@update_product')->name('products.put');

Route::middleware(['auth:sanctum' , 'verified'])->get('/category/create', 'CategoryController@create_form')->name('category.create.form');

Route::middleware(['auth:sanctum' , 'verified'])->post('/category/create' , 'CategoryController@create')->name('category.create');

Route::middleware(['auth:sanctum' , 'verified'])->get('/category/manage' , 'CategoryController@index')->name('category.manage');

Route::middleware(['auth:sanctum' , 'verified'])->get('/edit/{id}' , 'ProductController@update_form')->name('products.edit.form');

Route::middleware(['auth:sanctum' , 'verified'])->get('/category/edit/{id}' , 'CategoryController@update_form')->name('category.edit.form');

Route::middleware(['auth:sanctum' , 'verified'])->put('/category/edit/{id}' , 'CategoryController@update_cat')->name('category.put');

Route::middleware(['auth:sanctum' , 'verified'])->delete('category/delete/{id}' , 'CategoryController@delete')->name('category.delete');
