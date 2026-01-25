@extends('layouts.admin')
@section('title', 'Daftar Aset')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-box-seam"></i> Daftar Aset</h5>
        <a href="{{ route('aset.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Aset</a>
    </div>
    <div class="card-body">
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama aset..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="kategori_id" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kat)
                    <option value="{{ $kat->id }}" {{ request('kategori_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="kondisi" class="form-select">
                    <option value="">Semua Kondisi</option>
                    <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Cukup" {{ request('kondisi') == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                    <option value="Rusak" {{ request('kondisi') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>

        @if($asets->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Aset</th>
                        <th width="20%">Kategori</th>
                        <th width="15%" class="text-center">Kondisi</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asets as $aset)
                    <tr>
                        <td>{{ $asets->firstItem() + $loop->index }}</td>
                        <td><strong>{{ $aset->nama_aset }}</strong></td>
                        <td>
                            @if($aset->kategori)
                                <span class="badge bg-info">{{ $aset->kategori->nama_kategori }}</span>
                            @else
                                <span class="badge bg-secondary">Tidak ada kategori</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($aset->kondisi == 'Baik')
                                <span class="badge bg-success">Baik</span>
                            @elseif($aset->kondisi == 'Cukup')
                                <span class="badge bg-warning">Cukup</span>
                            @else
                                <span class="badge bg-danger">Rusak</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('aset.show', $aset) }}" class="btn btn-sm btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('aset.edit', $aset) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('aset.destroy', $aset) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus aset ini?')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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
            {{ $asets->withQueryString()->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-box-seam text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada data aset</p>
            <a href="{{ route('aset.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Aset Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
