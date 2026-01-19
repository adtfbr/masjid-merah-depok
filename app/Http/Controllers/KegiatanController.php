<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Bidang;
use App\Models\AnggotaBidang;
use App\Models\KegiatanFoto;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kegiatan::with('bidang');

        // Filter berdasarkan bidang
        if ($request->filled('bidang_id')) {
            $query->where('bidang_id', $request->bidang_id);
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            if ($request->status == 'aktif') {
                $query->aktif();
            }
        }

        $kegiatans = $query->latest('tanggal_mulai')->paginate(15);
        $bidangs = Bidang::orderBy('nama_bidang')->get();

        return view('kegiatan.index', compact('kegiatans', 'bidangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidangs = Bidang::orderBy('nama_bidang')->get();
        $anggotas = AnggotaBidang::with('bidang')->orderBy('nama')->get();
        return view('kegiatan.create', compact('bidangs', 'anggotas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nama_kegiatan' => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:200',
            'anggota_ids' => 'nullable|array',
            'anggota_ids.*' => 'exists:anggota_bidang,id',
            'foto' => 'nullable|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'keterangan_foto' => 'nullable|array',
        ]);

        DB::beginTransaction();
        try {
            // Simpan kegiatan
            $kegiatan = Kegiatan::create($validated);

            // Attach anggota
            if ($request->filled('anggota_ids')) {
                $kegiatan->anggota()->attach($request->anggota_ids);
            }

            // Upload foto dokumentasi
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $index => $file) {
                    $path = $file->store('kegiatan', 'public');
                    KegiatanFoto::create([
                        'kegiatan_id' => $kegiatan->id,
                        'foto' => $path,
                        'keterangan' => $request->keterangan_foto[$index] ?? null,
                    ]);
                }
            }

            ActivityLog::log("Menambahkan kegiatan: {$kegiatan->nama_kegiatan}");

            DB::commit();

            return redirect()->route('kegiatan.index')
                ->with('success', 'Kegiatan berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal menambahkan kegiatan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        $kegiatan->load(['bidang', 'anggota.bidang', 'foto']);
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $kegiatan->load(['anggota', 'foto']);
        $bidangs = Bidang::orderBy('nama_bidang')->get();
        $anggotas = AnggotaBidang::with('bidang')->orderBy('nama')->get();
        return view('kegiatan.edit', compact('kegiatan', 'bidangs', 'anggotas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'bidang_id' => 'required|exists:bidangs,id',
            'nama_kegiatan' => 'required|string|max:200',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:200',
            'anggota_ids' => 'nullable|array',
            'anggota_ids.*' => 'exists:anggota_bidang,id',
            'foto' => 'nullable|array',
            'foto.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'keterangan_foto' => 'nullable|array',
        ]);

        DB::beginTransaction();
        try {
            $kegiatan->update($validated);

            // Sync anggota
            $kegiatan->anggota()->sync($request->anggota_ids ?? []);

            // Upload foto baru
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $index => $file) {
                    $path = $file->store('kegiatan', 'public');
                    KegiatanFoto::create([
                        'kegiatan_id' => $kegiatan->id,
                        'foto' => $path,
                        'keterangan' => $request->keterangan_foto[$index] ?? null,
                    ]);
                }
            }

            ActivityLog::log("Mengubah kegiatan: {$kegiatan->nama_kegiatan}");

            DB::commit();

            return redirect()->route('kegiatan.index')
                ->with('success', 'Kegiatan berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                ->with('error', 'Gagal memperbarui kegiatan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $nama = $kegiatan->nama_kegiatan;

        DB::beginTransaction();
        try {
            // Hapus semua foto
            foreach ($kegiatan->foto as $foto) {
                Storage::disk('public')->delete($foto->foto);
            }

            $kegiatan->delete();

            ActivityLog::log("Menghapus kegiatan: {$nama}");

            DB::commit();

            return redirect()->route('kegiatan.index')
                ->with('success', 'Kegiatan berhasil dihapus.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus kegiatan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus foto kegiatan
     */
    public function deleteFoto($id)
    {
        $foto = KegiatanFoto::findOrFail($id);
        Storage::disk('public')->delete($foto->foto);
        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}
