<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('user_status');

Route::get('/products', 'ProductsController@getHome')->name('products.home');
Route::post('/products', 'ProductsController@postStore')->name('products.store');
Route::get('/products-create', 'ProductsController@getCreate')->name('products.create');
Route::get('/products/edit/{product}','ProductsController@getEdit')->name('products.edit');
Route::put('/products/edit/{product}','ProductsController@putUpdate')->name('products.update');
Route::delete('/products/{product}','ProductsController@productDestroy')->name('products.destroy');


Route::get('/categories/{module}', 'CategoryController@home')->name('categories.home');
Route::post('/categories/add', 'CategoryController@postCategoryAdd')->name('category.add');
Route::get('/categories/{category}/edit', 'CategoryController@editCategory')->name('category.edit');
Route::put('/categories/{category}', 'CategoryController@updateCategory')->name('category.update');
Route::delete('/categories/{category}','CategoryController@deleteCategory')->name('category.destroy');

Route::get('/users/{status}', 'UserController@getHome')->name('users.home');
Route::get('/users/show/{user}', 'UserController@getShow')->name('users.show');
Route::get('/users/banned/{user}', 'UserController@getBanned')->name('users.banned');

Route::get('/users/banned/help', 'UserController@getBanned')->name('help');
