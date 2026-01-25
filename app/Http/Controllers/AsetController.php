<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\AsetFoto;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AsetController extends Controller
{
    public function index(Request $request)
    {
        $query = Aset::with('kategori')->withCount('foto');

        // Filter berdasarkan kategori
        if ($request->filled('kategori_id')) {
            $query->byKategori($request->kategori_id);
        }

        // Filter berdasarkan kondisi
        if ($request->filled('kondisi')) {
            $query->kondisi($request->kondisi);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('nama_aset', 'like', '%' . $request->search . '%');
        }

        $asets = $query->latest()->paginate(15);
        $kategoris = KategoriAset::orderBy('nama_kategori')->get();

        return view('aset.index', compact('asets', 'kategoris'));
    }

    public function create()
    {
        $kategoris = KategoriAset::orderBy('nama_kategori')->get();
        return view('aset.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_aset,id',
            'nama_aset' => 'required|string|max:200',
            'kondisi' => 'required|in:Baik,Cukup,Rusak',
        ]);

        $aset = Aset::create($validated);

        ActivityLog::log("Menambahkan aset: {$aset->nama_aset}");

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil ditambahkan.');
    }

    public function show(Aset $aset)
    {
        $aset->load(['kategori', 'foto']);
        return view('aset.show', compact('aset'));
    }

    public function edit(Aset $aset)
    {
        $kategoris = KategoriAset::orderBy('nama_kategori')->get();
        return view('aset.edit', compact('aset', 'kategoris'));
    }

    public function update(Request $request, Aset $aset)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_aset,id',
            'nama_aset' => 'required|string|max:200',
            'kondisi' => 'required|in:Baik,Cukup,Rusak',
        ]);

        $aset->update($validated);

        ActivityLog::log("Mengubah aset: {$aset->nama_aset}");

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil diperbarui.');
    }

    public function destroy(Aset $aset)
    {
        $nama = $aset->nama_aset;
        
        // Delete all photos
        foreach ($aset->foto as $foto) {
            if ($foto->foto) {
                Storage::disk('public')->delete($foto->foto);
            }
            $foto->delete();
        }

        $aset->delete();

        ActivityLog::log("Menghapus aset: {$nama}");

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil dihapus.');
    }
}
