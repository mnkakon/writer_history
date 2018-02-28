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

Route::get('/', 'BookController@welcome');
Route::get('/add-book', 'BookController@add');
Route::post('/add-book-save', 'BookController@add_save');

//Ajax

Route::get('/ajax/{writer}', 'BookController@ajax');
