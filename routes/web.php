<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomePengunjungController;
use App\Http\Controllers\GaleriPengunjungController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\InformasiPengunjungController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\BukuKunjunganController;
use App\Http\Controllers\KuisMainController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\KontakPengunjungController;
use App\Http\Controllers\SponsorController;
use App\Models\Sponsor;
use App\Http\Controllers\KelolaHadiah;
use Illuminate\Support\Facades\Auth;

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
    return view('pengunjung.homepengunjung');
});

//Dashboard User kuis
Route::get('/userkuis', 'UserDashboardController@index');


//Dashboard Admin
Auth::routes();
Route::get('/admin', 'HomeController@index')->name('index');

// Route::get('/admin', 'AdminDashboardController@index');

//Manajemen Informasi
Route::resource('informasi', 'InformasiController');
Route::post('tambah-informasi', [InformasiController::class, 'store']);

//Manajemen Galeri
Route::resource('galeri', 'GaleriController');
Route::post('tambah-galeri', [GaleriController::class, 'store']);

//Manajemen Event
Route::resource('event', 'EventController');
Route::post('tambah-event', [EventController::class, 'store']);

//Manajemen Soal
Route::resource('soal', 'SoalController');
Route::post('tambah-soal', [SoalController::class, 'store']);
Route::get('soal-exportpdf', [SoalController::class, 'exportpdf'])->name('exportpdf');

//Manajemen Buku Kunjungan
Route::resource('bukukunjungan', 'BukuKunjunganController');
Route::post('tambah-bukukunjungan', [BukuKunjunganController::class, 'store']);
Route::get('exportpdf', [BukuKunjunganController::class, 'exportpdf'])->name('exportpdf');

//Komentar
Route::resource('komentar', 'KomentarController');
Route::post('/', [KomentarController::class, 'store']);


//Pengunjung
//homepengunjung
Route::get('/', [HomePengunjungController::class, 'index'])->name('homepengunjung');
Route::post('/', [HomePengunjungController::class, 'store']);


//galeripengunjung
Route::get('/galeripengunjung', [GaleriPengunjungController::class, 'index'])->name('galeripengunjung');

//informasipengunjung
Route::get('/informasipengunjung', [InformasiPengunjungController::class, 'index'])->name('informasipengunjung');
Route::get('/readmore/{informasi}', [InformasiPengunjungController::class, 'readmore']);


//kontak pengunjung
Route::get('kontak', [KontakPengunjungController::class, 'index'])->name('kontak');
Route::post('kontak', [KontakPengunjungController::class, 'store']);

//KUIS
Route::resource('kuis', 'KuisController');
Route::get('kuismain/{id_event}',[KuisMainController::class, 'index']);
Route::post('submit-answer/{id_event}', [KuisMainController::class, 'submitJawaban']);
Route::get('completed/{id_event}', [KuisMainController::class, 'kuisSelesai']);

Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('/userkuis', [App\Http\Controllers\HomeController::class, 'userkuis'])->name('userkuis');

//Manajemen Result
Route::resource('result', 'ResultController');

//Manajemen Sponsor
Route::resource('sponsor', 'SponsorController');
Route::post('tambah-sponsor', [SponsorController::class, 'store']);

// Kelola Hadiah
Route::resource('hadiah', 'KelolaHadiah');
Route::post('hadiah/create', [KelolaHadiah::class, 'store']);

//Validasi Hadiah
Route::get('validasi_hadiah', [App\Http\Controllers\ValidasiHadiahController::class, 'index']);
Route::post('validasih', [App\Http\Controllers\ValidasiHadiahController::class, 'validasih'])->name('validasih');

// Hadiah
Route::prefix('tukar-hadiah')->group(function() {
    Route::get('/', [App\Http\Controllers\TukarHadiah::class, 'index']);
    Route::post('/reedem', [App\Http\Controllers\TukarHadiah::class, 'reedem']);
    Route::any('/{id}/print', [App\Http\Controllers\TukarHadiah::class, 'print']);
}); 
