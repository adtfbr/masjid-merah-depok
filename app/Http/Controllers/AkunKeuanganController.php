<?php

namespace App\Http\Controllers;

use App\Models\AkunKeuangan;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class AkunKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akuns = AkunKeuangan::withCount('transaksi')
            ->latest()
            ->paginate(15);

        return view('akun-keuangan.index', compact('akuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('akun-keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_akun' => 'required|string|max:150',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        $akun = AkunKeuangan::create($validated);

        ActivityLog::log("Menambahkan akun keuangan: {$akun->nama_akun}");

        return redirect()->route('akun-keuangan.index')
            ->with('success', 'Akun keuangan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AkunKeuangan $akunKeuangan)
    {
        $akunKeuangan->load(['transaksi' => function($query) {
            $query->with(['bidang', 'creator'])->latest()->limit(10);
        }]);

        $totalTransaksi = $akunKeuangan->transaksi()->sum('jumlah');

        return view('akun-keuangan.show', compact('akunKeuangan', 'totalTransaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AkunKeuangan $akunKeuangan)
    {
        return view('akun-keuangan.edit', compact('akunKeuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AkunKeuangan $akunKeuangan)
    {
        $validated = $request->validate([
            'nama_akun' => 'required|string|max:150',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        $akunKeuangan->update($validated);

        ActivityLog::log("Mengubah akun keuangan: {$akunKeuangan->nama_akun}");

        return redirect()->route('akun-keuangan.index')
            ->with('success', 'Akun keuangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AkunKeuangan $akunKeuangan)
    {
        $nama = $akunKeuangan->nama_akun;

        if ($akunKeuangan->transaksi()->count() > 0) {
            return back()->with('error', 'Tidak dapat menghapus akun yang sudah memiliki transaksi.');
        }

        $akunKeuangan->delete();

        ActivityLog::log("Menghapus akun keuangan: {$nama}");

        return redirect()->route('akun-keuangan.index')
            ->with('success', 'Akun keuangan berhasil dihapus.');
    }
}
