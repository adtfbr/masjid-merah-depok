<?php

namespace App\Http\Controllers;

use App\Models\PengurusInti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusIntiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengurus = PengurusInti::ordered()->get()->groupBy('tipe');
        
        return view('pengurus-inti.index', compact('pengurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengurus-inti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:ketua,sekretaris,bendahara',
            'nama' => 'required|string|max:200',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kontak' => 'nullable|string|max:50',
            'urutan' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        PengurusInti::create($validated);

        return redirect()->route('pengurus-inti.index')
            ->with('success', 'Data pengurus berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengurusInti $pengurusInti)
    {
        return view('pengurus-inti.show', compact('pengurusInti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengurusInti $pengurusInti)
    {
        return view('pengurus-inti.edit', compact('pengurusInti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengurusInti $pengurusInti)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:ketua,sekretaris,bendahara',
            'nama' => 'required|string|max:200',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kontak' => 'nullable|string|max:50',
            'urutan' => 'required|integer|min:0'
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($pengurusInti->foto) {
                Storage::disk('public')->delete($pengurusInti->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        $pengurusInti->update($validated);

        return redirect()->route('pengurus-inti.index')
            ->with('success', 'Data pengurus berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengurusInti $pengurusInti)
    {
        // Delete photo if exists
        if ($pengurusInti->foto) {
            Storage::disk('public')->delete($pengurusInti->foto);
        }

        $pengurusInti->delete();

        return redirect()->route('pengurus-inti.index')
            ->with('success', 'Data pengurus berhasil dihapus.');
    }
}
