<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//~ Route::get('/', function () {
    //~ return view('welcome');
//~ });
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
// Authentication routes...
//~ Route::get('auth/login', 'Auth\AuthController@getLogin');
//~ Route::post('auth/login', 'Auth\AuthController@postLogin');
//~ Route::get('auth/logout', 'Auth\AuthController@getLogout');

//~ // Registration routes...
//~ Route::get('auth/register', 'Auth\AuthController@getRegister');
//~ Route::post('auth/register', 'Auth\AuthController@postRegister');


//~ Route::group(['middleware' => ['web']], function () {
    //~ //
//~ });

Route::group(['middleware' => 'web'], function () {
    Route::auth();
	Route::get('/','Beranda@index');
	Route::get('/cetak_kelas/{_token}/{gelombang}/{halaman}/{param}','Beranda@cetak_kelas');
	Route::get('/download/{_token}/{no_ujian}/{param}','Beranda@download');
	Route::post('/cetak2','Beranda@cetak2');
	Route::post('/masuk','Beranda@masuk');
	Route::post('/tambah_peserta','Beranda@tambah_peserta');
	Route::post('/edit_peserta','Beranda@edit_peserta');
	Route::post('/simpan_peserta','Beranda@simpan_peserta');
	Route::post('/update_peserta','Beranda@update_peserta');
	Route::post('/cetak_kartu','Beranda@cetak_kartu');
	Route::post('/cetak_biodata','Beranda@cetak_biodata');
	Route::post('/upload_foto','Beranda@upload_foto');
	Route::post('/logout','Beranda@logout');
	Route::post('/selesai_ujian','Beranda@selesai_ujian');
	Route::post('/tutup_ujian','Beranda@tutup_ujian');
	Route::post('/admins','Beranda@admins');
	Route::post('/cari','Beranda@cari');
	Route::post('/ekspor_excel','Beranda@ekspor_excel');
	Route::post('/aktif_ujian','Beranda@aktif_ujian');
	Route::post('/simpan_lulus','Beranda@simpan_lulus');
	Route::post('/simpan_waktu','Maba@simpan_waktu');
	Route::post('/ambil_soal','Maba@ambil_soal');
	Route::post('/navigasi_soal','Maba@navigasi_soal');
	Route::post('/jawab','Maba@jawab');
	Route::post('/hapus_session','Beranda@hapus_session');
	Route::post('/maba/simpan_bio','Maba@simpan_bio');
	Route::post('/maba/simpan_sekolah','Maba@simpan_sekolah');
	Route::post('/maba/simpan_ortu','Maba@simpan_ortu');
	Route::post('/maba/simpan_aset','Maba@simpan_aset');
	Route::post('/foto2nim','Beranda@foto2nim');
    //~ Route::get('/home', 'HomeController@index');
});
