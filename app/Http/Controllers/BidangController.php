<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidangs = Bidang::withCount(['anggota', 'kegiatan'])
            ->latest()
            ->paginate(10);

        return view('bidang.index', compact('bidangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
        ]);

        $bidang = Bidang::create($validated);

        ActivityLog::log("Menambahkan bidang: {$bidang->nama_bidang}");

        return redirect()->route('bidang.index')
            ->with('success', 'Bidang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidang $bidang)
    {
        $bidang->load(['anggota', 'kegiatan' => function($query) {
            $query->latest()->limit(5);
        }]);

        return view('bidang.show', compact('bidang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bidang $bidang)
    {
        return view('bidang.edit', compact('bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bidang $bidang)
    {
        $validated = $request->validate([
            'nama_bidang' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
        ]);

        $bidang->update($validated);

        ActivityLog::log("Mengubah bidang: {$bidang->nama_bidang}");

        return redirect()->route('bidang.index')
            ->with('success', 'Bidang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bidang $bidang)
    {
        $nama = $bidang->nama_bidang;
        $bidang->delete();

        ActivityLog::log("Menghapus bidang: {$nama}");

        return redirect()->route('bidang.index')
            ->with('success', 'Bidang berhasil dihapus.');
    }
}
