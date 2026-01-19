@extends('layouts.admin')

@section('title', 'Detail Bidang')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Informasi Bidang</h5>
            </div>
            <div class="card-body">
                <h4>{{ $bidang->nama_bidang }}</h4>
                <p class="text-muted mb-4">{{ $bidang->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                
                <div class="row text-center mb-3">
                    <div class="col-6">
                        <div class="border rounded p-3">
                            <h3 class="text-primary mb-0">{{ $bidang->anggota->count() }}</h3>
                            <small class="text-muted">Anggota</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded p-3">
                            <h3 class="text-success mb-0">{{ $bidang->kegiatan->count() }}</h3>
                            <small class="text-muted">Kegiatan</small>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex gap-2">
                    <a href="{{ route('bidang.edit', $bidang) }}" class="btn btn-warning w-100">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('bidang.destroy', $bidang) }}" method="POST" class="w-100" 
                          onsubmit="return confirm('Yakin ingin menghapus bidang ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
                
                <a href="{{ route('bidang.index') }}" class="btn btn-secondary w-100 mt-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <!-- Daftar Anggota -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-people"></i> Anggota Bidang</h5>
                <a href="{{ route('anggota.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus"></i> Tambah Anggota
                </a>
            </div>
            <div class="card-body">
                @if($bidang->anggota->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>No HP</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bidang->anggota as $anggota)
                            <tr>
                                <td>{{ $anggota->nama }}</td>
                                <td><span class="badge bg-info">{{ $anggota->jabatan }}</span></td>
                                <td>{{ $anggota->no_hp ?: '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('anggota.show', $anggota) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-people fs-1"></i>
                    <p class="mt-2">Belum ada anggota</p>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Kegiatan Terbaru -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-calendar-event"></i> Kegiatan Terbaru</h5>
                <a href="{{ route('kegiatan.create') }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus"></i> Tambah Kegiatan
                </a>
            </div>
            <div class="card-body">
                @if($bidang->kegiatan->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($bidang->kegiatan as $kegiatan)
                    <a href="{{ route('kegiatan.show', $kegiatan) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">{{ $kegiatan->nama_kegiatan }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i> {{ $kegiatan->lokasi }}
                                </small>
                            </div>
                            <div class="text-end">
                                {!! statusBadge($kegiatan->status) !!}
                                <br>
                                <small class="text-muted">{{ formatTanggal($kegiatan->tanggal_mulai) }}</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-calendar-event fs-1"></i>
                    <p class="mt-2">Belum ada kegiatan</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
