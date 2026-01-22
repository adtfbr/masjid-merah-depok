<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\AnggotaBidang;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use App\Models\Aset;
use App\Models\PengurusInti;
use App\Models\StrukturGambar;
use App\Models\TargetKesekretariatan;
use App\Models\BidangProgramKerja;
use App\Models\TargetProgram;

class PublicController extends Controller
{
    /**
     * Landing page
     */
    public function index()
    {
        $totalBidang = Bidang::count();
        $totalAnggota = AnggotaBidang::count();
        $kegiatanTerbaru = Kegiatan::with('bidang')
            ->latest('tanggal_mulai')
            ->limit(6)
            ->get();

        return view('public.index', compact(
            'totalBidang',
            'totalAnggota',
            'kegiatanTerbaru'
        ));
    }

    /**
     * Struktur Organisasi
     */
    public function organisasi()
    {
        $bidangs = Bidang::with(['anggota' => function($query) {
            $query->orderBy('jabatan');
        }])->get();

        return view('public.organisasi', compact('bidangs'));
    }

    /**
     * Halaman Kegiatan
     */
    public function kegiatan()
    {
        $kegiatans = Kegiatan::with('bidang')
            ->latest('tanggal_mulai')
            ->paginate(12);

        return view('public.kegiatan', compact('kegiatans'));
    }

    /**
     * Detail Kegiatan
     */
    public function kegiatanDetail($id)
    {
        $kegiatan = Kegiatan::with(['bidang', 'anggota', 'foto'])
            ->findOrFail($id);

        return view('public.kegiatan-detail', compact('kegiatan'));
    }

    /**
     * Transparansi Keuangan
     */
    public function keuangan(Request $request)
    {
        $year = $request->input('year', date('Y'));
        
        // Ringkasan per tahun
        $totalPemasukan = TransaksiKeuangan::pemasukan()
            ->whereYear('tanggal', $year)
            ->sum('jumlah');
        
        $totalPengeluaran = TransaksiKeuangan::pengeluaran()
            ->whereYear('tanggal', $year)
            ->sum('jumlah');
        
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Transaksi per bulan
        $transaksiPerBulan = [];
        for ($month = 1; $month <= 12; $month++) {
            $pemasukan = TransaksiKeuangan::pemasukan()
                ->whereYear('tanggal', $year)
                ->whereMonth('tanggal', $month)
                ->sum('jumlah');
            
            $pengeluaran = TransaksiKeuangan::pengeluaran()
                ->whereYear('tanggal', $year)
                ->whereMonth('tanggal', $month)
                ->sum('jumlah');

            $transaksiPerBulan[] = [
                'bulan' => date('M', mktime(0, 0, 0, $month, 1)),
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran,
            ];
        }

        // List tahun yang tersedia - tambahkan tahun sekarang jika belum ada transaksi
        $years = TransaksiKeuangan::selectRaw('YEAR(tanggal) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        
        // Pastikan tahun sekarang selalu ada dalam list
        $currentYear = date('Y');
        if (!$years->contains($currentYear)) {
            $years->prepend($currentYear);
        }

        return view('public.keuangan', compact(
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'transaksiPerBulan',
            'year',
            'years'
        ));
    }

    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        return view('public.kontak');
    }

    /**
     * Halaman Aset
     */
    public function aset()
    {
        $asets = Aset::with('foto')
            ->orderBy('nama_aset')
            ->paginate(12);

        $totalNilaiAset = Aset::sum('nilai');
        $totalAset = Aset::count();

        return view('public.aset', compact('asets', 'totalNilaiAset', 'totalAset'));
    }

    // ==================== NEW METHODS FOR RESTRUCTURED NAVIGATION ====================

    /**
     * Profile - Sejarah Masjid Merah
     */
    public function sejarah()
    {
        return view('public.profile.sejarah');
    }

    /**
     * Profile - Visi Misi
     */
    public function visiMisi()
    {
        return view('public.profile.visi-misi');
    }

    /**
     * Profile - Struktur Kepengurusan (Reuse organisasi with Dewan Pembina)
     */
    public function struktur()
    {
        $bidangs = Bidang::with(['anggota' => function($query) {
            $query->orderBy('jabatan');
        }])->get();

        // Get Pengurus Inti grouped by tipe
        $pembina = PengurusInti::where('tipe', 'pembina')->ordered()->get();
        $pengawas = PengurusInti::where('tipe', 'pengawas')->ordered()->get();
        $ketua = PengurusInti::where('tipe', 'ketua')->ordered()->first();
        $sekretaris = PengurusInti::where('tipe', 'sekretaris')->ordered()->first();
        $bendahara = PengurusInti::where('tipe', 'bendahara')->ordered()->first();

        // Get active struktur gambar
        $strukturGambar = StrukturGambar::aktif()->first();

        return view('public.profile.struktur', compact(
            'bidangs',
            'pembina',
            'pengawas',
            'ketua',
            'sekretaris',
            'bendahara',
            'strukturGambar'
        ));
    }

    /**
     * Manajemen Utama - Kesekretariatan
     */
    public function kesekretariatan()
    {
        $tahun = request('tahun', date('Y'));
        $targetKesekretariatan = TargetKesekretariatan::tahun($tahun)->ordered()->get();
        
        // Get available years
        $years = TargetKesekretariatan::selectRaw('DISTINCT tahun')
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');
        
        // Ensure current year is in the list
        if (!$years->contains(date('Y'))) {
            $years->prepend(date('Y'));
        }

        // Get Kesekretariatan members (assuming bidang_id for Kesekretariatan)
        // You need to identify which bidang_id is Kesekretariatan
        // For now, we'll get all pengurus inti
        $ketua = PengurusInti::where('tipe', 'ketua')->ordered()->first();
        $sekretaris = PengurusInti::where('tipe', 'sekretaris')->ordered()->first();
        $bendahara = PengurusInti::where('tipe', 'bendahara')->ordered()->first();

        return view('public.manajemen.kesekretariatan', compact(
            'targetKesekretariatan', 
            'tahun', 
            'years',
            'ketua',
            'sekretaris',
            'bendahara'
        ));
    }

    /**
     * Show Bidang Detail (Dynamic)
     */
    public function showBidang($id)
    {
        $bidang = Bidang::findOrFail($id);

        // Get Ketua Bidang
        $ketuaBidang = AnggotaBidang::where('bidang_id', $id)
            ->ketuaBidang()
            ->ordered()
            ->first();

        // Get Anggota grouped by Seksi
        $anggotaBySeksi = AnggotaBidang::where('bidang_id', $id)
            ->whereNotNull('seksi')
            ->where('seksi', '!=', '')
            ->ordered()
            ->get()
            ->groupBy('seksi');

        // Get Program Kerja for this bidang
        $programKerja = BidangProgramKerja::where('bidang_id', $id)->ordered()->get();

        // Get Target Program for this bidang
        $targetProgram = TargetProgram::where('bidang_id', $id)->ordered()->get();

        return view('public.bidang.show', compact(
            'bidang', 
            'ketuaBidang',
            'anggotaBySeksi',
            'programKerja', 
            'targetProgram'
        ));
    }

    /**
     * Program Kerja - Kegiatan Berjalan (Grouping by Bidang)
     */
    public function prokerTerlaksana()
    {
        // Get all kegiatan that are currently running (tanggal_selesai sudah lewat atau hari ini)
        $kegiatans = Kegiatan::with('bidang')
            ->where(function($query) {
                $query->where('tanggal_selesai', '<=', now())
                      ->orWhere(function($q) {
                          $q->whereDate('tanggal_mulai', '<=', now())
                            ->whereNull('tanggal_selesai');
                      });
            })
            ->latest('tanggal_mulai')
            ->get();

        // Group by bidang
        $kegiatansByBidang = $kegiatans->groupBy('bidang_id');

        return view('public.proker.terlaksana', compact('kegiatansByBidang'));
    }

    /**
     * Program Kerja - Kegiatan Mendatang
     */
    public function prokerRencana()
    {
        // Get kegiatan yang tanggal_mulai masih di masa depan
        $kegiatans = Kegiatan::with('bidang')
            ->whereDate('tanggal_mulai', '>', now())
            ->orderBy('tanggal_mulai')
            ->get();

        return view('public.proker.rencana', compact('kegiatans'));
    }

    /**
     * Program Kerja - Target Program
     */
    public function prokerTarget()
    {
        // Get all bidangs with their target programs
        $bidangs = Bidang::with(['targetProgram' => function($query) {
            $query->ordered();
        }])->get();

        return view('public.proker.target', compact('bidangs'));
    }
}
