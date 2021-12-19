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

Route::group(['middleware' => 'auth'],function (){
    Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('home');
    Route::resource('guru', \App\Http\Controllers\GuruController::class);
    Route::patch('/guru/password/{id}', [\App\Http\Controllers\GuruController::class,'gantiPass']);
    Route::resource('eskul', \App\Http\Controllers\EskulController::class);
    Route::resource('kurikulum', \App\Http\Controllers\KurikulumController::class);
    Route::resource('matapelajaran', \App\Http\Controllers\MataPelajaranController::class);
    Route::resource('sekolah', \App\Http\Controllers\SekolahController::class);
    Route::resource('tahunajaran', \App\Http\Controllers\TahunAjaranController::class);
    Route::resource('kelas', \App\Http\Controllers\KelasController::class);
    Route::resource('datasiswa', \App\Http\Controllers\SiswaController::class);
    Route::patch('/datasiswa/password/{id}', [\App\Http\Controllers\SiswaController::class,'gantiPass']);

    Route::get('/nonadmin/kelas', [\App\Http\Controllers\RaporController::class,'kelas']);
    Route::get('/nonadmin/kelas/{id}', [\App\Http\Controllers\RaporController::class,'kelasInfo']);
    Route::get('/nonadmin/raport/{id}/{id2}', [\App\Http\Controllers\RaporController::class,'rapor']);
    Route::patch('/nonadmin/raport/{id}/{id2}', [\App\Http\Controllers\RaporController::class,'raporSimpan']);

    Route::get('/nonadmin/matapelajaran', [\App\Http\Controllers\RaporController::class,'matapelajaran']);
    Route::get('/nonadmin/matapelajaran/{id}', [\App\Http\Controllers\RaporController::class,'matapelajaranInfo']);
    Route::patch('/nonadmin/matapelajaran/{id}', [\App\Http\Controllers\RaporController::class,'rapornilaiSimpan']);

    Route::get('/siswa/kelas', [\App\Http\Controllers\RaporController::class,'kelasSiswa']);
    Route::get('/siswa/matapelajaran', [\App\Http\Controllers\RaporController::class,'matapelajaranSiswa']);
    Route::get('/siswa/rapor', [\App\Http\Controllers\RaporController::class,'raporSiswa']);
    Route::get('/siswa/rapor/cetak', [\App\Http\Controllers\RaporController::class,'raporCetak']);

});


