<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\AnggotaBidang;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use App\Models\Aset;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard
     */
    public function index()
    {
        // Statistik umum
        $totalBidang = Bidang::count();
        $totalAnggota = AnggotaBidang::count();
        $totalKegiatan = Kegiatan::count();
        $totalAset = Aset::count();

        // Kegiatan aktif
        $kegiatanAktif = Kegiatan::aktif()->count();

        // Keuangan
        $totalPemasukan = TransaksiKeuangan::pemasukan()
            ->whereYear('tanggal', date('Y'))
            ->sum('jumlah');
        
        $totalPengeluaran = TransaksiKeuangan::pengeluaran()
            ->whereYear('tanggal', date('Y'))
            ->sum('jumlah');
        
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Nilai total aset
        $nilaiAset = Aset::sum('nilai');

        // Kegiatan terbaru
        $kegiatanTerbaru = Kegiatan::with('bidang')
            ->latest()
            ->limit(5)
            ->get();

        // Transaksi terbaru
        $transaksiTerbaru = TransaksiKeuangan::with(['akun', 'bidang', 'creator'])
            ->latest()
            ->limit(5)
            ->get();

        // Activity logs terbaru
        $activityLogs = ActivityLog::with('user')
            ->latest('created_at')
            ->limit(10)
            ->get();

        // Data chart transaksi bulanan (6 bulan terakhir)
        $chartData = $this->getChartData();

        return view('dashboard.index', compact(
            'totalBidang',
            'totalAnggota',
            'totalKegiatan',
            'totalAset',
            'kegiatanAktif',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'nilaiAset',
            'kegiatanTerbaru',
            'transaksiTerbaru',
            'activityLogs',
            'chartData'
        ));
    }

    /**
     * Generate data untuk chart
     */
    private function getChartData()
    {
        $months = collect();
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months->push([
                'month' => $date->format('M Y'),
                'pemasukan' => TransaksiKeuangan::pemasukan()
                    ->whereYear('tanggal', $date->year)
                    ->whereMonth('tanggal', $date->month)
                    ->sum('jumlah'),
                'pengeluaran' => TransaksiKeuangan::pengeluaran()
                    ->whereYear('tanggal', $date->year)
                    ->whereMonth('tanggal', $date->month)
                    ->sum('jumlah'),
            ]);
        }

        return $months;
    }
}
