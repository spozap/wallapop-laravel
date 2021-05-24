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

Route::get('/', 'ProductController@index_all')->name('main');

Route::get('/detalles/{id}' , 'ProductController@index_one')->name('products.index');

Route::get('/manage' , 'ProductController@index_user')->name('products.index.user');

Route::middleware(['auth:sanctum' , 'verified'])->delete('/delete/{id}' , 'ProductController@delete')->name('products.delete');

Route::middleware(['auth:sanctum' , 'verified'])->get('/create' , 'ProductController@product_form')->name('products.create');

Route::middleware(['auth:sanctum' , 'verified'])->post('/create' , 'ProductController@save_product')->name('products.create.post');