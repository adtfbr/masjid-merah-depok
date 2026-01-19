@extends('layouts.admin')

@section('title', 'Detail Anggota')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                @if($anggotum->foto)
                <img src="{{ asset('storage/' . $anggotum->foto) }}" class="rounded-circle mb-3" 
                     width="150" height="150" style="object-fit: cover;">
                @else
                <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center mb-3" 
                     style="width: 150px; height: 150px;">
                    <i class="bi bi-person text-white" style="font-size: 4rem;"></i>
                </div>
                @endif
                
                <h4>{{ $anggotum->nama }}</h4>
                <p class="text-muted mb-1">{{ $anggotum->jabatan }}</p>
                <span class="badge bg-primary mb-3">{{ $anggotum->bidang->nama_bidang }}</span>
                
                @if($anggotum->no_hp)
                <p class="mb-3">
                    <i class="bi bi-telephone"></i> {{ $anggotum->no_hp }}
                </p>
                @endif
                
                <div class="d-grid gap-2">
                    <a href="{{ route('anggota.edit', $anggotum) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('anggota.destroy', $anggotum) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-calendar-event"></i> Kegiatan yang Diikuti</h5>
            </div>
            <div class="card-body">
                @if($anggotum->kegiatan->count() > 0)
                <div class="list-group">
                    @foreach($anggotum->kegiatan as $kegiatan)
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
                    <i class="bi bi-calendar-x fs-1"></i>
                    <p class="mt-2">Belum mengikuti kegiatan</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
