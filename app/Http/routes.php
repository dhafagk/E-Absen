<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('peringatan', 'PeringatanController@index');
Route::get('get_pdf/{tanggal}', [ 'as' => 'rekap.download', 'uses' => 'RekapController@download']);
Route::get('rekap/{tanggal}/pdf', ['as' => 'rekap.pdf', 'uses' => 'RekapController@getPdf']);
Route::get('rekap/{tanggal}', ['as' => 'rekap.show', 'uses' => 'RekapController@show']);
Route::get('rekap', 'RekapController@index');
Route::resource('absenguru', 'AbsenGuruController');
Route::resource('absen', 'AbsenController');
Route::resource('guru', 'GuruController');
Route::resource('siswa', 'SiswaController');
Route::resource('kelas', 'KelasController');
Route::get('/', 'HomeController@index');
Route::auth();
Route::get('/home', 'HomeController@index');

