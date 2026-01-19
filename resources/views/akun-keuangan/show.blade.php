@extends('layouts.admin')
@section('title', 'Detail Akun')
@section('content')
<div class="card">
    <div class="card-body">
        <h4>{{ $akunKeuangan->nama_akun }}</h4>
        <span class="badge bg-{{ $akunKeuangan->tipe == 'pemasukan' ? 'success' : 'danger' }} mb-3">{{ ucfirst($akunKeuangan->tipe) }}</span>
        <p>Total Transaksi: <strong>{{ formatRupiah($totalTransaksi) }}</strong></p>
        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('akun-keuangan.edit', $akunKeuangan) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
            <a href="{{ route('akun-keuangan.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        <h5>Transaksi Terbaru</h5>
        @if($akunKeuangan->transaksi->count() > 0)
        <div class="list-group">
            @foreach($akunKeuangan->transaksi as $t)
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div><strong>{{ formatRupiah($t->jumlah) }}</strong><br><small>{{ formatTanggal($t->tanggal) }}</small></div>
                    <div class="text-end"><small>{{ $t->bidang->nama_bidang ?? '-' }}</small></div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted">Belum ada transaksi</p>
        @endif
    </div>
</div>
@endsection
