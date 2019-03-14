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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/cms/books', 'middleware' => ['auth']], function () {
    Route::get('/', 'BookController@index')->name('books');
    Route::get('create', 'BookController@create')->name('books.create');
    Route::post('store', 'BookController@store')->name('books.store');
    Route::get('edit/{book}', 'BookController@edit')->name('books.edit');
    Route::post('update/{id}', 'BookController@update')->name('books.update');
    Route::get('destroy/{id}', 'BookController@destroy')->name('books.destroy');

});

Route::get('/api/books', 'BookController@publicapi');
