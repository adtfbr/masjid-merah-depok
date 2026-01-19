<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\AsetFoto;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Aset::withCount('foto');

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->kategori($request->kategori);
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

        // Total nilai aset
        $totalNilai = Aset::sum('nilai');

        return view('aset.index', compact('asets', 'totalNilai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_aset' => 'required|string|max:200',
            'kategori' => 'required|string|max:100',
            'nilai' => 'required|numeric|min:0',
            'kondisi' => 'required|string|max:100',
            'lokasi' => 'required|string|max:200',
            'foto' => 'nullable|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $aset = Aset::create($validated);

            // Upload foto
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $file) {
                    $path = $file->store('aset', 'public');
                    AsetFoto::create([
                        'aset_id' => $aset->id,
                        'foto' => $path,
                    ]);
                }
            }

            ActivityLog::log("Menambahkan aset: {$aset->nama_aset}");

            DB::commit();

            return redirect()->route('aset.index')
                ->with('success', 'Aset berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal menambahkan aset: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        $aset->load('foto');
        return view('aset.show', compact('aset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        $aset->load('foto');
        return view('aset.edit', compact('aset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        // Log untuk debugging
        Log::info('Update Aset Request', [
            'aset_id' => $aset->id,
            'request_data' => $request->except('_token', '_method', 'foto')
        ]);

        // Validasi input
        $request->validate([
            'nama_aset' => 'required|string|max:200',
            'kategori' => 'required|string|max:100',
            'nilai' => 'required|numeric|min:0',
            'kondisi' => 'required|in:Baik,Cukup,Rusak',
            'lokasi' => 'required|string|max:200',
            'foto' => 'nullable|array',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // Update data aset dengan raw values
            $updated = $aset->update([
                'nama_aset' => $request->input('nama_aset'),
                'kategori' => $request->input('kategori'),
                'nilai' => (float) $request->input('nilai'),
                'kondisi' => $request->input('kondisi'),
                'lokasi' => $request->input('lokasi'),
            ]);

            Log::info('Aset Update Result', [
                'success' => $updated,
                'aset_data' => $aset->fresh()->toArray()
            ]);

            // Upload foto baru jika ada
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $file) {
                    $path = $file->store('aset', 'public');
                    AsetFoto::create([
                        'aset_id' => $aset->id,
                        'foto' => $path,
                    ]);
                }
            }

            ActivityLog::log("Mengubah aset: {$aset->nama_aset}");

            DB::commit();

            return redirect()->route('aset.index')
                ->with('success', 'Aset berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Aset Update Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('aset.edit', $aset)
                ->withInput()
                ->with('error', 'Gagal memperbarui aset: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $nama = $aset->nama_aset;

        DB::beginTransaction();
        try {
            // Hapus semua foto
            foreach ($aset->foto as $foto) {
                if (Storage::disk('public')->exists($foto->foto)) {
                    Storage::disk('public')->delete($foto->foto);
                }
            }

            $aset->delete();

            ActivityLog::log("Menghapus aset: {$nama}");

            DB::commit();

            return redirect()->route('aset.index')
                ->with('success', 'Aset berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus aset: ' . $e->getMessage());
        }
    }

    /**
     * Hapus foto aset
     */
    public function deleteFoto($id)
    {
        try {
            $foto = AsetFoto::findOrFail($id);
            
            // Hapus file dari storage jika ada
            if (Storage::disk('public')->exists($foto->foto)) {
                Storage::disk('public')->delete($foto->foto);
            }
            
            $foto->delete();

            return back()->with('success', 'Foto berhasil dihapus.');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }
}
