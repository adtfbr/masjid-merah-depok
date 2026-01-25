@extends('layouts.admin')
@section('title', 'Laporan Keuangan')
@section('content')
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai', $tanggalMulai) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir', $tanggalAkhir) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-primary d-block w-100"><i class="bi bi-search"></i> Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header"><h5 class="mb-0">Ringkasan Periode {{ formatTanggal($tanggalMulai) }} - {{ formatTanggal($tanggalAkhir) }}</h5></div>
    <div class="card-body">
        <div class="row text-center">
            <div class="col-md-4"><div class="border rounded p-3 bg-success bg-opacity-10"><h6>Pemasukan</h6><h3 class="text-success">{{ formatRupiah($totalPemasukan) }}</h3></div></div>
            <div class="col-md-4"><div class="border rounded p-3 bg-danger bg-opacity-10"><h6>Pengeluaran</h6><h3 class="text-danger">{{ formatRupiah($totalPengeluaran) }}</h3></div></div>
            <div class="col-md-4"><div class="border rounded p-3 bg-primary bg-opacity-10"><h6>Selisih</h6><h3 class="{{ $saldo >= 0 ? 'text-primary' : 'text-warning' }}">{{ formatRupiah($saldo) }}</h3><small class="text-muted">Periode ini</small></div></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">Detail Transaksi</h5>
        <button onclick="window.print()" class="btn btn-sm btn-primary"><i class="bi bi-printer"></i> Print</button>
    </div>
    <div class="card-body">
        @if($transaksis->count() > 0)
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr><th>Tanggal</th><th>Akun</th><th>Keterangan</th><th class="text-end">Pemasukan</th><th class="text-end">Pengeluaran</th></tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $t)
                    <tr>
                        <td>{{ formatTanggal($t->tanggal, 'd/m/Y') }}</td>
                        <td>{{ $t->akun->nama_akun }}</td>
                        <td><small>{{ Str::limit($t->keterangan, 50) }}</small></td>
                        <td class="text-end text-success">{{ $t->akun->tipe == 'pemasukan' ? formatRupiah($t->jumlah) : '' }}</td>
                        <td class="text-end text-danger">{{ $t->akun->tipe == 'pengeluaran' ? formatRupiah($t->jumlah) : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">TOTAL</td>
                        <td class="text-end text-success">{{ formatRupiah($totalPemasukan) }}</td>
                        <td class="text-end text-danger">{{ formatRupiah($totalPengeluaran) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        @else
        <p class="text-center text-muted py-4">Tidak ada transaksi pada periode ini</p>
        @endif
    </div>
</div>
@endsection
