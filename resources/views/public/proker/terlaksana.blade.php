@extends('layouts.public')

@section('title', 'Kegiatan Berjalan')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Kegiatan Berjalan</h1>
                <p class="lead text-white-50">Program Kerja yang Sedang & Telah Dilaksanakan</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">

        @if($kegiatansByBidang->count() > 0)
            @foreach($kegiatansByBidang as $bidangId => $kegiatans)
                @php
                    $bidang = $kegiatans->first()->bidang ?? null;
                @endphp
                
                @if($bidang)
                <div class="mb-5">
                    <!-- Header Bidang -->
                    <div class="card card-modern border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, var(--primary) 0%, #8B2332 100%);">
                        <div class="card-body p-4">
                            <h3 class="text-white mb-0">
                                <i class="bi bi-folder-check"></i> {{ $bidang->nama_bidang }}
                            </h3>
                            <p class="text-white mb-0 mt-2 opacity-75">
                                <i class="bi bi-check-circle"></i> {{ $kegiatans->count() }} kegiatan telah terlaksana
                            </p>
                        </div>
                    </div>

                    <!-- Grid Card Kegiatan -->
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
                                         style="height: 200px; background: linear-gradient(135deg, var(--secondary) 0%, #B89563 100%);">
                                        <i class="bi bi-calendar-check text-white" style="font-size: 4rem;"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
                                    <p class="card-text text-muted" style="font-size: 0.9rem;">
                                        {{ Str::limit($kegiatan->deskripsi, 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <small class="text-muted">
                                            <i class="bi bi-calendar3"></i> 
                                            {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('d M Y') }}
                                        </small>
                                        <span class="badge bg-success">Selesai</span>
                                    </div>
                                    @if($kegiatan->lokasi)
                                        <small class="text-muted d-block mb-2">
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
                </div>
                @endif
            @endforeach
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 5rem; color: var(--secondary);"></i>
                <h4 class="mt-3">Belum Ada Kegiatan Terlaksana</h4>
                <p class="text-muted">Data kegiatan yang sudah terlaksana akan ditampilkan di sini.</p>
            </div>
        @endif
    </div>
</div>
@endsection
