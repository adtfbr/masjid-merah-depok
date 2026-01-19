@extends('layouts.admin')
@section('title', 'Akun Keuangan')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="bi bi-wallet2"></i> Akun Keuangan</h5>
        <a href="{{ route('akun-keuangan.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah</a>
    </div>
    <div class="card-body">
        @if($akuns->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr><th>No</th><th>Nama Akun</th><th>Tipe</th><th>Jumlah Transaksi</th><th class="text-center">Aksi</th></tr>
                </thead>
                <tbody>
                    @foreach($akuns as $akun)
                    <tr>
                        <td>{{ $akuns->firstItem() + $loop->index }}</td>
                        <td><strong>{{ $akun->nama_akun }}</strong></td>
                        <td><span class="badge bg-{{ $akun->tipe == 'pemasukan' ? 'success' : 'danger' }}">{{ ucfirst($akun->tipe) }}</span></td>
                        <td>{{ $akun->transaksi_count }} transaksi</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('akun-keuangan.show', $akun) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('akun-keuangan.edit', $akun) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('akun-keuangan.destroy', $akun) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $akuns->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-wallet2 text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada akun keuangan</p>
        </div>
        @endif
    </div>
</div>
@endsection
