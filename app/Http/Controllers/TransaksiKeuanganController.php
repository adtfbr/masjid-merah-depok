<?php

namespace App\Http\Controllers;

use App\Models\TransaksiKeuangan;
use App\Models\AkunKeuangan;
use App\Models\Bidang;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TransaksiKeuangan::with(['akun', 'bidang', 'creator']);

        // Filter berdasarkan tipe
        if ($request->filled('tipe')) {
            if ($request->tipe == 'pemasukan') {
                $query->pemasukan();
            } elseif ($request->tipe == 'pengeluaran') {
                $query->pengeluaran();
            }
        }

        // Filter berdasarkan akun
        if ($request->filled('akun_id')) {
            $query->where('akun_id', $request->akun_id);
        }

        // Filter berdasarkan bidang
        if ($request->filled('bidang_id')) {
            $query->where('bidang_id', $request->bidang_id);
        }

        // Filter berdasarkan periode
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->periode($request->tanggal_mulai, $request->tanggal_akhir);
        }

        $transaksis = $query->latest('tanggal')->paginate(20);

        // Hitung total pemasukan & pengeluaran untuk periode yang difilter
        $totalPemasukan = TransaksiKeuangan::pemasukan();
        $totalPengeluaran = TransaksiKeuangan::pengeluaran();

        // Apply filter yang sama untuk total
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $totalPemasukan->periode($request->tanggal_mulai, $request->tanggal_akhir);
            $totalPengeluaran->periode($request->tanggal_mulai, $request->tanggal_akhir);
        }

        $totalPemasukan = $totalPemasukan->sum('jumlah');
        $totalPengeluaran = $totalPengeluaran->sum('jumlah');

        // Hitung saldo riil bulan terakhir (untuk tahun berjalan)
        $currentYear = date('Y');
        $saldoAkhir = 0;
        
        for ($month = 1; $month <= 12; $month++) {
            $pemasukan = TransaksiKeuangan::pemasukan()
                ->whereYear('tanggal', $currentYear)
                ->whereMonth('tanggal', $month)
                ->sum('jumlah');
            
            $pengeluaran = TransaksiKeuangan::pengeluaran()
                ->whereYear('tanggal', $currentYear)
                ->whereMonth('tanggal', $month)
                ->sum('jumlah');
            
            if ($pemasukan > 0 || $pengeluaran > 0) {
                $saldoAkhir = $pemasukan - $pengeluaran;
            }
        }

        $akuns = AkunKeuangan::orderBy('nama_akun')->get();
        $bidangs = Bidang::orderBy('nama_bidang')->get();

        return view('transaksi.index', compact(
            'transaksis',
            'akuns',
            'bidangs',
            'totalPemasukan',
            'totalPengeluaran',
            'saldoAkhir'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $akuns = AkunKeuangan::orderBy('nama_akun')->get();
        $bidangs = Bidang::orderBy('nama_bidang')->get();
        return view('transaksi.create', compact('akuns', 'bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'akun_id' => 'required|exists:akun_keuangan,id',
            'bidang_id' => 'nullable|exists:bidangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $validated['created_by'] = Auth::id();

        $transaksi = TransaksiKeuangan::create($validated);
        $akun = $transaksi->akun;

        ActivityLog::log("Menambahkan transaksi {$akun->tipe}: {$transaksi->jumlah_format}");

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiKeuangan $transaksi)
    {
        $transaksi->load(['akun', 'bidang', 'creator']);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiKeuangan $transaksi)
    {
        $akuns = AkunKeuangan::orderBy('nama_akun')->get();
        $bidangs = Bidang::orderBy('nama_bidang')->get();
        return view('transaksi.edit', compact('transaksi', 'akuns', 'bidangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiKeuangan $transaksi)
    {
        $validated = $request->validate([
            'akun_id' => 'required|exists:akun_keuangan,id',
            'bidang_id' => 'nullable|exists:bidangs,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $transaksi->update($validated);

        ActivityLog::log("Mengubah transaksi: {$transaksi->jumlah_format}");

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiKeuangan $transaksi)
    {
        $jumlah = $transaksi->jumlah_format;
        $transaksi->delete();

        ActivityLog::log("Menghapus transaksi: {$jumlah}");

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

    /**
     * Export laporan keuangan
     */
    public function laporan(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai', now()->startOfMonth());
        $tanggalAkhir = $request->input('tanggal_akhir', now()->endOfMonth());

        $transaksis = TransaksiKeuangan::with(['akun', 'bidang'])
            ->periode($tanggalMulai, $tanggalAkhir)
            ->latest('tanggal')
            ->get();

        $totalPemasukan = $transaksis->filter(function($t) {
            return $t->akun->tipe == 'pemasukan';
        })->sum('jumlah');

        $totalPengeluaran = $transaksis->filter(function($t) {
            return $t->akun->tipe == 'pengeluaran';
        })->sum('jumlah');

        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('transaksi.laporan', compact(
            'transaksis',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'tanggalMulai',
            'tanggalAkhir'
        ));
    }
}
