@extends('layouts.admin')
@section('title', 'Daftar Aset')
@section('content')
<div class="card mb-3">
    <div class="card-body">
        <div class="row text-center">
            <div class="col-md-4"><div class="border rounded p-3"><h6>Total Aset</h6><h3>{{ $asets->total() }}</h3></div></div>
            <div class="col-md-8"><div class="border rounded p-3"><h6>Nilai Total</h6><h3 class="text-primary">{{ formatRupiah($totalNilai) }}</h3></div></div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="bi bi-box-seam"></i> Daftar Aset</h5>
        <a href="{{ route('aset.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Aset</a>
    </div>
    <div class="card-body">
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari aset..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($asets->pluck('kategori')->unique() as $kat)
                    <option value="{{ $kat }}" {{ request('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="kondisi" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kondisi</option>
                    <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Cukup" {{ request('kondisi') == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                    <option value="Rusak" {{ request('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>

        @if($asets->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr><th>No</th><th>Nama Aset</th><th>Kategori</th><th>Nilai</th><th>Kondisi</th><th>Lokasi</th><th class="text-center">Aksi</th></tr>
                </thead>
                <tbody>
                    @foreach($asets as $aset)
                    <tr>
                        <td>{{ $asets->firstItem() + $loop->index }}</td>
                        <td><strong>{{ $aset->nama_aset }}</strong></td>
                        <td><span class="badge bg-info">{{ $aset->kategori }}</span></td>
                        <td>{{ formatRupiah($aset->nilai) }}</td>
                        <td>{!! statusBadge($aset->kondisi) !!}</td>
                        <td><small>{{ $aset->lokasi }}</small></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('aset.show', $aset) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('aset.edit', $aset) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('aset.destroy', $aset) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
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
        {{ $asets->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada aset</p>
        </div>
        @endif
    </div>
</div>
@endsection
