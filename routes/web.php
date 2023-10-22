<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
        });
});
 // Menambahkan rute untuk bagian dataKegiatan
 Route::get('/dataKegiatan', [HomeController::class, 'dataKegiatan'])->name('dataKegiatan');

  // Menambahkan rute untuk bagian Laporan
  Route::get('/inputLaporan', [AkunController::class, 'inputLaporan'])->name('inputLaporan');
  Route::get('/permasalahan', [AkunController::class, 'permasalahanLaporan'])->name('permasalahan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 // Menambahkan rute untuk bagian Kegiatan
 Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');

 // Menambahkan rute untuk bagian Vaksinasi
 Route::get('/vaksinasi', [HomeController::class, 'vaksinasi'])->name('vaksinasi');

 // Menambahkan rute untuk bagian Posyandu
 Route::get('/posyandu', [HomeController::class, 'posyandu'])->name('posyandu');

 // Menambahkan rute untuk bagian Rembug Warga
 Route::get('/rembug-warga', [HomeController::class, 'rembugWarga'])->name('rembug-warga');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
