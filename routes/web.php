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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pengajuan', [App\Http\Controllers\pengajuanController::class, 'index'])->name('list-pengajuan');
Route::get('/unggahSertifikat', [App\Http\Controllers\pengajuanController::class, 'list_sertifikat'])->name('list-pengajuan-sertifikat');

Route::get('/pengajuan/detail/{id}', [App\Http\Controllers\pengajuanController::class, 'show'])->name('detail-pengajuan.show');
Route::get('/pengajuan/detail/{id}/unduhSertifikat', [App\Http\Controllers\pengajuanController::class, 'unduh'])->name('detail-pengajuan.unduh');

Route::get('/konsultasi', [App\Http\Controllers\konsultasiController::class, 'index'])->name('list-konsultasi');
Route::get('/konsultasi/hari-ini', [App\Http\Controllers\konsultasiController::class, 'index2'])->name('list-konsultasi-hari-ini');
Route::get('/konsultasi/{id}', [App\Http\Controllers\konsultasiController::class, 'update'])->name('konsultasi.update');
Route::get('/konsultasi/selesai/{id}', [App\Http\Controllers\konsultasiController::class, 'selesaikan_sesi'])->name('selesai.sesi');
Route::get('/konsultasi/ditolak/{id}', [App\Http\Controllers\konsultasiController::class, 'show'])->name('konsultasi.show');
Route::get('/konsultasi/ditolak/penolakan/{id}', [App\Http\Controllers\konsultasiController::class, 'edit'])->name('konsultasi.edit');

Route::get('/upload/{id}', [App\Http\Controllers\pengajuanController::class,'upload_sertifikat'])->name('upload.sertifikat');
Route::post('/upload-sertifikat/store/{id}', [App\Http\Controllers\pengajuanController::class,'dropzoneStore'])->name('dropzone.store');






Auth::routes();
