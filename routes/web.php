<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\DataBerandaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RembugController;
use App\Http\Controllers\GisController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\SaranaPrasaranaController;

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
    return view('page.publik.home');
});

Auth::routes();

Route::get('/akun', [HomeController::class, 'index'])
      ->middleware('role:superadmin|kecamatan') // Menggunakan nama role
      ->name('home');

// Route::group(['prefix' => 'dashboard/admin'], function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

Route::prefix('/json')->name('json.')->group(function () {
    Route::get('/bulan', 'JsonController@bulan')->name('bulan');
    Route::get('/sopd', 'JsonController@sopd')->name('sopd');
});


Route::prefix('/chat')->name('chat.')->group(function () {
    Route::get('/', 'ChatController@index')->name('index');
    Route::post('/create', 'ChatController@create')->name('create');
    Route::get('/get-message', 'ChatController@message')->name('message');
    Route::post('/sent-message', 'ChatController@send')->name('send');
});
// Menambahkan rute untuk bagian Laporan
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::get('/kegiatan','KegiatanController@index')->name('kegiatan');

Route::name('data.')->group(function () {

    Route::prefix('/penghargaan')->name('penghargaan.')->group(function () {
        Route::get('/', 'DataController@penghargaan')->name('index');
        Route::get('/{tahun}', 'DataController@penghargaanDetail')->name('show');
    });

    Route::prefix('/sarpras')->name('sarpras.')->group(function () {
        Route::get('/', 'DataController@sarpras')->name('index');
        Route::get('/{id}', 'DataController@sarprasDetail')->name('show');
        Route::get('/{id}/data', 'DataController@sarprasData')->name('data');
    });

    Route::prefix('/kda')->name('kda.')->group(function () {
        Route::get('/', 'KDAController@index')->name('index');
        Route::post('/store', 'KDAController@store')->name('store');
    });
});
Route::prefix('admin')->namespace('Admin')->middleware('auth')->name('admin.')->group(function(){
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    
    Route::prefix('/kegiatan')->name('kegiatan.')->group(function () {
        Route::get('/', 'KegiatanController@index')->name('index');
        Route::get('/create', 'KegiatanController@create')->name('create');
        Route::post('/store','KegiatanController@store')->name('store');
        Route::get('/data', 'KegiatanController@data')->name('data');
        Route::get('/{id}', 'KegiatanController@show')->name('show');
        Route::get('/{id}/edit','KegiatanController@edit')->name('edit');
        Route::post('/{id}/update','KegiatanController@update')->name('update');
        Route::delete('/{id}/delete','KegiatanController@destroy')->name('delete');
    });

    
    Route::prefix('/timeline')->name('timeline.')->group(function () {
        Route::get('/', 'TimeLineController@index')->name('index');
        Route::get('/create', 'TimeLineController@create')->name('create');
        Route::post('/store','TimeLineController@store')->name('store');
        Route::get('/data', 'TimeLineController@data')->name('data');
        Route::get('/{id}', 'TimeLineController@show')->name('show');
        Route::get('/{id}/edit','TimeLineController@edit')->name('edit');
        Route::post('/{id}/update','TimeLineController@update')->name('update');
        Route::delete('/{id}/delete','TimeLineController@destroy')->name('delete');
    });

    
    Route::prefix('/livechat')->name('livechat.')->group(function () {
        Route::get('/', 'LiveChatController@index')->name('index');
        Route::get('/create', 'LiveChatController@create')->name('create');
        Route::post('/store','LiveChatController@store')->name('store');
        Route::get('/data', 'LiveChatController@data')->name('data');
        Route::get('/{id}', 'LiveChatController@show')->name('show');
        Route::get('/{id}/edit','LiveChatController@edit')->name('edit');
        Route::post('/{id}/update','LiveChatController@update')->name('update');
        Route::delete('/{id}/delete','LiveChatController@destroy')->name('delete');
    });


    Route::namespace('KDA')->prefix('/kda')->name('kda.')->group(function () {
        
        Route::prefix('/pegawai')->name('pegawai.')->group(function () {
            Route::get('/', 'PegawaiController@index')->name('index');
            Route::get('/create', 'PegawaiController@create')->name('create');
            Route::post('/store','PegawaiController@store')->name('store');
            Route::get('/data', 'PegawaiController@data')->name('data');
            Route::get('/{id}', 'PegawaiController@show')->name('show');
            Route::get('/{id}/edit','PegawaiController@edit')->name('edit');
            Route::post('/{id}/update','PegawaiController@update')->name('update');
            Route::delete('/{id}/delete','PegawaiController@destroy')->name('delete');
        });
        
        Route::prefix('/sarana-prasarana')->name('sarpras.')->group(function () {
            Route::get('/', 'SaranaController@index')->name('index');
            Route::get('/create', 'SaranaController@create')->name('create');
            Route::post('/store','SaranaController@store')->name('store');
            Route::get('/data', 'SaranaController@data')->name('data');
            Route::get('/{id}', 'SaranaController@show')->name('show');
            Route::get('/{id}/edit','SaranaController@edit')->name('edit');
            Route::post('/{id}/update','SaranaController@update')->name('update');
            Route::delete('/{id}/delete','SaranaController@destroy')->name('delete');
        });
        
        Route::prefix('/usaha')->name('usaha.')->group(function () {
            Route::get('/', 'UsahaController@index')->name('index');
            Route::get('/create', 'UsahaController@create')->name('create');
            Route::post('/store','UsahaController@store')->name('store');
            Route::get('/data', 'UsahaController@data')->name('data');
            Route::get('/{id}', 'UsahaController@show')->name('show');
            Route::get('/{id}/edit','UsahaController@edit')->name('edit');
            Route::post('/{id}/update','UsahaController@update')->name('update');
            Route::delete('/{id}/delete','UsahaController@destroy')->name('delete');
        });

        
        Route::prefix('/pengajuan')->name('pengajuan.')->group(function () {
            Route::get('/', 'PengajuanController@index')->name('index');
            Route::get('/create', 'PengajuanController@create')->name('create');
            Route::post('/store','PengajuanController@store')->name('store');
            Route::get('/data', 'PengajuanController@data')->name('data');
            Route::get('/{id}', 'PengajuanController@show')->name('show');
            Route::get('/{id}/edit','PengajuanController@edit')->name('edit');
            Route::post('/{id}/update','PengajuanController@update')->name('update');
            Route::delete('/{id}/delete','PengajuanController@destroy')->name('delete');
        });
    });
    
    Route::namespace('Data')->group(function(){
        
        Route::prefix('/mitra')->name('mitra.')->group(function () {
            Route::get('/', 'MitraController@index')->name('index');
            Route::get('/create', 'MitraController@create')->name('create');
            Route::post('/store','MitraController@store')->name('store');
            Route::get('/data', 'MitraController@data')->name('data');
            Route::get('/{id}/edit','MitraController@edit')->name('edit');
            Route::post('/{id}/update','MitraController@update')->name('update');
            Route::delete('/{id}/delete','MitraController@destroy')->name('delete');
            Route::get('/{id}/{tahun}', 'MitraController@show')->name('show');
        });

        
        Route::prefix('/medsos')->name('medsos.')->group(function () {
            Route::get('/', 'MedsosController@index')->name('index');
            Route::get('/create', 'MedsosController@create')->name('create');
            Route::post('/store','MedsosController@store')->name('store');
            Route::get('/data', 'MedsosController@data')->name('data');
            Route::get('/{id}', 'MedsosController@show')->name('show');
            Route::get('/{id}/edit','MedsosController@edit')->name('edit');
            Route::post('/{id}/update','MedsosController@update')->name('update');
            Route::delete('/{id}/delete','MedsosController@destroy')->name('delete');
        });

        
        Route::prefix('/pegawai')->name('pegawai.')->group(function () {
            Route::get('/', 'PegawaiController@index')->name('index');
            Route::get('/create', 'PegawaiController@create')->name('create');
            Route::post('/store','PegawaiController@store')->name('store');
            Route::get('/data', 'PegawaiController@data')->name('data');
            Route::get('/{id}', 'PegawaiController@show')->name('show');
            Route::get('/{id}/edit','PegawaiController@edit')->name('edit');
            Route::post('/{id}/update','PegawaiController@update')->name('update');
            Route::delete('/{id}/delete','PegawaiController@destroy')->name('delete');
        });

        
        Route::prefix('/penghargaan')->name('penghargaan.')->group(function () {
            Route::get('/', 'PenghargaanController@index')->name('index');
            Route::get('/create', 'PenghargaanController@create')->name('create');
            Route::post('/store','PenghargaanController@store')->name('store');
            Route::get('/data', 'PenghargaanController@data')->name('data');
            Route::get('/{id}', 'PenghargaanController@show')->name('show');
            Route::get('/{id}/edit','PenghargaanController@edit')->name('edit');
            Route::post('/{id}/update','PenghargaanController@update')->name('update');
            Route::delete('/{id}/delete','PenghargaanController@destroy')->name('delete');
        });
        
        Route::prefix('/sarana-prasarana')->name('sarpras.')->group(function () {
            Route::get('/', 'SaranaController@index')->name('index');
            Route::get('/create', 'SaranaController@create')->name('create');
            Route::post('/store','SaranaController@store')->name('store');
            Route::get('/data', 'SaranaController@data')->name('data');
            Route::get('/{id}', 'SaranaController@show')->name('show');
            Route::get('/{id}/edit','SaranaController@edit')->name('edit');
            Route::post('/{id}/update','SaranaController@update')->name('update');
            Route::delete('/{id}/delete','SaranaController@destroy')->name('delete');
        });
        
        Route::prefix('/posyandu')->name('posyandu.')->group(function () {
            Route::get('/', 'PosyanduController@index')->name('index');
            Route::get('/create', 'PosyanduController@create')->name('create');
            Route::post('/store','PosyanduController@store')->name('store');
            Route::get('/data', 'PosyanduController@data')->name('data');
            Route::get('/{id}', 'PosyanduController@show')->name('show');
            Route::get('/{id}/edit','PosyanduController@edit')->name('edit');
            Route::post('/{id}/update','PosyanduController@update')->name('update');
            Route::delete('/{id}/delete','PosyanduController@destroy')->name('delete');
        });
        
        Route::prefix('/usaha')->name('usaha.')->group(function () {
            Route::get('/', 'UsahaController@index')->name('index');
            Route::get('/create', 'UsahaController@create')->name('create');
            Route::post('/store','UsahaController@store')->name('store');
            Route::get('/data', 'UsahaController@data')->name('data');
            Route::get('/{id}', 'UsahaController@show')->name('show');
            Route::get('/{id}/edit','UsahaController@edit')->name('edit');
            Route::post('/{id}/update','UsahaController@update')->name('update');
            Route::delete('/{id}/delete','UsahaController@destroy')->name('delete');
        });
        
        Route::prefix('/unggulan')->name('unggulan.')->group(function () {
            Route::get('/', 'UnggulanController@index')->name('index');
            Route::get('/create', 'UnggulanController@create')->name('create');
            Route::post('/store','UnggulanController@store')->name('store');
            Route::get('/data', 'UnggulanController@data')->name('data');
            Route::get('/{id}', 'UnggulanController@show')->name('show');
            Route::get('/{id}/edit','UnggulanController@edit')->name('edit');
            Route::post('/{id}/update','UnggulanController@update')->name('update');
            Route::delete('/{id}/delete','UnggulanController@destroy')->name('delete');
        });
        
        Route::prefix('/pkl')->name('pkl.')->group(function () {
            Route::get('/', 'PKLController@index')->name('index');
            Route::get('/create', 'PKLController@create')->name('create');
            Route::post('/store','PKLController@store')->name('store');
            Route::get('/data', 'PKLController@data')->name('data');
            Route::get('/{id}', 'PKLController@show')->name('show');
            Route::get('/{id}/edit','PKLController@edit')->name('edit');
            Route::post('/{id}/update','PKLController@update')->name('update');
            Route::delete('/{id}/delete','PKLController@destroy')->name('delete');
        });
    });


    Route::namespace('Pengaturan')->group(function(){
        
        Route::prefix('/tahun')->name('tahun.')->group(function () {
            Route::get('/', 'TahunController@index')->name('index');
            Route::get('/create', 'TahunController@create')->name('create');
            Route::post('/store','TahunController@store')->name('store');
            Route::get('/data', 'TahunController@data')->name('data');
            Route::get('/{id}', 'TahunController@show')->name('show');
            Route::get('/{id}/edit','TahunController@edit')->name('edit');
            Route::post('/{id}/update','TahunController@update')->name('update');
            Route::delete('/{id}/delete','TahunController@destroy')->name('delete');
        });
        
        Route::prefix('/bulan')->name('bulan.')->group(function () {
            Route::get('/', 'BulanController@index')->name('index');
            Route::get('/create', 'BulanController@create')->name('create');
            Route::post('/store','BulanController@store')->name('store');
            Route::get('/data', 'BulanController@data')->name('data');
            Route::get('/{id}', 'BulanController@show')->name('show');
            Route::get('/{id}/edit','BulanController@edit')->name('edit');
            Route::post('/{id}/update','BulanController@update')->name('update');
            Route::delete('/{id}/delete','BulanController@destroy')->name('delete');
        });
        
        Route::prefix('/anggaran')->name('anggaran.')->group(function () {
            Route::get('/', 'AnggaranController@index')->name('index');
            Route::get('/create', 'AnggaranController@create')->name('create');
            Route::post('/store','AnggaranController@store')->name('store');
            Route::get('/data', 'AnggaranController@data')->name('data');
            Route::get('/{id}', 'AnggaranController@show')->name('show');
            Route::get('/{id}/edit','AnggaranController@edit')->name('edit');
            Route::post('/{id}/update','AnggaranController@update')->name('update');
            Route::delete('/{id}/delete','AnggaranController@destroy')->name('delete');
        });
    });

    
    Route::prefix('/akun')->name('akun.')->group(function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store','UserController@store')->name('store');
        Route::get('/data', 'UserController@data')->name('data');
        Route::get('/{id}', 'UserController@show')->name('show');
        Route::get('/{id}/edit','UserController@edit')->name('edit');
        Route::post('/{id}/update','UserController@update')->name('update');
        Route::delete('/{id}/delete','UserController@destroy')->name('delete');
    });

});