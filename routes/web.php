<?php

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

Auth::routes();

Route::get('/home', 'CategoriesController@index')->name('home');
Route::get('/categories/sortCategories', 'CategoriesController@sortCategories');
Route::get('/categories/sortCategoriesDesc', 'CategoriesController@sortCategoriesDesc');
//create category
Route::post('/categories/create', 'CategoriesController@addCategory');
//edit category 
Route::post('/category/edit', 'CategoriesController@editCategory');
Route::get('/getEditCategory/{id}', 'CategoriesController@getCategory');
//delete category
Route::get('/categories/delete/{id}', 'CategoriesController@deleteCategory');

//get products from category
Route::get('/products/{id}', 'ProductsController@index');
//edit product
Route::get('/getEditProduct/{id}', 'ProductsController@getProduct');
Route::post('/products/edit', 'ProductsController@editProduct');
//add product
Route::post('/products/create', 'ProductsController@addProduct');
//delete product
Route::get('/products/delete/{id}', 'ProductsController@deleteProduct');
//add product to shopping cart
Route::post('/shoppingcart/add/{id}', 'ShoppingCartController@add')->name('add');
//update item form shopping cart
Route::post('/shoppingcart/updateItem/{id}', 'ShoppingCartController@updateItem')->name('updateItem');
//delete item from shoppingcart
Route::get('/shoppingcart/deleteItem/{id}', 'ShoppingCartController@deleteItem');
//place order
Route::get('/shoppingcart/placeOrder', 'ShoppingCartController@placeOrder');

Route::get('/shoppingcart/getAll', 'ShoppingCartController@getALl');

Route::get('/orders/getAll', 'OrderController@index');