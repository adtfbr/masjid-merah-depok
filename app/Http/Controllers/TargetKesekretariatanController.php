<?php

namespace App\Http\Controllers;

use App\Models\TargetKesekretariatan;
use Illuminate\Http\Request;

class TargetKesekretariatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $years = TargetKesekretariatan::selectRaw('DISTINCT tahun')->orderBy('tahun', 'desc')->pluck('tahun');
        
        $targets = TargetKesekretariatan::tahun($tahun)->ordered()->get();
        
        return view('target-kesekretariatan.index', compact('targets', 'years', 'tahun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('target-kesekretariatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100',
            'nomor_urut' => 'required|integer|min:1',
            'judul' => 'required|string|max:200',
            'deskripsi' => 'required|string'
        ]);

        TargetKesekretariatan::create($validated);

        return redirect()->route('target-kesekretariatan.index', ['tahun' => $validated['tahun']])
            ->with('success', 'Target kesekretariatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TargetKesekretariatan $targetKesekretariatan)
    {
        return view('target-kesekretariatan.show', compact('targetKesekretariatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TargetKesekretariatan $targetKesekretariatan)
    {
        return view('target-kesekretariatan.edit', compact('targetKesekretariatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TargetKesekretariatan $targetKesekretariatan)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|min:2020|max:2100',
            'nomor_urut' => 'required|integer|min:1',
            'judul' => 'required|string|max:200',
            'deskripsi' => 'required|string'
        ]);

        $targetKesekretariatan->update($validated);

        return redirect()->route('target-kesekretariatan.index', ['tahun' => $validated['tahun']])
            ->with('success', 'Target kesekretariatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TargetKesekretariatan $targetKesekretariatan)
    {
        $tahun = $targetKesekretariatan->tahun;
        $targetKesekretariatan->delete();

        return redirect()->route('target-kesekretariatan.index', ['tahun' => $tahun])
            ->with('success', 'Target kesekretariatan berhasil dihapus.');
    }
}
