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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

Route::resource('user', 'UserController');
Route::resource('opd', 'OpdController');
Route::resource('fungsional', 'FungsionalController');
Route::resource('struktural', 'StrukturalController');
Route::resource('abk', 'AbkController');
Route::get('/abk_struktural','AbkController@jabatanStruktural')->name('abk_struktural');
Route::get('/abk_fungsional','AbkController@jabatanFungsional')->name('abk_fungsional');

Route::post('/import_abk_fungsional', 'AbkController@importAbkFungsional');
Route::get('/coba', 'AbkController@coba');