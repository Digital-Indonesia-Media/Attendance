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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'TapelController@index')->name('dashboard');

// Route::get('/', 'TapelController@index')->name('index');


Route::get('/tapel', 'TapelController@index')->name('tapel-index');
Route::post('/tapel/store', 'TapelController@store')->name('tapel-store');
Route::get('/tapel/{id}', 'TapelController@desc')->name('tapel-desc');
Route::get('/tapel/{id}/{kelas}', 'TapelController@nameStudent')->name('tapel-nameStudent');
Route::get('/tapel/{id}/edit', 'TapelController@edit')->name('tapel-edit');
Route::put('/tapel/update', 'TapelController@update')->name('tapel-update');
Route::post('/tapel/delete', 'TapelController@delete')->name('tapel-delete');
Route::post('/tapel/publish', 'TapelController@publish')->name('tapel-publish');

Route::get('/mapel', 'MapelController@index')->name('mapel-index');
Route::post('/mapel/store', 'MapelController@store')->name('mapel-store');
Route::get('/mapel/{id}/edit', 'MapelController@edit')->name('mapel-edit');
Route::put('/mapel/update', 'MapelController@update')->name('mapel-update');
Route::post('/mapel/delete', 'MapelController@delete')->name('mapel-delete');
Route::post('/mapel/publish', 'MapelController@publish')->name('mapel-publish');

Route::get('/user', 'UserController@index')->name('user-index');
Route::post('/user/store', 'UserController@store')->name('user-store');
Route::get('/user/{id}/edit', 'UserController@edit')->name('user-edit');
Route::put('/user/update', 'UserController@update')->name('user-update');
Route::post('/user/delete', 'UserController@delete')->name('user-delete');

Route::get('/kelas', 'KelasController@index')->name('kelas-index');
Route::post('/kelas/store', 'KelasController@store')->name('kelas-store');
Route::get('/kelas/{id}/edit', 'KelasController@edit')->name('kelas-edit');
Route::put('/kelas/update', 'KelasController@update')->name('kelas-update');
Route::post('/kelas/delete', 'KelasController@delete')->name('kelas-delete');

Route::get('/jadwal', 'JadwalController@index')->name('jadwal-index');
Route::post('/jadwal/store', 'JadwalController@store')->name('jadwal-store');
Route::get('/jadwal/{id}/edit', 'JadwalController@edit')->name('jadwal-edit');
Route::put('/jadwal/update', 'JadwalController@update')->name('jadwal-update');
Route::post('/jadwal/delete', 'JadwalController@delete')->name('jadwal-delete');


