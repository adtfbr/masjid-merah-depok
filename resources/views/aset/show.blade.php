@extends('layouts.admin')
@section('title', 'Detail Aset')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header"><h5 class="mb-0"><i class="bi bi-info-circle"></i> Informasi Aset</h5></div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr><th width="30%">Nama Aset</th><td><strong>{{ $aset->nama_aset }}</strong></td></tr>
                    <tr><th>Kategori</th><td><span class="badge bg-info">{{ $aset->kategori }}</span></td></tr>
                    <tr><th>Nilai</th><td><h4 class="text-primary mb-0">{{ formatRupiah($aset->nilai) }}</h4></td></tr>
                    <tr><th>Kondisi</th><td>{!! statusBadge($aset->kondisi) !!}</td></tr>
                    <tr><th>Lokasi</th><td>{{ $aset->lokasi }}</td></tr>
                    <tr><th>Dibuat Pada</th><td>{{ formatTanggal($aset->created_at) }}</td></tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h5 class="mb-0"><i class="bi bi-images"></i> Galeri Foto</h5></div>
            <div class="card-body">
                @if($aset->foto->count() > 0)
                <div class="row g-2">
                    @foreach($aset->foto as $foto)
                    <div class="col-md-4">
                        <a href="{{ asset('storage/' . $foto->foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $foto->foto) }}" class="img-fluid rounded">
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-images fs-1"></i>
                    <p class="mt-2">Belum ada foto</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="d-grid gap-2">
            <a href="{{ route('aset.edit', $aset) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('aset.destroy', $aset) }}" method="POST" onsubmit="return confirm('Yakin?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger w-100"><i class="bi bi-trash"></i> Hapus</button>
            </form>
            <a href="{{ route('aset.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection
