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


Route::get('/about', 'pageController@AboutPage');

Route::get('/','mahasiswaController@index');
Route::get('/mahasiswa/get-data','mahasiswaController@getDataMahasiswa');
Route::post('/mahasiswa/add','mahasiswaController@store');
Route::post('/mahasiswa/edit/{id}','mahasiswaController@update');
Route::get('/mahasiswa/delete/{id}','mahasiswaController@destroy');
Route::get('/mahasiswa/tabel','mahasiswaController@tabel');

Route::resource('mahasiswa','mahasiswaController');
