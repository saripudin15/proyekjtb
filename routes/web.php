<?php

use App\Http\Middleware\CekLoginMiddleware;
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



/*Otentikasi Login*/
Route::get('/', 'otentikasi\OtentikasiController@index')->name('login');
Route::post('login', 'otentikasi\OtentikasiController@login')->name('login');


Route::group(['middleware' => ['CekLoginMiddleware']], function () {
    /*Pegawai Internal */
    Route::get('/dashboard', function () {return view('index');});
    Route::get('pegawaiinternal', 'PegawaiInternalController@index')->name('pegawaiinternal');
    Route::get('pegawaiinternal/tambah', 'PegawaiInternalController@tambah')->name('tambahpegawaiinternal');
    Route::post('pegawaiinternal', 'PegawaiInternalController@simpan')->name('simpanpegawaiinternal');
    Route::delete('pegawaiinternal/{id}', 'PegawaiInternalController@hapus')->name('hapuspegawaiinternal');
    Route::get('pegawaiinternal/{id}/edit', 'PegawaiInternalController@edit')->name('editpegawaiinternal');
    Route::patch('pegawaiinternal/{id}', 'PegawaiInternalController@update')->name('updatepegawaiinternal');
    Route::get('area', 'AreaController@index')->name('area');
    Route::get('area/tambah', 'AreaController@tambah')->name('tambaharea');
    Route::post('area', 'AreaController@simpan')->name('simpanarea');
    Route::delete('area/{id}', 'AreaController@hapus')->name('hapusarea');
    Route::get('area/{id}/edit', 'AreaController@edit')->name('editarea');
    Route::patch('area/{id}', 'AreaController@update')->name('updatearea');
    Route::get('logout', 'otentikasi\OtentikasiController@logout')->name('logout');
});


