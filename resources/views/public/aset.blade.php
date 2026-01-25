@extends('layouts.public')

@section('title', 'Aset Masjid')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Aset Masjid</h1>
                <p class="lead text-white-50">Inventaris dan Aset Masjid Merah Baiturrahman</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        @if($kategoris->count() > 0)
        <div class="row">
            @foreach($kategoris as $kategori)
            <div class="col-md-4 col-sm-6 mb-4">
                <a href="{{ route('public.aset.kategori', $kategori->id) }}" class="text-decoration-none">
                    <div class="card card-modern h-100 hover-shadow">
                        @if($kategori->foto)
                        <img src="{{ $kategori->foto_url }}" class="card-img-top" style="height: 250px; object-fit: cover;" alt="{{ $kategori->nama_kategori }}">
                        @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 250px;">
                            <i class="bi bi-box-seam text-white" style="font-size: 4rem;"></i>
                        </div>
                        @endif
                        <div class="card-body text-center">
                            <h4 class="mb-2">{{ $kategori->nama_kategori }}</h4>
                            <p class="text-muted mb-0">
                                <i class="bi bi-box"></i> {{ $kategori->aset_count }} Item
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Data aset belum tersedia.
        </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important;
    }
</style>
@endpush
@endsection
