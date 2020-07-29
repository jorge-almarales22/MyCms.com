<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/estadisticas', 'ProductsController@getEstadistica')->name('estadisticas');

Route::get('/products', 'ProductsController@getHome')->name('products_home');
Route::post('/products', 'ProductsController@postStore')->name('products_store');
Route::get('/products/create', 'ProductsController@getCreate')->name('products_create');
Route::get('/products/search', 'ProductsController@getSearch')->name('products_search');
Route::get('/products/{product}','ProductsController@productDestroy')->name('products_destroy');
Route::get('/products/edit/{product}','ProductsController@getEdit')->name('products_edit');
Route::put('/products/edit/{product}','ProductsController@putUpdate')->name('products_edit');


Route::get('/categories/{module}', 'CategoryController@home')->name('categories_home');
Route::post('/categories/add', 'CategoryController@postCategoryAdd')->name('category_add');
Route::delete('/categories/{category}','CategoryController@deleteCategory')->name('category_destroy');
Route::get('/categories/edit/{category}', 'CategoryController@editCategory')->name('category_edit');
Route::put('/categories/edit/{category}', 'CategoryController@updateCategory')->name('category_edit');


Route::get('/users/{status}', 'UserController@getHome')->name('users_home');
Route::post('/users/edit/{user}', 'UserController@postUserEdit')->name('users_edit');
Route::get('/users/show/{user}', 'UserController@getShow')->name('users_show');
Route::get('/users/permissions/{user}', 'UserController@getUserPermissions')->name('users_permissions');
Route::post('/users/permissions/{user}', 'UserController@postUserPermissions')->name('users_permissions');
Route::get('/users/banned/{user}', 'UserController@getBanned')->name('users_banned');

Route::get('/help', 'HelpController@getHelp')->name('help')->middleware('isadmin');
