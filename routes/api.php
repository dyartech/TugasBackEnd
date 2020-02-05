<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function(){
    //mahasiswa
    Route::get('/mahasiswa','Api\MahasiswaController@read');
    Route::get('/mahasiswa/{id}','Api\MahasiswaController@cari');
    Route::post('/mahasiswa','Api\MahasiswaController@create');
    Route::post('/mahasiswa/{id}','Api\MahasiswaController@update');
    Route::delete('/mahasiswa/{id}','Api\MahasiswaController@delete');
});


//beasiswa
Route::get('/beasiswa','Api\BeasiswaController@read');
Route::get('/beasiswa/{id}','Api\BeasiswaController@cari');
Route::post('/beasiswa','Api\BeasiswaController@create');
Route::post('/beasiswa/{id}','Api\BeasiswaController@update');
Route::delete('/beasiswa/{id}','Api\BeasiswaController@delete');

//prodi
Route::get('/prodi','Api\ProdiController@read');
Route::get('/prodi/{id}','Api\ProdiController@cari');
Route::post('/prodi','Api\ProdiController@create');
Route::post('/prodi/{id}','Api\ProdiController@update');
Route::delete('/prodi/{id}','Api\ProdiController@delete');

//matkul
Route::get('/matkul','Api\MatkulController@read');
Route::get('/matkul/{id}','Api\MatkulController@cari');
Route::post('/matkul','Api\MatkulController@create');
Route::post('/matkul/{id}','Api\MatkulController@update');
Route::delete('/matkul/{id}','Api\MatkulController@delete');

//user
Route::post('/register','Api\AuthController@register');
Route::post('/login','Api\AuthController@login');



