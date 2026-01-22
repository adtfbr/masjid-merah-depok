<?php

namespace App\Http\Controllers;

use App\Models\StrukturGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gambars = StrukturGambar::latest()->get();
        
        return view('struktur-gambar.index', compact('gambars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('struktur-gambar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'aktif' => 'nullable|boolean'
        ]);

        // If set as active, deactivate all others
        if ($request->aktif) {
            StrukturGambar::where('aktif', true)->update(['aktif' => false]);
        }

        $validated['gambar'] = $request->file('gambar')->store('struktur', 'public');
        $validated['aktif'] = $request->aktif ?? false;

        StrukturGambar::create($validated);

        return redirect()->route('struktur-gambar.index')
            ->with('success', 'Gambar struktur berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturGambar $strukturGambar)
    {
        return view('struktur-gambar.show', compact('strukturGambar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturGambar $strukturGambar)
    {
        return view('struktur-gambar.edit', compact('strukturGambar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturGambar $strukturGambar)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'aktif' => 'nullable|boolean'
        ]);

        // If set as active, deactivate all others
        if ($request->aktif) {
            StrukturGambar::where('aktif', true)
                ->where('id', '!=', $strukturGambar->id)
                ->update(['aktif' => false]);
        }

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($strukturGambar->gambar) {
                Storage::disk('public')->delete($strukturGambar->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('struktur', 'public');
        }

        $validated['aktif'] = $request->aktif ?? false;

        $strukturGambar->update($validated);

        return redirect()->route('struktur-gambar.index')
            ->with('success', 'Gambar struktur berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturGambar $strukturGambar)
    {
        // Delete image if exists
        if ($strukturGambar->gambar) {
            Storage::disk('public')->delete($strukturGambar->gambar);
        }

        $strukturGambar->delete();

        return redirect()->route('struktur-gambar.index')
            ->with('success', 'Gambar struktur berhasil dihapus.');
    }

    /**
     * Set gambar as active
     */
    public function setActive(StrukturGambar $strukturGambar)
    {
        // Deactivate all
        StrukturGambar::where('aktif', true)->update(['aktif' => false]);
        
        // Activate selected
        $strukturGambar->update(['aktif' => true]);

        return redirect()->route('struktur-gambar.index')
            ->with('success', 'Gambar struktur aktif berhasil diperbarui.');
    }
}
