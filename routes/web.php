<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'product','middleware' => 'auth'], function() {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::post('/create', 'ProductController@create')->name('product.create');
    // Route::post('/create', 'ProductController@store')->name('product.store');
    Route::get('/{user}/show', 'ProductController@show')->name('product.show');
    Route::get('/{user}/edit', 'ProductController@edit')->name('product.edit');
    Route::patch('/{id}/update', 'ProductController@update')->name('product.update');
    Route::post('/{id}/delete', 'ProductController@destroy')->name('product.destroy');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons');
    Route::get('table-list', function () {return view('pages.tables');})->name('table');
    // Route::get('product', function () {return view('product.index');})->name('product');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

