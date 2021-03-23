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

Auth::routes();

Route::get('/home', 'TapelController@index')->name('home');

Route::get('/', 'TapelController@index')->name('index');
Route::post('/store', 'TapelController@store')->name('store');
Route::get('/{id}/edit', 'TapelController@edit')->name('edit');
Route::put('/update', 'TapelController@update')->name('update');
Route::post('delete', 'TapelController@delete')->name('delete');
Route::post('publish', 'TapelController@publish')->name('publish');

