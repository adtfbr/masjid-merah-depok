<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\AnggotaBidang;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use App\Models\Aset;

class PublicController extends Controller
{
    /**
     * Landing page
     */
    public function index()
    {
        $totalBidang = Bidang::count();
        $totalAnggota = AnggotaBidang::count();
        $kegiatanTerbaru = Kegiatan::with('bidang')
            ->latest('tanggal_mulai')
            ->limit(6)
            ->get();

        return view('public.index', compact(
            'totalBidang',
            'totalAnggota',
            'kegiatanTerbaru'
        ));
    }

    /**
     * Struktur Organisasi
     */
    public function organisasi()
    {
        $bidangs = Bidang::with(['anggota' => function($query) {
            $query->orderBy('jabatan');
        }])->get();

        return view('public.organisasi', compact('bidangs'));
    }

    /**
     * Halaman Kegiatan
     */
    public function kegiatan()
    {
        $kegiatans = Kegiatan::with('bidang')
            ->latest('tanggal_mulai')
            ->paginate(12);

        return view('public.kegiatan', compact('kegiatans'));
    }

    /**
     * Detail Kegiatan
     */
    public function kegiatanDetail($id)
    {
        $kegiatan = Kegiatan::with(['bidang', 'anggota', 'foto'])
            ->findOrFail($id);

        return view('public.kegiatan-detail', compact('kegiatan'));
    }

    /**
     * Transparansi Keuangan
     */
    public function keuangan(Request $request)
    {
        $year = $request->input('year', date('Y'));
        
        // Ringkasan per tahun
        $totalPemasukan = TransaksiKeuangan::pemasukan()
            ->whereYear('tanggal', $year)
            ->sum('jumlah');
        
        $totalPengeluaran = TransaksiKeuangan::pengeluaran()
            ->whereYear('tanggal', $year)
            ->sum('jumlah');
        
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Transaksi per bulan
        $transaksiPerBulan = [];
        for ($month = 1; $month <= 12; $month++) {
            $pemasukan = TransaksiKeuangan::pemasukan()
                ->whereYear('tanggal', $year)
                ->whereMonth('tanggal', $month)
                ->sum('jumlah');
            
            $pengeluaran = TransaksiKeuangan::pengeluaran()
                ->whereYear('tanggal', $year)
                ->whereMonth('tanggal', $month)
                ->sum('jumlah');

            $transaksiPerBulan[] = [
                'bulan' => date('M', mktime(0, 0, 0, $month, 1)),
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
            ];
        }

        // List tahun yang tersedia - tambahkan tahun sekarang jika belum ada transaksi
        $years = TransaksiKeuangan::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        
        // Pastikan tahun sekarang selalu ada dalam list
        $currentYear = date('Y');
        if (!$years->contains($currentYear)) {
            $years->prepend($currentYear);
        }

        return view('public.keuangan', compact(
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'transaksiPerBulan',
            'year',
            'years'
        ));
    }

    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        return view('public.kontak');
    }

    /**
     * Halaman Aset
     */
    public function aset()
    {
        $asets = Aset::with('foto')
            ->orderBy('nama_aset')
            ->paginate(12);

        $totalNilaiAset = Aset::sum('nilai');
        $totalAset = Aset::count();

        return view('public.aset', compact('asets', 'totalNilaiAset', 'totalAset'));
    }
}
