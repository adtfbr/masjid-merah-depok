@extends('layouts.admin')
@section('title', 'Detail Kegiatan')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header"><h5 class="mb-0"><i class="bi bi-info-circle"></i> Informasi Kegiatan</h5></div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr><th width="30%">Nama Kegiatan</th><td><strong>{{ $kegiatan->nama_kegiatan }}</strong></td></tr>
                    <tr><th>Bidang</th><td><span class="badge bg-primary">{{ $kegiatan->bidang->nama_bidang }}</span></td></tr>
                    <tr><th>Deskripsi</th><td>{{ $kegiatan->deskripsi ?: '-' }}</td></tr>
                    <tr><th>Tanggal Mulai</th><td>{{ formatTanggal($kegiatan->tanggal_mulai) }}</td></tr>
                    <tr><th>Tanggal Selesai</th><td>{{ $kegiatan->tanggal_selesai ? formatTanggal($kegiatan->tanggal_selesai) : '-' }}</td></tr>
                    <tr><th>Lokasi</th><td>{{ $kegiatan->lokasi }}</td></tr>
                    <tr><th>Status</th><td>{!! statusBadge($kegiatan->status) !!}</td></tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h5 class="mb-0"><i class="bi bi-images"></i> Dokumentasi Foto</h5></div>
            <div class="card-body">
                @if($kegiatan->foto->count() > 0)
                <div class="row g-2">
                    @foreach($kegiatan->foto as $foto)
                    <div class="col-md-4">
                        <a href="{{ asset('storage/' . $foto->foto) }}" target="_blank">
                            <img src="{{ asset('storage/' . $foto->foto) }}" class="img-fluid rounded">
                        </a>
                        @if($foto->keterangan)
                        <small class="text-muted d-block mt-1">{{ $foto->keterangan }}</small>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-images fs-1"></i>
                    <p class="mt-2">Belum ada dokumentasi foto</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header"><h5 class="mb-0"><i class="bi bi-people"></i> Anggota Terlibat</h5></div>
            <div class="card-body">
                @if($kegiatan->anggota->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($kegiatan->anggota as $anggota)
                    <div class="list-group-item px-0">
                        <div class="d-flex align-items-center gap-2">
                            @if($anggota->foto)
                            <img src="{{ asset('storage/' . $anggota->foto) }}" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                            @else
                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-person text-white"></i>
                            </div>
                            @endif
                            <div>
                                <div><strong>{{ $anggota->nama }}</strong></div>
                                <small class="text-muted">{{ $anggota->jabatan }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-people fs-1"></i>
                    <p class="mt-2">Belum ada anggota terlibat</p>
                </div>
                @endif
            </div>
        </div>

        <div class="d-grid gap-2">
            <a href="{{ route('kegiatan.edit', $kegiatan) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Edit</a>
            <form action="{{ route('kegiatan.destroy', $kegiatan) }}" method="POST" onsubmit="return confirm('Yakin?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger w-100"><i class="bi bi-trash"></i> Hapus</button>
            </form>
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection
