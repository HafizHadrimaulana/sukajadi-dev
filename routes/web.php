<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\DataBerandaController;
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

Route::get('/akun', [HomeController::class, 'index'])
      ->middleware('role:superadmin|kecamatan') // Menggunakan nama role
      ->name('home');

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

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
        Route::get('/mitra', [HomeController::class, 'mitra'])->name('mitra');
        Route::get('/media-sosial', [HomeController::class, 'mediaSosial'])->name('mediaSosial');
        Route::get('/pegawai', [HomeController::class, 'pegawai'])->name('pegawai');
        Route::get('/penghargaan', [HomeController::class, 'penghargaan'])->name('penghargaan');
        Route::get('/sarana-dan-prasarana', [HomeController::class, 'saranaDanprasarana'])->name('saranaDanprasarana');
        Route::get('/usaha', [HomeController::class, 'usaha'])->name('usaha');
        Route::get('/unggulan', [HomeController::class, 'unggulan'])->name('unggulan');
        Route::get('/pkl', [HomeController::class, 'pkl'])->name('pkl');
        Route::get('/pkb', [HomeController::class, 'pkb'])->name('pkb');
        Route::get('/pbb', [HomeController::class, 'pbb'])->name('pbb');
        Route::get('/data-warga', [HomeController::class, 'dataWarga'])->name('dataWarga');
        Route::get('/rembug-warga', [HomeController::class, 'rembugWargaadmin'])->name('rembugWargaadmin');
        Route::get('/matrix-pippk', [HomeController::class, 'matrixPippk'])->name('matrixPippk');
        Route::get('/file', [HomeController::class, 'file'])->name('file');
        Route::get('/link', [HomeController::class, 'link'])->name('link');
        Route::get('/pemberitahuan', [HomeController::class, 'pemberitahuan'])->name('pemberitahuan');
        Route::get('/tahun', [HomeController::class, 'tahun'])->name('tahun');
        Route::get('/bulan', [HomeController::class, 'bulan'])->name('bulan');
        Route::get('/tahunAnggaran', [HomeController::class, 'tahunAnggaran'])->name('tahunAnggaran');
});



  // Menambahkan rute untuk bagian Laporan
  Route::get('/inputLaporan', [HomeController::class, 'inputLaporan'])->name('inputLaporan');
  Route::get('/permasalahan', [HomeController::class, 'permasalahanLaporan'])->name('permasalahan');

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::get('/kegiatan', [KegiatanController::class, 'kegiatan'])->name('kegiatan');
Route::get('/data', [DataBerandaController::class, 'data'])->name('data');
Route::get('/posyandu', [PosyanduController::class, 'posyandu'])->name('posyandu');
Route::get('/rembug-warga', [RembugController::class, 'rembugWarga'])->name('rembug-warga');