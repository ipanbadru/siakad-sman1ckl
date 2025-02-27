<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Admin\BelajarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PelajaranController;
use App\Http\Controllers\NilaiAkhirController;
use App\Http\Controllers\NilaiUlanganController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('admin')->group(function () {
    // Admin Controller
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');

    // Admin Controller Guru
    Route::resource('guru', GuruController::class)->except('show');

    // Admin Controller Siswa
    Route::resource('siswa', SiswaController::class)->except('show');

    // Admin Controller Kelas
    Route::resource('kelas', KelasController::class)->parameters([
        'kelas' => 'kelas'
    ])->except('show');

    // Admin Controller Pelajaran
    Route::resource('pelajaran', PelajaranController::class)->except('show');

    // Controller Belajar
    Route::controller(BelajarController::class)->group(function () {
        Route::get('/belajar', 'index')->name('belajar.index');
        Route::get('/belajar/create', 'create')->name('belajar.create');
        Route::post('/belajar', 'store')->name('belajar.store');
        Route::get('/belajar/{kelas}/edit', 'edit')->name('belajar.edit');
        Route::put('/belajar/{kelas}', 'update')->name('belajar.update');
        Route::delete('/belajar/{kelas}', 'destroy')->name('belajar.destroy');
    });
});

Route::middleware('guru')->group(function(){
    Route::get('/guru/dashboard', [DashboardController::class, 'guru'])->name('guruDashboard');

    Route::controller(AbsensiController::class)->group(function () {
        Route::get('/absensi', 'index')->name('absensi.index');
        Route::post('/absensi', 'store')->name('absensi.store');
        Route::get('/absensi/{kelas}/{tanggal}', 'show')->name('absensi.show');
        Route::put('/absensi/{absensi}', 'updateKeterangan')->name('absensi.update');
        Route::delete('/absensi/{kelas}/{tanggal}', 'destroy')->name('absensi.destroy');
    });

    Route::controller(NilaiUlanganController::class)->group(function () {
        Route::get('/nilai-ulangan', 'index')->name('nilai-ulangan.index');
        Route::get('/nilai-ulangan/create', 'create')->name('nilai-ulangan.create');
        Route::post('/nilai-ulangan', 'store')->name('nilai-ulangan.store');
        Route::get('/nilai-ulangan/{siswa}/edit', 'edit')->name('nilai-ulangan.edit');
        Route::put('/nilai-ulangan/{siswa}', 'update')->name('nilai-ulangan.update');
    });

    Route::controller(NilaiAkhirController::class)->group(function () {
        Route::get('/nilai-akhir', 'index')->name('nilai-akhir.index');
        Route::get('/nilai-akhir/create', 'create')->name('nilai-akhir.create');
        Route::post('/nilai-akhir', 'store')->name('nilai-akhir.store');
        Route::get('/nilai-akhir/{siswa}/edit', 'edit')->name('nilai-akhir.edit');
        Route::put('/nilai-akhir/{siswa}', 'update')->name('nilai-akhir.update');
    });

    Route::get('/getSiswaByKelas/{kelas}', [SiswaController::class, 'getByKelas'])->name('siswa.getByKelas');
    Route::get('/getNilaiUlanganBySiswa/{siswa}', [NilaiUlanganController::class, 'getBySiswa'])->name('nilai-ulangan.getBySiswa');
    Route::get('/getNilaiAkhirBySiswa/{siswa}', [NilaiAkhirController::class, 'getBySiswa'])->name('nilai-akhir.getBySiswa');
});

Route::middleware('siswa')->group(function(){
    Route::get('/siswa/dashboard', [DashboardController::class, 'siswa'])->name('siswaDashboard');
    Route::get('/daftar-absensi', [AbsensiController::class, 'daftarAbsensi'])->name('absensi.daftar-absensi');
    Route::get('/daftar-nilai-ulangan', [NilaiUlanganController::class, 'daftarNilai'])->name('nilai-ulangan.daftar-nilai');
    Route::get('/daftar-nilai-akhir', [NilaiAkhirController::class, 'daftarNilai'])->name('nilai-akhir.daftar-nilai');
});

require __DIR__ . '/auth.php';
