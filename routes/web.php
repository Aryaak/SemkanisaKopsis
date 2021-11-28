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
Route::group(['prefix' => 'produk','middleware' => 'auth'], function() {
    Route::get('/', 'ProductController@index')->name('products');
    Route::post('/create', 'ProductController@create')->name('product.create');
    Route::get('/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/{id}/update', 'ProductController@update')->name('product.update');
});

Route::group(['prefix' => 'kategori','middleware' => 'auth'], function() {
    Route::get('/', 'CategoryController@index')->name('categories');
    Route::post('/create', 'CategoryController@create')->name('category.create');
    Route::get('/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::post('/{id}/update', 'CategoryController@update')->name('category.update');
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

