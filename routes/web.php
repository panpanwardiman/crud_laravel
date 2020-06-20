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

Route::get('/', 'MahasiswaController@index')->name('mahasiswa.index');

Route::get('/api/nim/{nim}', 'NilaiController@getNameByNim')->name('api.get.nim');
Route::get('/api/kode/{kode}', 'NilaiController@getMatkulByKode')->name('api.get.matkul');

Route::resource('/mahasiswa', 'MahasiswaController');
Route::resource('/matakuliah', 'MatkulController');
Route::resource('/nilai', 'NilaiController');
