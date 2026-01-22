<?php

namespace App\Http\Controllers;

use App\Models\BidangProgramKerja;
use App\Models\Bidang;
use Illuminate\Http\Request;

class BidangProgramKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bidangId = $request->get('bidang_id');
        $bidangs = Bidang::all();
        
        $query = BidangProgramKerja::with('bidang')->ordered();
        
        if ($bidangId) {
            $query->bidang($bidangId);
        }
        
        $programs = $query->get();
        
        return view('bidang-program-kerja.index', compact('programs', 'bidangs', 'bidangId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidang::all();
        return view('bidang-program-kerja.create', compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'judul' => 'required|string',
            'urutan' => 'required|integer|min:0'
        ]);

        BidangProgramKerja::create($validated);

        return redirect()->route('bidang-program-kerja.index', ['bidang_id' => $validated['bidang_id']])
            ->with('success', 'Program kerja bidang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangProgramKerja $bidangProgramKerja)
    {
        return view('bidang-program-kerja.show', compact('bidangProgramKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangProgramKerja $bidangProgramKerja)
    {
        $bidangs = Bidang::all();
        return view('bidang-program-kerja.edit', compact('bidangProgramKerja', 'bidangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BidangProgramKerja $bidangProgramKerja)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'judul' => 'required|string',
            'urutan' => 'required|integer|min:0'
        ]);

        $bidangProgramKerja->update($validated);

        return redirect()->route('bidang-program-kerja.index', ['bidang_id' => $validated['bidang_id']])
            ->with('success', 'Program kerja bidang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangProgramKerja $bidangProgramKerja)
    {
        $bidangId = $bidangProgramKerja->bidang_id;
        $bidangProgramKerja->delete();

        return redirect()->route('bidang-program-kerja.index', ['bidang_id' => $bidangId])
            ->with('success', 'Program kerja bidang berhasil dihapus.');
    }
}
