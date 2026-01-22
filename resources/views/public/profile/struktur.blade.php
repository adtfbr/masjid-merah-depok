@extends('layouts.public')

@section('title', 'Struktur Kepengurusan')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Struktur Kepengurusan</h1>
                <p class="lead text-white-50">Organisasi yang solid dan terpercaya dalam mengelola Masjid Merah Baiturrahman</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <!-- GAMBAR STRUKTUR ORGANISASI -->
        @if($strukturGambar)
        <div class="card card-modern">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">
                    <i class="bi bi-diagram-3"></i> Bagan Struktur Organisasi Yayasan Masjid Baiturrahman
                </h4>
            </div>
            <div class="card-body text-center p-4">
                <img src="{{ $strukturGambar->gambar_url }}" 
                     alt="Struktur Organisasi" 
                     class="img-fluid rounded shadow"
                     style="max-width: 100%; height: auto;">
            </div>
        </div>
        @else
        <div class="alert alert-warning text-center">
            <i class="bi bi-exclamation-triangle"></i> Bagan struktur organisasi belum tersedia. Silakan hubungi admin.
        </div>
        @endif
    </div>
</div>
@endsection
