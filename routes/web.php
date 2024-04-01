<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KriteriaSubKriteriaController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaKriteriaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\TingkatController;
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

Route::get('/', [LandController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/akun', [AkunController::class, 'index'])->middleware('auth')->name('akun');
Route::get('/akun-add', [AkunController::class, 'create'])->middleware('guest')->name('akun-add');
Route::post('/akun-store', [AkunController::class, 'store'])->middleware('guest');
Route::get('/akun-edit/{id}', [AkunController::class, 'edit'])->middleware('auth')->name('akun-edit');
Route::put('/akun-update/{id}', [AkunController::class, 'update'])->middleware('auth');
Route::get('/akun-destroy/{id}', [AkunController::class, 'destroy'])->middleware('auth');

Route::get('/siswa', [SiswaController::class, 'index'])->middleware('auth')->name('siswa');
Route::get('/siswa-add', [SiswaController::class, 'create'])->middleware('auth')->name('siswa-add');
Route::post('/siswa-store', [SiswaController::class, 'store'])->middleware('auth');
Route::get('/siswa-edit/{id}', [SiswaController::class, 'edit'])->middleware('auth')->name('siswa-edit');
Route::put('/siswa-update/{id}', [SiswaController::class, 'update'])->middleware('auth');
Route::get('/siswa-destroy/{id}', [SiswaController::class, 'destroy'])->middleware('auth');
Route::get('/siswa-cetak/{id}', [SiswaController::class, 'cetak']);

Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware('auth')->name('kriteria');
Route::get('/kriteria-add', [KriteriaController::class, 'create'])->middleware('auth')->name('kriteria-add');
Route::post('/kriteria-store', [KriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria-edit/{id}', [KriteriaController::class, 'edit'])->middleware('auth')->name('kriteria-edit');
Route::put('/kriteria-update/{id}', [KriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria-destroy/{id}', [KriteriaController::class, 'destroy'])->middleware('auth');
Route::get('/kriteria-request', [KriteriaController::class, 'request'])->name('kriteria-request');
// Route::get('/kriteria-cetak/{id}', [KriteriaController::class, 'cetak']);

Route::get('/sub_kriteria', [SubKriteriaController::class, 'index'])->middleware('auth')->name('sub_kriteria');
Route::get('/sub_kriteria-add', [SubKriteriaController::class, 'create'])->middleware('auth')->name('sub_kriteria-add');
// Route::post('/sub_kriteria-validator_add', [SubKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/sub_kriteria-store', [SubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/sub_kriteria-edit/{id}', [SubKriteriaController::class, 'edit'])->middleware('auth')->name('sub_kriteria-edit');
// Route::post('/sub_kriteria-validator_edit/{id}', [SubKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/sub_kriteria-update/{id}', [SubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/sub_kriteria-destroy/{id}', [SubKriteriaController::class, 'destroy'])->middleware('auth');
// Route::get('/sub_kriteria-cetak/{id}', [SubKriteriaController::class, 'cetak']);
Route::get('/sub_kriteria-request', [SubKriteriaController::class, 'request'])->name('sub_kriteria-request');
Route::get('/siswa_kriteria-request', [SubKriteriaController::class, 'siswa_request'])->name('siswa_kriteria-request');

Route::get('/kriteria_sub_kriteria', [KriteriaSubKriteriaController::class, 'index'])->middleware('auth')->name('kriteria_sub_kriteria');
Route::get('/kriteria_sub_kriteria-add', [KriteriaSubKriteriaController::class, 'create'])->middleware('auth')->name('kriteria_sub_kriteria-add');
// Route::post('/kriteria_sub_kriteria-validator_add', [KriteriaSubKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/kriteria_sub_kriteria-store', [KriteriaSubKriteriaController::class, 'store'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-edit/{id}', [KriteriaSubKriteriaController::class, 'edit'])->middleware('auth')->name('kriteria_sub_kriteria-edit');
// Route::post('/kriteria_sub_kriteria-validator_edit/{id}', [KriteriaSubKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/kriteria_sub_kriteria-update/{id}', [KriteriaSubKriteriaController::class, 'update'])->middleware('auth');
Route::get('/kriteria_sub_kriteria-destroy/{id}', [KriteriaSubKriteriaController::class, 'destroy'])->middleware('auth');
// Route::get('/kriteria_sub_kriteria-cetak/{id}', [KriteriaSubKriteriaController::class, 'cetak']);

Route::get('/kecamatan', [KecamatanController::class, 'index'])->middleware('auth')->name('kecamatan');
Route::get('/kecamatan-add', [KecamatanController::class, 'create'])->middleware('auth')->name('kecamatan-add');
Route::post('/kecamatan-store', [KecamatanController::class, 'store'])->middleware('auth');
Route::get('/kecamatan-edit/{id}', [KecamatanController::class, 'edit'])->middleware('auth')->name('kecamatan-edit');
Route::put('/kecamatan-update/{id}', [KecamatanController::class, 'update'])->middleware('auth');
Route::get('/kecamatan-destroy/{id}', [KecamatanController::class, 'destroy'])->middleware('auth');
Route::get('/kecamatan-request', [KecamatanController::class, 'request'])->name('kecamatan-request');

Route::get('/kelurahan', [KelurahanController::class, 'index'])->middleware('auth')->name('kelurahan');
Route::get('/kelurahan-add', [KelurahanController::class, 'create'])->middleware('auth')->name('kelurahan-add');
Route::post('/kelurahan-store', [KelurahanController::class, 'store'])->middleware('auth');
Route::get('/kelurahan-edit/{id}', [KelurahanController::class, 'edit'])->middleware('auth')->name('kelurahan-add');
Route::put('/kelurahan-update/{id}', [KelurahanController::class, 'update'])->middleware('auth');
Route::get('/kelurahan-destroy/{id}', [KelurahanController::class, 'destroy'])->middleware('auth');

Route::get('/tingkat', [TingkatController::class, 'index'])->middleware('auth')->name('tingkat');
Route::get('/tingkat-add', [TingkatController::class, 'create'])->middleware('auth')->name('tingkat-add');
Route::post('/tingkat-store', [TingkatController::class, 'store'])->middleware('auth');
Route::get('/tingkat-edit/{id}', [TingkatController::class, 'edit'])->middleware('auth')->name('tingkat-edit');
Route::put('/tingkat-update/{id}', [TingkatController::class, 'update'])->middleware('auth');
Route::get('/tingkat-destroy/{id}', [TingkatController::class, 'destroy'])->middleware('auth');
Route::get('/tingkat-request', [TingkatController::class, 'request'])->name('tingkat-request');

Route::get('/kelas', [KelasController::class, 'index'])->middleware('auth')->name('kelas');
Route::get('/kelas-add', [KelasController::class, 'create'])->middleware('auth')->name('kelas-add');
Route::post('/kelas-store', [KelasController::class, 'validator_add'])->middleware('auth');
Route::get('/kelas-edit/{id}', [KelasController::class, 'edit'])->middleware('auth')->name('kelas-add');
Route::put('/kelas-update/{id}', [KelasController::class, 'validator_edit'])->middleware('auth');
Route::get('/kelas-destroy/{id}', [KelasController::class, 'destroy'])->middleware('auth');

Route::get('/siswa_kriteria', [SiswaKriteriaController::class, 'index'])->middleware('auth')->name('siswa_kriteria');
Route::get('/siswa_kriteria-add', [SiswaKriteriaController::class, 'create'])->middleware('auth')->name('siswa_kriteria-add');
// Route::post('/siswa_kriteria-validator_add', [SiswaKriteriaController::class, 'validator_add'])->middleware('auth');
Route::post('/siswa_kriteria-store', [SiswaKriteriaController::class, 'store'])->middleware('auth');
Route::get('/siswa_kriteria-edit/{id}', [SiswaKriteriaController::class, 'edit'])->middleware('auth')->name('siswa_kriteria-edit');
// Route::post('/siswa_kriteria-validator_edit/{id}', [SiswaKriteriaController::class, 'validator_edit'])->middleware('auth');
Route::put('/siswa_kriteria-update/{id}', [SiswaKriteriaController::class, 'update'])->middleware('auth');
Route::get('/siswa_kriteria-destroy/{id}', [SiswaKriteriaController::class, 'destroy'])->middleware('auth');
// Route::get('/siswa_sub_kriteria-cetak/{id}', [SiswaKriteriaController::class, 'cetak']);

Route::get('/perhitungan-derajat_keanggotaan', [PerhitunganController::class, 'derajat_keanggotaan'])->middleware('auth')->name('perhitungan-derajat_keanggotaan');
Route::get('/perhitungan-query_penentuan', [PerhitunganController::class, 'query_penentuan'])->middleware('auth')->name('perhitungan-query_penentuan');
Route::post('/perhitungan-query_penentuan', [PerhitunganController::class, 'query_penentuan'])->middleware('auth')->name('perhitungan-query_penentuan');
// Route::post('/perhitungan-simpan', [PerhitunganController::class, 'save']);
