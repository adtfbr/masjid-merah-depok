<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\AnggotaBidangController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AkunKeuanganController;
use App\Http\Controllers\TransaksiKeuanganController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PengurusIntiController;
use App\Http\Controllers\StrukturGambarController;
use App\Http\Controllers\TargetKesekretariatanController;
use App\Http\Controllers\BidangProgramKerjaController;
use App\Http\Controllers\TargetProgramController;
use App\Http\Controllers\KategoriAsetController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Website untuk Jamaah)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->group(function() {
    Route::get('/sejarah', [PublicController::class, 'sejarah'])->name('public.profile.sejarah');
    Route::get('/visi-misi', [PublicController::class, 'visiMisi'])->name('public.profile.visimisi');
    Route::get('/struktur', [PublicController::class, 'struktur'])->name('public.profile.struktur');
});

// Manajemen Utama Routes
Route::prefix('manajemen')->group(function() {
    Route::get('/kesekretariatan', [PublicController::class, 'kesekretariatan'])->name('public.manajemen.kesekretariatan');
    Route::get('/keuangan', [PublicController::class, 'keuangan'])->name('public.keuangan');
});

// Bidang Routes (Dynamic)
Route::get('/bidang/{id}', [PublicController::class, 'showBidang'])->name('public.bidang.show');

// Program Kerja Routes
Route::prefix('program-kerja')->group(function() {
    Route::get('/terlaksana', [PublicController::class, 'prokerTerlaksana'])->name('public.proker.terlaksana');
    Route::get('/rencana', [PublicController::class, 'prokerRencana'])->name('public.proker.rencana');
    Route::get('/target', [PublicController::class, 'prokerTarget'])->name('public.proker.target');
});

// Kontak (existing)
Route::get('/kontak', [PublicController::class, 'kontak'])->name('public.kontak');

// Old routes for backward compatibility (will redirect)
Route::get('/organisasi', [PublicController::class, 'organisasi'])->name('public.organisasi');
Route::get('/kegiatan-masjid', [PublicController::class, 'kegiatan'])->name('public.kegiatan');
Route::get('/kegiatan-masjid/{id}', [PublicController::class, 'kegiatanDetail'])->name('public.kegiatan.detail');
Route::get('/aset', [PublicController::class, 'aset'])->name('public.aset');
Route::get('/aset/kategori/{id}', [PublicController::class, 'asetKategori'])->name('public.aset.kategori');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Guest Routes (Login)
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'login']);
});

// Authenticated Routes (Admin Panel)
Route::prefix('admin')->middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Bidang
    Route::resource('bidang', BidangController::class);

    // Anggota Bidang
    Route::resource('anggota', AnggotaBidangController::class)->parameters([
        'anggota' => 'anggotum'
    ]);

    // Kegiatan
    Route::resource('kegiatan', KegiatanController::class);
    Route::delete('kegiatan-foto/{id}', [KegiatanController::class, 'deleteFoto'])->name('kegiatan.foto.delete');

    // Akun Keuangan
    Route::resource('akun-keuangan', AkunKeuanganController::class);

    // Transaksi Keuangan
    Route::resource('transaksi', TransaksiKeuanganController::class);
    Route::get('transaksi-laporan', [TransaksiKeuanganController::class, 'laporan'])->name('transaksi.laporan');

    // Aset
    Route::resource('aset', AsetController::class);

    // Kategori Aset
    Route::resource('kategori-aset', KategoriAsetController::class);

    // Activity Log
    Route::get('activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
    Route::get('activity-log/{activityLog}', [ActivityLogController::class, 'show'])->name('activity-log.show');
    Route::delete('activity-log/clear', [ActivityLogController::class, 'clear'])->name('activity-log.clear');

    // ========== NEW ROUTES - PHASE 2 ==========

    // Pengurus Inti
    Route::resource('pengurus-inti', PengurusIntiController::class);

    // Struktur Gambar
    Route::resource('struktur-gambar', StrukturGambarController::class);
    Route::post('struktur-gambar/{strukturGambar}/set-active', [StrukturGambarController::class, 'setActive'])
        ->name('struktur-gambar.set-active');

    // Target Kesekretariatan
    Route::resource('target-kesekretariatan', TargetKesekretariatanController::class);

    // Bidang Program Kerja
    Route::resource('bidang-program-kerja', BidangProgramKerjaController::class);

    // Target Program
    Route::resource('target-program', TargetProgramController::class);
});
