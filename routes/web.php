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

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::get('/', 'BorrowingController@index');
	Route::get('home', 'BorrowingController@index');
	Route::post('create', 'BorrowingController@store');

	Route::prefix('admin')->middleware('super')->group(function () {
		Route::get('/', 'Auth\UserController@create');
		Route::prefix('user')->group(function () {
			Route::get('/', 'Auth\UserController@index');
			Route::post('{id}/update', 'Auth\UserController@update');
			Route::get('{id}/destroy', 'Auth\UserController@destroy');
		});
		Route::prefix('buku')->group(function () {
			Route::get('/', 'BookListController@index');
			Route::get('create', 'BookListController@create');
			Route::post('create', 'BookListController@store');
			Route::post('{id}/update', 'BookListController@update');
			Route::get('{id}/destroy', 'BookListController@destroy');
		});
		Route::prefix('stok')->group(function () {
			Route::get('/', 'StockOfBooksController@index');
			Route::get('create', 'StockOfBooksController@create');
			Route::post('create', 'StockOfBooksController@store');
			Route::post('{id}/add', 'StockOfBooksController@add');
			Route::post('{id}/update', 'StockOfBooksController@update');
			Route::get('{id}/destroy', 'StockOfBooksController@destroy');
		});
		Route::prefix('peminjaman')->group(function () {
			Route::get('/', 'BorrowingController@create');
			Route::get('{id}/store', 'BorrowingController@show');
		});
		Route::prefix('pengembalian')->group(function () {
			Route::get('/', 'BorrowingController@upgrade');
			Route::get('{id}/destroy', 'BorrowingController@destroy');
		});
	});
});

