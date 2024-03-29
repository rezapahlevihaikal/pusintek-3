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
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chart', 'HomeController@chartUnit')->name('chart');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::resource('sistemoperasi', 'SistemOperasiController');
	Route::resource('alokasihostname', 'AlokasiHostnameController');
	Route::resource('bastdocument' , 'BastController');
	Route::get('export/cetak_surat/{id}', 'ExportController@cetak_surat')->name('export');
	Route::get('export/excel/{id}', 'ExportController@cetak_excel');
	Route::get('export/sistemoperasi', 'ExportController@jsonOs')->name('export/sistemoperasi');
	Route::get('export/alokasihostname', 'ExportController@jsonHostname')->name('export/alokasihostname');
	Route::get('export/bast', 'ExportController@jsonBast')->name('export/bast');
	Route::get('uploadfile/{id}', 'ExportController@uploadFile')->name('upload.bast');
	Route::get('showfile/{id}', 'ExportController@showFile')->name('show.bast');
	Route::post('upload', 'ExportController@StoreUploadFile')->name('bast.upload.store');
	Route::put('upload/edit/{id}', 'ExportController@UpdateFileUpload')->name('bast.upload.update');
});
