@extends('layouts.public')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <img src="{{ asset('images/logo-masjid.png') }}" alt="Logo Masjid Merah Baiturrahman" class="hero-logo">
        <h1>Sistem Informasi Manajemen</h1>
        <div class="hero-subtitle" style="font-size: 48px; font-family: 'Gotham', sans-serif;">Masjid Merah Baiturrahman</div>
        <p>"Menjadi yayasan Islam profesional dan terpercaya yang melayani umat di bidang keagamaan dan sosial, dengan fokus pada pembentukan Sumber Daya Manusia (SDM) yang berakhlak mulia"</p>
        <div class="mt-4">
            <a href="{{ route('public.kegiatan') }}" class="btn btn-light btn-lg me-2">
                <i class="bi bi-calendar-event"></i> Lihat Kegiatan
            </a>
            <a href="{{ route('public.keuangan') }}" class="btn btn-outline-light btn-lg">
                <i class="bi bi-cash-stack"></i> Transparansi Keuangan
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-diagram-3"></i>
                    <h3>{{ $totalBidang }}</h3>
                    <p>Bidang</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-people"></i>
                    <h3>{{ $totalAnggota }}</h3>
                    <p>Pengurus Aktif</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <i class="bi bi-calendar-check"></i>
                    <h3>{{ $kegiatanTerbaru->count() }}+</h3>
                    <p>Kegiatan Terlaksana</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kegiatan Berjalan -->
<section class="section">
    <div class="container">
        <div class="section-title">
            <h2>Kegiatan Berjalan</h2>
            <p>Ikuti berbagai kegiatan masjid kami</p>
        </div>

        <div class="row g-4">
            @forelse($kegiatanTerbaru as $kegiatan)
            <div class="col-md-4">
                <div class="card card-modern h-100">
                    @if($kegiatan->foto->count() > 0)
                    <img src="{{ asset('storage/' . $kegiatan->foto->first()->foto) }}" class="card-img-top" alt="{{ generateAltText($kegiatan->nama_kegiatan, 'Dokumentasi Kegiatan') }}">
                    @else
                    <div class="card-img-top bg-gradient d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(135deg, #A0293A 0%, #C5A572 100%);">
                        <i class="bi bi-calendar-event text-white" style="font-size: 4rem;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $kegiatan->bidang->nama_bidang }}</span>
                            <span class="badge bg-{{ $kegiatan->status == 'Berlangsung' ? 'success' : ($kegiatan->status == 'Akan Datang' ? 'warning' : 'secondary') }}">
                                {{ $kegiatan->status }}
                            </span>
                        </div>
                        <h3 style="font-size: 1.25rem; margin-bottom: 0.75rem; font-weight: 600;">{{ $kegiatan->nama_kegiatan }}</h3>
                        <p class="card-text text-muted">
                            <small>
                                <i class="bi bi-calendar"></i> {{ formatTanggal($kegiatan->tanggal_mulai) }}<br>
                                <i class="bi bi-geo-alt"></i> {{ $kegiatan->lokasi }}
                            </small>
                        </p>
                        <a href="{{ route('public.kegiatan.detail', $kegiatan->slug) }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada kegiatan terbaru</p>
            </div>
            @endforelse
        </div>

        @if($kegiatanTerbaru->count() > 0)
        <div class="text-center mt-4">
            <a href="{{ route('public.proker.terlaksana') }}" class="btn btn-primary-custom">
                Lihat Semua Kegiatan Berjalan <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2 class="mb-4">Mari Bergabung Bersama Kami</h2>
        <p class="lead mb-4">Ikuti kegiatan-kegiatan masjid dan berkontribusi untuk kemajuan umat</p>
        <a href="{{ route('public.kontak') }}" class="btn btn-light btn-lg">
            <i class="bi bi-envelope"></i> Hubungi Kami
        </a>
    </div>
</section>
@endsection
