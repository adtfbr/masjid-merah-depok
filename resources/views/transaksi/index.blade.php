@extends('layouts.admin')

@section('title', 'Transaksi Keuangan')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-cash-stack"></i> Ringkasan Keuangan</h5>
    </div>
    <div class="card-body">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="border rounded p-3 bg-success bg-opacity-10">
                    <h6 class="text-muted mb-2">Total Pemasukan</h6>
                    <h3 class="text-success mb-0">{{ formatRupiah($totalPemasukan) }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-3 bg-danger bg-opacity-10">
                    <h6 class="text-muted mb-2">Total Pengeluaran</h6>
                    <h3 class="text-danger mb-0">{{ formatRupiah($totalPengeluaran) }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border rounded p-3 {{ $saldoAkhir >= 0 ? 'bg-primary' : 'bg-warning' }} bg-opacity-10">
                    <h6 class="text-muted mb-2">Saldo Saat Ini</h6>
                    <h3 class="{{ $saldoAkhir >= 0 ? 'text-primary' : 'text-warning' }} mb-0">{{ formatRupiah($saldoAkhir) }}</h3>
                    <small class="text-muted">Saldo {{ date('Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-list-ul"></i> Daftar Transaksi</h5>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Transaksi
        </a>
    </div>
    <div class="card-body">
        <!-- Filter -->
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-2">
                <select name="tipe" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Tipe</option>
                    <option value="pemasukan" {{ request('tipe') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="pengeluaran" {{ request('tipe') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="akun_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Akun</option>
                    @foreach($akuns as $akun)
                    <option value="{{ $akun->id }}" {{ request('akun_id') == $akun->id ? 'selected' : '' }}>
                        {{ $akun->nama_akun }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="bidang_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Bidang</option>
                    @foreach($bidangs as $bidang)
                    <option value="{{ $bidang->id }}" {{ request('bidang_id') == $bidang->id ? 'selected' : '' }}>
                        {{ $bidang->nama_bidang }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai') }}" placeholder="Dari">
            </div>
            <div class="col-md-2">
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}" placeholder="Sampai">
            </div>
        </form>

        @if($transaksis->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="8%">Tanggal</th>
                        <th>Akun</th>
                        <th>Bidang</th>
                        <th>Keterangan</th>
                        <th width="15%" class="text-end">Jumlah</th>
                        <th width="12%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ formatTanggal($transaksi->tanggal, 'd/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $transaksi->akun->tipe == 'pemasukan' ? 'success' : 'danger' }}">
                                {{ $transaksi->akun->nama_akun }}
                            </span>
                        </td>
                        <td>
                            <small class="text-muted">{{ $transaksi->bidang->nama_bidang ?? '-' }}</small>
                        </td>
                        <td>
                            <small>{{ Str::limit($transaksi->keterangan, 40) }}</small>
                        </td>
                        <td class="text-end">
                            <strong class="{{ $transaksi->akun->tipe == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                {{ $transaksi->akun->tipe == 'pemasukan' ? '+' : '-' }} {{ formatRupiah($transaksi->jumlah) }}
                            </strong>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('transaksi.show', $transaksi) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('transaksi.edit', $transaksi) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('transaksi.destroy', $transaksi) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $transaksis->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-cash-stack text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada transaksi</p>
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Transaksi Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
