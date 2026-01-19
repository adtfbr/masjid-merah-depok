@extends('layouts.admin')
@section('title', 'Detail Transaksi')
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-borderless">
            <tr><th width="30%">Tanggal</th><td>{{ formatTanggal($transaksi->tanggal) }}</td></tr>
            <tr><th>Akun</th><td><span class="badge bg-{{ $transaksi->akun->tipe == 'pemasukan' ? 'success' : 'danger' }}">{{ $transaksi->akun->nama_akun }}</span></td></tr>
            <tr><th>Bidang</th><td>{{ $transaksi->bidang->nama_bidang ?? '-' }}</td></tr>
            <tr><th>Jumlah</th><td><h4 class="{{ $transaksi->akun->tipe == 'pemasukan' ? 'text-success' : 'text-danger' }}">{{ formatRupiah($transaksi->jumlah) }}</h4></td></tr>
            <tr><th>Keterangan</th><td>{{ $transaksi->keterangan ?: '-' }}</td></tr>
            <tr><th>Dibuat Oleh</th><td>{{ $transaksi->creator->name }}</td></tr>
            <tr><th>Dibuat Pada</th><td>{{ $transaksi->created_at->format('d/m/Y H:i') }}</td></tr>
        </table>
        <div class="d-flex gap-2">
            <a href="{{ route('transaksi.edit', $transaksi) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('transaksi.destroy', $transaksi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
            </form>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection
