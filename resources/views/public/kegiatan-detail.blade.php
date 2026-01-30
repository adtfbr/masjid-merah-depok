@extends('layouts.public')

@section('meta_title', $kegiatan->nama_kegiatan . ' - Masjid Merah Baiturrahman')
@section('meta_description', $kegiatan->meta_description)
@section('meta_keywords', 'kegiatan masjid, ' . strtolower($kegiatan->bidang->nama_bidang) . ', ' . strtolower($kegiatan->nama_kegiatan) . ', masjid merah baiturrahman')
@section('canonical_url', route('public.kegiatan.detail', $kegiatan->slug))

@section('og_title', $kegiatan->nama_kegiatan)
@section('og_description', $kegiatan->meta_description)
@section('og_type', 'article')
@section('og_url', route('public.kegiatan.detail', $kegiatan->slug))
@section('og_image', $kegiatan->og_image)

@section('twitter_title', $kegiatan->nama_kegiatan)
@section('twitter_description', $kegiatan->meta_description)
@section('twitter_image', $kegiatan->og_image)

@section('content')
{{-- Hero Section --}}
<div class="hero-section" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/hero-masjid.jpg') }}'); background-size: cover; background-position: center; background-attachment: fixed; padding: 100px 0 60px 0; color: white;">
    <div class="container">
        <h1 style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">{{ $kegiatan->nama_kegiatan }}</h1>
        <p style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
            <i class="bi bi-calendar"></i> {{ formatTanggal($kegiatan->tanggal_mulai) }}
            @if($kegiatan->tanggal_selesai)
            - {{ formatTanggal($kegiatan->tanggal_selesai) }}
            @endif
        </p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-modern mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="badge" style="background: var(--primary);">{{ $kegiatan->bidang->nama_bidang }}</span>
                            <span class="badge bg-{{ $kegiatan->status == 'Berlangsung' ? 'success' : ($kegiatan->status == 'Akan Datang' ? 'warning' : 'secondary') }}">
                                {{ $kegiatan->status }}
                            </span>
                        </div>
                        <p class="text-muted">
                            <i class="bi bi-geo-alt"></i> {{ $kegiatan->lokasi }}
                        </p>
                        <hr>
                        <h5>Deskripsi</h5>
                        <p style="white-space: pre-line;">{{ $kegiatan->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                    </div>
                </div>

                {{-- Galeri Foto --}}
                @if($kegiatan->foto->count() > 0)
                <div class="card card-modern">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-images"></i> Dokumentasi Kegiatan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach($kegiatan->foto as $foto)
                            <div class="col-md-4 col-sm-6">
                                <a href="{{ asset('storage/' . $foto->foto) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $foto->foto) }}" 
                                         class="img-fluid rounded" 
                                         alt="{{ generateAltText($kegiatan->nama_kegiatan, $foto->keterangan ?: 'Dokumentasi Kegiatan') }}" 
                                         style="width: 100%; height: 200px; object-fit: cover;">
                                </a>
                                @if($foto->keterangan)
                                <p class="text-muted mt-2"><small>{{ $foto->keterangan }}</small></p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                {{-- Panitia/Anggota --}}
                @if($kegiatan->anggota->count() > 0)
                <div class="card card-modern mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-people"></i> Panitia</h5>
                    </div>
                    <div class="card-body">
                        @foreach($kegiatan->anggota as $anggota)
                        <div class="d-flex align-items-center mb-3">
                            @if($anggota->foto)
                                <div class="avatar-circle me-3">
                                    <img src="{{ asset('storage/' . $anggota->foto) }}"
                                         alt="{{ $anggota->nama }}">
                                </div>
                                @else
                                <div class="avatar-circle bg-secondary me-3 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                                @endif

                            <div>
                                <h6 class="mb-0">{{ $anggota->nama }}</h6>
                                <small class="text-muted">{{ $anggota->jabatan }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Share --}}
                <div class="card card-modern">
                    <div class="card-body text-center">
                        <h6>Bagikan Kegiatan</h6>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('public.kegiatan.detail', $kegiatan->slug)) }}" target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('public.kegiatan.detail', $kegiatan->slug)) }}&text={{ urlencode($kegiatan->nama_kegiatan) }}" target="_blank" class="btn btn-info btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($kegiatan->nama_kegiatan . ' - ' . route('public.kegiatan.detail', $kegiatan->slug)) }}" target="_blank" class="btn btn-success btn-sm">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
