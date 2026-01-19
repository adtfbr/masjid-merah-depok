@extends('layouts.public')

@section('title', 'Aset Masjid')

@section('content')
<!-- Hero Section dengan Background Masjid -->
<div class="hero-section" style="
    background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('{{ asset('images/hero-masjid.jpg') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    padding: 120px 0 80px 0;
    color: white;
">
    <div class="container text-center">
        <h1 style="padding: 60px 0;">
            <i class="bi bi-box-seam"></i> ASET MASJID
        </h1>
        <p>
            Inventaris dan Aset Masjid Merah Baiturrahman
        </p>
    </div>
</div>

<section class="section">
    <div class="container">
        <!-- Ringkasan Aset -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="stat-item" style="background: linear-gradient(135deg, var(--primary) 0%, #8B2332 100%); color: white;">
                    <i class="bi bi-box-seam text-white"></i>
                    <h3 class="text-white">{{ $totalAset }}</h3>
                    <p class="text-white mb-0">Total Item Aset</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-item" style="background: linear-gradient(135deg, var(--secondary) 0%, #B8965E 100%); color: white;">
                    <i class="bi bi-currency-dollar text-white"></i>
                    <h3 class="text-white">{{ formatRupiah($totalNilaiAset) }}</h3>
                    <p class="text-white mb-0">Total Nilai Aset</p>
                </div>
            </div>
        </div>

        <!-- Daftar Aset -->
        @if($asets->count() > 0)
        <div class="row g-4">
            @foreach($asets as $aset)
            <div class="col-md-4 col-sm-6">
                <div class="card card-modern h-100">
                    @if($aset->foto->count() > 0)
                    <img src="{{ asset('storage/' . $aset->foto->first()->foto) }}" class="card-img-top" alt="{{ $aset->nama_aset }}" style="height: 200px; object-fit: cover;">
                    @else
                    <div style="height: 200px; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-box-seam text-white" style="font-size: 4rem; opacity: 0.3;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $aset->nama_aset }}</h5>
                        <p class="text-muted mb-2">
                            <i class="bi bi-tag"></i> {{ $aset->kategori }}
                        </p>
                        <p class="text-muted mb-2">
                            <i class="bi bi-geo-alt"></i> {{ $aset->lokasi }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-{{ $aset->kondisi == 'Baik' ? 'success' : ($aset->kondisi == 'Cukup' ? 'warning' : 'danger') }}">
                                {{ $aset->kondisi }}
                            </span>
                            <strong style="color: var(--primary);">{{ formatRupiah($aset->nilai) }}</strong>
                        </div>
                    </div>
                    @if($aset->foto->count() > 1)
                    <div class="card-footer bg-light">
                        <small class="text-muted">
                            <i class="bi bi-images"></i> {{ $aset->foto->count() }} foto
                        </small>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5">
            {{ $asets->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-box-seam text-muted" style="font-size: 5rem;"></i>
            <p class="text-muted mt-3">Belum ada data aset</p>
        </div>
        @endif

        <div class="alert alert-info mt-5">
            <i class="bi bi-info-circle"></i> <strong>Catatan:</strong> Data aset ini dipublikasikan untuk transparansi pengelolaan inventaris masjid.
        </div>
    </div>
</section>
@endsection
