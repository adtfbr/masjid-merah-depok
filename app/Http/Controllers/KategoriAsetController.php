<?php

namespace App\Http\Controllers;

use App\Models\KategoriAset;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriAsetController extends Controller
{
    public function index()
    {
        $kategoris = KategoriAset::withCount('aset')->latest()->paginate(10);
        return view('kategori-aset.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori-aset.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $kategori = new KategoriAset();
        $kategori->nama_kategori = $validated['nama_kategori'];

        if ($request->hasFile('foto')) {
            $kategori->foto = $request->file('foto')->store('kategori-aset', 'public');
        }

        $kategori->save();

        ActivityLog::log("Menambahkan kategori aset: {$kategori->nama_kategori}");

        return redirect()->route('kategori-aset.index')
            ->with('success', 'Kategori aset berhasil ditambahkan.');
    }

    public function edit(KategoriAset $kategoriAset)
    {
        return view('kategori-aset.edit', compact('kategoriAset'));
    }

    public function update(Request $request, KategoriAset $kategoriAset)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $kategoriAset->nama_kategori = $validated['nama_kategori'];

        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($kategoriAset->foto) {
                Storage::disk('public')->delete($kategoriAset->foto);
            }
            $kategoriAset->foto = $request->file('foto')->store('kategori-aset', 'public');
        }

        $kategoriAset->save();

        ActivityLog::log("Mengubah kategori aset: {$kategoriAset->nama_kategori}");

        return redirect()->route('kategori-aset.index')
            ->with('success', 'Kategori aset berhasil diperbarui.');
    }

    public function destroy(KategoriAset $kategoriAset)
    {
        $nama = $kategoriAset->nama_kategori;

        // Delete photo
        if ($kategoriAset->foto) {
            Storage::disk('public')->delete($kategoriAset->foto);
        }

        $kategoriAset->delete();

        ActivityLog::log("Menghapus kategori aset: {$nama}");

        return redirect()->route('kategori-aset.index')
            ->with('success', 'Kategori aset berhasil dihapus.');
    }
}
