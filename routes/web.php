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
Route::get('/', 'ItemController@index')->name('item.home');
Route::get('/home', 'ItemController@index')->name('home');

Route::get('/item/{id}', 'ItemController@detail')->name('item.profile');

Route::group(['prefix' => 'admin'], function() {
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
  });

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function()     {
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	Route::get('/', 'Admin\ItemController@index')->name('item.index');
	Route::get('/item', 'Admin\ItemController@index');
	Route::get('/item/{id}', 'Admin\ItemController@detail')->name('item.detail')->where('id', '[0-9]+');
	Route::get('/item/create', 'Admin\ItemController@create')->name('item.create');
	Route::post('/item/store', 'Admin\ItemController@store')->name('item.store');
	Route::get('/item/{item}/edit', 'Admin\ItemController@edit')->name('item.edit');
	Route::patch('/item/{item}', 'Admin\ItemController@update')->name('item.update');
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth:user'], function() {
   Route::get('/index', 'CartController@index')->name('cart.index');
   Route::post('/add', 'CartController@add')->name('cart.add');
   Route::post('/del', 'CartController@del')->name('cart.del');
 });

