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
Route::get('/', 'HomeController@login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'TapelController@index')->name('dashboard');

// Route::get('/', 'TapelController@index')->name('index');


Route::get('/tapel', 'TapelController@index')->name('tapel-index');
Route::post('/tapel/store', 'TapelController@store')->name('tapel-store');
Route::get('/tapel/{id}/desc', 'TapelController@desc')->name('tapel-desc');
Route::get('/tapel/{id}/{kelas}', 'TapelController@nameStudent')->name('tapel-nameStudent');
Route::get('/tapel/{id}/mapel/{mapel}/pertemuan', 'TapelController@pertemuan')->name('tapel-pertemuan');
Route::get('/{id}/tapel/edit', 'TapelController@edit')->name('tapel-edit');
Route::put('/tapel/update', 'TapelController@update')->name('tapel-update');
Route::post('/tapel/delete', 'TapelController@delete')->name('tapel-delete');
Route::post('/tapel/publish', 'TapelController@publish')->name('tapel-publish');
Route::post('/tapel/start', 'TapelController@start')->name('tapel-start');

Route::get('/mapel', 'MapelController@index')->name('mapel-index');
Route::get('/mapel/{id}', 'MapelController@tapel')->name('mapel-tapel');
Route::post('/mapel/store', 'MapelController@store')->name('mapel-store');
Route::post('/mapel/import', 'MapelController@import')->name('mapel-import');
Route::get('/mapel/{id}/edit', 'MapelController@edit')->name('mapel-edit');
Route::put('/mapel/update', 'MapelController@update')->name('mapel-update');
Route::post('/mapel/delete', 'MapelController@delete')->name('mapel-delete');
Route::post('/mapel/publish', 'MapelController@publish')->name('mapel-publish');
Route::post('/mapel/nonActive', 'MapelController@nonActive')->name('mapel-nonActive');
Route::post('/mapel/active', 'MapelController@active')->name('mapel-active');

Route::get('/user', 'UserController@index')->name('admin-user');
Route::get('/user/{id}', 'UserController@user')->name('user-index');
Route::get('/user/siswa/{id}', 'UserController@siswa')->name('user-siswa');
Route::post('/user/siswa/import', 'UserController@import')->name('user-import');
Route::post('/user/store', 'UserController@store')->name('user-store');
Route::get('/user/{id}/edit', 'UserController@edit')->name('user-edit');
Route::put('/user/update', 'UserController@update')->name('user-update');
Route::post('/user/delete', 'UserController@delete')->name('user-delete');

Route::get('/kelas', 'KelasController@index')->name('kelas-index');
Route::get('/kelas/kelas/{id}', 'KelasController@kelas')->name('kelas-kelas');
Route::post('/kelas/store', 'KelasController@store')->name('kelas-store');
Route::post('/kelas/import', 'KelasController@import')->name('kelas-import');
Route::get('/kelas/{id}/edit', 'KelasController@edit')->name('kelas-edit');
Route::put('/kelas/update', 'KelasController@update')->name('kelas-update');
Route::post('/kelas/delete', 'KelasController@delete')->name('kelas-delete');

Route::get('/jadwal', 'JadwalController@index')->name('jadwal-index');
Route::get('/jadwal/{id}', 'JadwalController@tapel')->name('jadwal-tapel');
Route::get('/jadwal/kelas/{id}', 'JadwalController@kelas')->name('jadwal-kelas');
Route::post('/jadwal/store', 'JadwalController@store')->name('jadwal-store');
Route::post('/jadwal/import', 'JadwalController@import')->name('jadwal-import');
Route::get('/jadwal/{id}/edit', 'JadwalController@edit')->name('jadwal-edit');
Route::put('/jadwal/update', 'JadwalController@update')->name('jadwal-update');
Route::post('/jadwal/delete', 'JadwalController@delete')->name('jadwal-delete');

Route::get('/pertemuan', 'PertemuanController@index')->name('pertemuan-index');
Route::get('/pertemuan/{id}', 'PertemuanController@tapel')->name('pertemuan-tapel');
Route::get('/pertemuan/kelas/{id}', 'PertemuanController@kelas')->name('pertemuan-kelas');
Route::get('/pertemuan/mapel/{id}', 'PertemuanController@mapel')->name('pertemuan-mapel');
Route::post('/pertemuan/store', 'PertemuanController@store')->name('pertemuan-store');
Route::post('/pertemuan/store', 'PertemuanController@store')->name('pertemuan-store');
Route::post('/pertemuan/import', 'PertemuanController@import')->name('pertemuan-import');
Route::get('/pertemuan/{id}/edit', 'PertemuanController@edit')->name('pertemuan-edit');
Route::post('/pertemuan/update', 'PertemuanController@update')->name('pertemuan-update');
Route::post('/pertemuan/delete', 'PertemuanController@delete')->name('pertemuan-delete');

Route::group(['middleware' => ['admin']], function() {
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::get('/admin/profile', 'AdminController@profile')->name('admin-profile');
	Route::post('/admin/profile/update', 'AdminController@update')->name('admin-profile-update');

});

Route::group(['middleware' => ['ortu']], function() {
	Route::get('/ortu', 'OrtuController@index')->name('ortu');
	Route::get('/ortu/riwayat', 'OrtuController@riwayat')->name('ortu-riwayat');
	Route::get('/ortu/profile', 'OrtuController@profile')->name('ortu-profile');
	

});

Route::group(['middleware' => ['guru']], function () {
	Route::get('/guru', 'GuruController@index')->name('guru');
	Route::get('/guru/tapel', 'GuruController@tapel')->name('guru-tapel');
	Route::get('/guru/kelas/{id}', 'GuruController@kelas')->name('guru-kelas');
	Route::get('/guru/perkelas/{id}', 'GuruController@perkelas')->name('guru-perkelas');
	Route::get('/guru/riwayat/{id}', 'GuruController@riwayat')->name('guru-riwayat');
	Route::get('/guru/jadwal', 'GuruController@jadwal')->name('guru-jadwal');
	Route::get('/guru/{id}/pertemuan', 'GuruController@pertemuan')->name('guru-pertemuan');
	Route::get('/guru/pertemuan/{id}/edit', 'GuruController@edit')->name('guru-pertemuan-edit');
	Route::post('/guru/pertemuan/{id}/update', 'GuruController@update')->name('guru-pertemuan-update');
	Route::post('/guru/pertemuan/store', 'GuruController@store')->name('guru-pertemuan-store');
	Route::post('/guru/pertemuan/delete', 'GuruController@delete')->name('guru-pertemuan-delete');
	Route::post('/guru/pertemuan/publish', 'GuruController@publish')->name('guru-pertemuan-publish');
	Route::get('/guru/pertemuan/kehadiran/siswa/{id}', 'GuruController@kehadiran')->name('guru-kehadiran-siswa');
	Route::post('/guru/{id}/pertemuan/izin/terima', 'GuruController@izinTerima')->name('guru-pertemuan-izin-terima');
	Route::post('/guru/{id}/pertemuan/izin/tolak', 'GuruController@izinTolak')->name('guru-pertemuan-izin-tolak');
	Route::get('/guru/profile', 'GuruController@profile')->name('guru-profile');
	Route::get('/guru/kehadiranExport/{id}', 'GuruController@kehadiranExport')->name('download-kehadiran');
});

Route::group(['middleware' => ['siswa']], function () {
	Route::get('/siswa', 'SiswaController@index')->name('siswa');
	Route::get('/siswa/jadwal', 'SiswaController@jadwal')->name('siswa-jadwal');
	Route::get('/siswa/{id}/pertemuan', 'SiswaController@pertemuan')->name('siswa-pertemuan');
	Route::post('/siswa/{id}/pertemuan/hadir', 'SiswaController@hadir')->name('siswa-pertemuan-hadir');
	Route::post('/siswa/{id}/pertemuan/izin', 'SiswaController@izin')->name('siswa-pertemuan-izin');
	Route::get('/siswa/profile', 'SiswaController@profile')->name('siswa-profile');
});



