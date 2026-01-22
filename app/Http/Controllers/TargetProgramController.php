<?php

namespace App\Http\Controllers;

use App\Models\TargetProgram;
use App\Models\Bidang;
use Illuminate\Http\Request;

class TargetProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bidangId = $request->get('bidang_id');
        $bidangs = Bidang::all();
        
        $query = TargetProgram::with('bidang')->ordered();
        
        if ($bidangId) {
            $query->bidang($bidangId);
        }
        
        $targets = $query->get();
        
        return view('target-program.index', compact('targets', 'bidangs', 'bidangId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidang::all();
        return view('target-program.create', compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nomor_urut' => 'required|integer|min:1',
            'judul' => 'required|string|max:200',
            'deskripsi' => 'required|string'
        ]);

        TargetProgram::create($validated);

        return redirect()->route('target-program.index', ['bidang_id' => $validated['bidang_id']])
            ->with('success', 'Target program berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TargetProgram $targetProgram)
    {
        return view('target-program.show', compact('targetProgram'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TargetProgram $targetProgram)
    {
        $bidangs = Bidang::all();
        return view('target-program.edit', compact('targetProgram', 'bidangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TargetProgram $targetProgram)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nomor_urut' => 'required|integer|min:1',
            'judul' => 'required|string|max:200',
            'deskripsi' => 'required|string'
        ]);

        $targetProgram->update($validated);

        return redirect()->route('target-program.index', ['bidang_id' => $validated['bidang_id']])
            ->with('success', 'Target program berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TargetProgram $targetProgram)
    {
        $bidangId = $targetProgram->bidang_id;
        $targetProgram->delete();

        return redirect()->route('target-program.index', ['bidang_id' => $bidangId])
            ->with('success', 'Target program berhasil dihapus.');
    }
}
