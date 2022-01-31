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

Route::get('/admin', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'produk', 'middleware' => 'auth'], function () {
    Route::get('/', 'ProductController@index')->name('products');
    Route::post('/create', 'ProductController@create')->name('product.create');
    Route::get('/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/{id}/update', 'ProductController@update')->name('product.update');
});

Route::group(['prefix' => 'kategori', 'middleware' => 'auth'], function () {
    Route::get('/', 'CategoryController@index')->name('categories');
    Route::post('/create', 'CategoryController@create')->name('category.create');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::post('/{id}/update', 'CategoryController@update')->name('category.update');
});

Route::group(['prefix' => 'order', 'middleware' => 'auth'], function () {
    Route::get('/', 'OrderController@index')->name('orders');
    Route::post('/create', 'OrderController@create')->name('order.create');
    Route::get('/{id}/edit', 'OrderController@edit')->name('order.edit');
    Route::post('/{id}/update', 'OrderController@update')->name('order.update');
});

Route::group(['prefix' => 'produkOrder', 'middleware' => 'auth'], function () {
    Route::get('/', 'OrderProductsController@index')->name('orderProducts');
    Route::post('/create', 'OrderProductsController@create')->name('orderProducts.create');
    Route::get('/{id}/edit', 'OrderProductsController@edit')->name('orderProducts.edit');
    Route::post('/{id}/update', 'OrderProductsController@update')->name('orderProducts.update');
});

Route::group(['prefix' => 'pembayaran', 'middleware' => 'auth'], function () {
    Route::get('/', 'PaymentController@index')->name('payments');
    Route::post('/create', 'PaymentController@create')->name('payment.create');
    Route::get('/{id}/edit', 'PaymentController@edit')->name('payment.edit');
    Route::post('/{id}/update', 'PaymentController@update')->name('payment.update');
});

Route::group(['prefix' => 'status', 'middleware' => 'auth'], function () {
    Route::get('/', 'StatusController@index')->name('statuses');
    Route::post('/create', 'StatusController@create')->name('status.create');
    Route::get('/{id}/edit', 'StatusController@edit')->name('status.edit');
    Route::post('/{id}/update', 'StatusController@update')->name('status.update');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    // Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    // Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    // Route::get('map', function () {return view('pages.maps');})->name('map');
    // Route::get('icons', function () {return view('pages.icons');})->name('icons');
    // Route::get('table-list', function () {return view('pages.tables');})->name('table');
    // Route::get('product', function () {return view('product.index');})->name('product');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
