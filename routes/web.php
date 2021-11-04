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
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pengajuan-user', [App\Http\Controllers\HomeController::class, 'form'])->name('form');


Route::get('/pengajuan', [App\Http\Controllers\pengajuanController::class, 'index'])->name('list-pengajuan');
Route::get('/unggahSertifikat', [App\Http\Controllers\pengajuanController::class, 'list_sertifikat'])->name('list-pengajuan-sertifikat');
Route::post('/pengajuan-user/unggahPengajuan', [App\Http\Livewire\Form::class, 'store'])->name('pengajuan.store');


Route::get('/pengajuan/detail/{id}', [App\Http\Controllers\pengajuanController::class, 'show'])->name('detail-pengajuan.show');
Route::get('/pengajuan/detail/{id}/unduhSertifikat', [App\Http\Controllers\pengajuanController::class, 'unduh'])->name('detail-pengajuan.unduh');
Route::get('/pengajuan/detail/{id}/unduhSertifikat/preview', [App\Http\Controllers\pengajuanController::class, 'unduh_sertif'])->name('unduh_sertif');
Route::get('/pengajuan/detail/{id}/kesalahan_pengajuan', [App\Http\Controllers\pengajuanController::class, 'kesalahan_pengajuan'])->name('kesalahan_pengajuan');
Route::get('/pengajuan/detail/kesalahan_pengajuan/notifikasi/{id}', [App\Http\Controllers\pengajuanController::class, 'notifikasi'])->name('notifikasi');


Route::get('/konsultasi', [App\Http\Controllers\konsultasiController::class, 'index'])->name('list-konsultasi');
Route::get('/pengajuan-konsultasi/simpan', [App\Http\Controllers\konsultasiController::class, 'store'])->name('pengajuan.konsultasi');
Route::get('/pengajuan-konsultasi', [App\Http\Controllers\konsultasiController::class, 'form'])->name('form-konsultasi');


Route::get('/konsultasi/hari-ini', [App\Http\Controllers\konsultasiController::class, 'index2'])->name('list-konsultasi-hari-ini');
Route::get('/konsultasi/{id}', [App\Http\Controllers\konsultasiController::class, 'update'])->name('konsultasi.update');
Route::get('/konsultasi/selesai/{id}', [App\Http\Controllers\konsultasiController::class, 'selesaikan_sesi'])->name('selesai.sesi');
Route::get('/konsultasi/ditolak/{id}', [App\Http\Controllers\konsultasiController::class, 'show'])->name('konsultasi.show');
Route::get('/konsultasi/ditolak/penolakan/{id}', [App\Http\Controllers\konsultasiController::class, 'edit'])->name('konsultasi.edit');

// Route::get('/konsultasi/selesai/notifikasi/{id}', [App\Http\Controllers\konsultasiController::class, 'notifikasi_selesai'])->name('notifikasi.selesai');
// Route::get('/konsultasi/ditolak/notifikasi/{id}', [App\Http\Controllers\konsultasiController::class, 'notifikasi_ditolak'])->name('notifikasi_ditolak');

Route::get('/upload/{id}', [App\Http\Controllers\pengajuanController::class,'upload_sertifikat'])->name('upload.sertifikat');
Route::post('/upload-sertifikat/store/{id}', [App\Http\Controllers\pengajuanController::class,'dropzoneStore'])->name('dropzone.store');






Auth::routes();
