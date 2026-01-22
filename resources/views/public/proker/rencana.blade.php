@extends('layouts.public')

@section('title', 'Kegiatan Mendatang')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Kegiatan Mendatang</h1>
                <p class="lead text-white-50">Program Kerja yang Direncanakan</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">

        @if($kegiatans->count() > 0)
            <div class="row">
                @foreach($kegiatans as $kegiatan)
                <div class="col-md-4 mb-4">
                    <div class="card card-modern h-100">
                        @if($kegiatan->foto->count() > 0)
                            <img src="{{ Storage::url($kegiatan->foto->first()->foto_path) }}" 
                                 class="card-img-top" 
                                 alt="{{ $kegiatan->nama_kegiatan }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" 
                                 style="height: 200px; background: linear-gradient(135deg, var(--primary) 0%, #8B2332 100%);">
                                <i class="bi bi-calendar-event text-white" style="font-size: 4rem;"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0">{{ $kegiatan->nama_kegiatan }}</h5>
                                <span class="badge bg-warning text-dark">Rencana</span>
                            </div>
                            
                            @if($kegiatan->bidang)
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-diagram-3"></i> {{ $kegiatan->bidang->nama_bidang }}
                                </small>
                            @endif

                            <p class="card-text text-muted" style="font-size: 0.9rem;">
                                {{ Str::limit($kegiatan->deskripsi, 100) }}
                            </p>

                            <div class="mb-2">
                                <small class="text-muted d-block">
                                    <i class="bi bi-calendar3"></i> 
                                    <strong>Mulai:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('d M Y') }}
                                </small>
                                @if($kegiatan->tanggal_selesai)
                                    <small class="text-muted d-block">
                                        <i class="bi bi-calendar-check"></i> 
                                        <strong>Selesai:</strong> {{ \Carbon\Carbon::parse($kegiatan->tanggal_selesai)->format('d M Y') }}
                                    </small>
                                @endif
                            </div>

                            @if($kegiatan->lokasi)
                                <small class="text-muted d-block mb-3">
                                    <i class="bi bi-geo-alt"></i> {{ $kegiatan->lokasi }}
                                </small>
                            @endif

                            <a href="{{ route('public.kegiatan.detail', $kegiatan->id) }}" 
                               class="btn btn-primary-custom btn-sm w-100">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-calendar-x" style="font-size: 5rem; color: var(--secondary);"></i>
                <h4 class="mt-3">Belum Ada Kegiatan Direncanakan</h4>
                <p class="text-muted">Kegiatan yang akan datang akan ditampilkan di sini.</p>
            </div>
        @endif
    </div>
</div>
@endsection
