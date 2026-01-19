@extends('layouts.public')

@section('title', 'Kegiatan Masjid')

@section('content')
<div class="hero-section" style="padding: 60px 0;">
    <div class="container text-center">
        <h1><i class="bi bi-calendar-event"></i> Kegiatan Masjid</h1>
        <p>Berbagai kegiatan untuk kemajuan umat</p>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($kegiatans->count() > 0)
        <div class="row g-4">
            @foreach($kegiatans as $kegiatan)
            <div class="col-md-4 col-sm-6">
                <div class="card card-modern h-100">
                    @if($kegiatan->foto->count() > 0)
                    <img src="{{ asset('storage/' . $kegiatan->foto->first()->foto) }}" class="card-img-top" alt="{{ $kegiatan->nama_kegiatan }}">
                    @else
                    <div class="card-img-top bg-gradient d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="bi bi-calendar-event text-white" style="font-size: 4rem;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="badge bg-primary">{{ $kegiatan->bidang->nama_bidang }}</span>
                            <span class="badge bg-{{ $kegiatan->status == 'Berlangsung' ? 'success' : ($kegiatan->status == 'Akan Datang' ? 'warning' : 'secondary') }}">
                                {{ $kegiatan->status }}
                            </span>
                        </div>
                        <h5 class="card-title">{{ $kegiatan->nama_kegiatan }}</h5>
                        <p class="card-text text-muted">
                            <small>
                                <i class="bi bi-calendar"></i> {{ formatTanggal($kegiatan->tanggal_mulai) }}<br>
                                <i class="bi bi-geo-alt"></i> {{ $kegiatan->lokasi }}
                            </small>
                        </p>
                        <a href="{{ route('public.kegiatan.detail', $kegiatan->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-4">
            {{ $kegiatans->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-calendar-x text-muted" style="font-size: 5rem;"></i>
            <p class="text-muted mt-3">Belum ada kegiatan</p>
        </div>
        @endif
    </div>
</section>
@endsection
