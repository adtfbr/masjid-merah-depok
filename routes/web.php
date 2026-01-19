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

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Website untuk Jamaah)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/organisasi', [PublicController::class, 'organisasi'])->name('public.organisasi');
Route::get('/kegiatan-masjid', [PublicController::class, 'kegiatan'])->name('public.kegiatan');
Route::get('/kegiatan-masjid/{id}', [PublicController::class, 'kegiatanDetail'])->name('public.kegiatan.detail');
Route::get('/keuangan', [PublicController::class, 'keuangan'])->name('public.keuangan');
Route::get('/aset', [PublicController::class, 'aset'])->name('public.aset');
Route::get('/kontak', [PublicController::class, 'kontak'])->name('public.kontak');

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
    Route::delete('aset-foto/{id}', [AsetController::class, 'deleteFoto'])->name('aset.foto.delete');

    // Activity Log
    Route::get('activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
    Route::get('activity-log/{activityLog}', [ActivityLogController::class, 'show'])->name('activity-log.show');
    Route::delete('activity-log/clear', [ActivityLogController::class, 'clear'])->name('activity-log.clear');
});
