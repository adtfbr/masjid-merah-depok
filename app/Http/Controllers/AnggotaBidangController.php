<?php

namespace App\Http\Controllers;

use App\Models\AnggotaBidang;
use App\Models\Bidang;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AnggotaBidang::with('bidang');

        // Filter berdasarkan bidang
        if ($request->filled('bidang_id')) {
            $query->where('bidang_id', $request->bidang_id);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $anggotas = $query->latest()->paginate(15);
        $bidangs = Bidang::orderBy('nama_bidang')->get();

        return view('anggota.index', compact('anggotas', 'bidangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidang::orderBy('nama_bidang')->get();
        return view('anggota.create', compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nama' => 'required|string|max:150',
            'jabatan' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        $anggota = AnggotaBidang::create($validated);

        ActivityLog::log("Menambahkan anggota: {$anggota->nama}");

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnggotaBidang $anggotum)
    {
        $anggotum->load(['bidang', 'kegiatan']);
        return view('anggota.show', compact('anggotum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnggotaBidang $anggotum)
    {
        $bidangs = Bidang::orderBy('nama_bidang')->get();
        return view('anggota.edit', compact('anggotum', 'bidangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnggotaBidang $anggotum)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nama' => 'required|string|max:150',
            'jabatan' => 'required|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($anggotum->foto) {
                Storage::disk('public')->delete($anggotum->foto);
            }
            $validated['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        $anggotum->update($validated);

        ActivityLog::log("Mengubah anggota: {$anggotum->nama}");

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaBidang $anggotum)
    {
        $nama = $anggotum->nama;

        // Hapus foto
        if ($anggotum->foto) {
            Storage::disk('public')->delete($anggotum->foto);
        }

        $anggotum->delete();

        ActivityLog::log("Menghapus anggota: {$nama}");

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
