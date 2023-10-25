<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\RembugController;

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
        Route::get('/dataKegiatan', [HomeController::class, 'dataKegiatan'])->name('dataKegiatan');
        Route::get('/kalender', [HomeController::class, 'kalender'])->name('kalender');
        Route::get('/suratMasuk', [HomeController::class, 'suratMasuk'])->name('suratMasuk');
        Route::get('/suratKeluar', [HomeController::class, 'suratKeluar'])->name('suratKeluar');
        Route::get('/suratKeputusan', [HomeController::class, 'suratKeputusan'])->name('suratKeputusan');
        Route::get('/cetak-laporan-agenda', [HomeController::class, 'cetakLaporanagenda'])->name('cetak-laporan-agenda');
        Route::get('/cetak-laporan-surat-masuk', [HomeController::class, 'cetakLaporansuratmasuk'])->name('cetak-laporan-surat-masuk');
        Route::get('/cetak-laporan-surat-keluar', [HomeController::class, 'cetakLaporansuratkeluar'])->name('cetak-laporan-surat-keluar');
        Route::get('/cetak-laporan-surat-keputusan', [HomeController::class, 'cetakLaporansuratkeputusan'])->name('cetak-laporan-surat-keputusan');
});



  // Menambahkan rute untuk bagian Laporan
  Route::get('/inputLaporan', [HomeController::class, 'inputLaporan'])->name('inputLaporan');
  Route::get('/permasalahan', [HomeController::class, 'permasalahanLaporan'])->name('permasalahan');

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::get('/kegiatan', [KegiatanController::class, 'kegiatan'])->name('kegiatan');
Route::get('/data', [DataController::class, 'data'])->name('data');
Route::get('/posyandu', [PosyanduController::class, 'posyandu'])->name('posyandu');
Route::get('/rembug-warga', [RembugController::class, 'rembugWarga'])->name('rembug-warga');