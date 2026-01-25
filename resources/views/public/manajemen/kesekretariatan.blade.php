@extends('layouts.public')

@section('title', 'Dewan Pengurus Harian')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Dewan Pengurus Harian</h1>
                <p class="lead text-white-50">Manajemen Utama Masjid Merah Baiturrahman</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <!-- PROFIL PENGURUS KESEKRETARIATAN -->
        <div class="card card-modern mb-5">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><i class="bi bi-people"></i> Dewan Pengurus Harian</h4>
            </div>
            <div class="card-body p-4">
                @if($ketua || $sekretaris || $bendahara)
                    <!-- Ketua (Posisi Atas - Lebih Besar) -->
                    @if($ketua)
<div class="row justify-content-center mb-5">
    <div class="col-auto">
        <div class="bagan-card">
            @if($ketua->foto)
                <img src="{{ $ketua->foto_url }}" alt="{{ $ketua->nama }}">
            @else
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='260' height='260' viewBox='0 0 260 260'%3E%3Crect fill='%23667eea' width='260' height='260'/%3E%3Cg fill='%23ffffff' opacity='0.8'%3E%3Ccircle cx='130' cy='100' r='40'/%3E%3Cpath d='M80 200 Q80 140 130 140 Q180 140 180 200 Z'/%3E%3C/g%3E%3C/svg%3E" alt="{{ $ketua->nama }}">
            @endif

            <div class="bagan-label">
                <h5>{{ $ketua->nama }}</h5>
                <p>{{ $ketua->tipe_label }}</p>
            </div>

            @if($ketua->kontak)
                <small class="text-muted d-block mt-2">
                    <i class="bi bi-telephone"></i> {{ $ketua->kontak }}
                </small>
            @endif
        </div>
    </div>
</div>
@endif

                    <!-- Sekretaris & Bendahara (Posisi Bawah) -->
                    <div class="row justify-content-center gap-4 mb-4">
    @if($sekretaris)
    <div class="col-auto">
        <div class="bagan-card">
            @if($sekretaris->foto)
                <img src="{{ $sekretaris->foto_url }}" alt="{{ $sekretaris->nama }}">
            @else
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='260' height='260' viewBox='0 0 260 260'%3E%3Crect fill='%23667eea' width='260' height='260'/%3E%3Cg fill='%23ffffff' opacity='0.8'%3E%3Ccircle cx='130' cy='100' r='40'/%3E%3Cpath d='M80 200 Q80 140 130 140 Q180 140 180 200 Z'/%3E%3C/g%3E%3C/svg%3E" alt="{{ $sekretaris->nama }}">
            @endif

            <div class="bagan-label">
                <h5>{{ $sekretaris->nama }}</h5>
                <p>{{ $sekretaris->tipe_label }}</p>
            </div>

            @if($sekretaris->kontak)
                <small class="text-muted d-block mt-2">
                    <i class="bi bi-telephone"></i> {{ $sekretaris->kontak }}
                </small>
            @endif
        </div>
    </div>
    @endif

    @if($bendahara)
    <div class="col-auto">
        <div class="bagan-card">
            @if($bendahara->foto)
                <img src="{{ $bendahara->foto_url }}" alt="{{ $bendahara->nama }}">
            @else
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='260' height='260' viewBox='0 0 260 260'%3E%3Crect fill='%23667eea' width='260' height='260'/%3E%3Cg fill='%23ffffff' opacity='0.8'%3E%3Ccircle cx='130' cy='100' r='40'/%3E%3Cpath d='M80 200 Q80 140 130 140 Q180 140 180 200 Z'/%3E%3C/g%3E%3C/svg%3E" alt="{{ $bendahara->nama }}">
            @endif

            <div class="bagan-label">
                <h5>{{ $bendahara->nama }}</h5>
                <p>{{ $bendahara->tipe_label }}</p>
            </div>

            @if($bendahara->kontak)
                <small class="text-muted d-block mt-2">
                    <i class="bi bi-telephone"></i> {{ $bendahara->kontak }}
                </small>
            @endif
        </div>
    </div>
    @endif
</div>

                @else
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> Data Dewan Pengurus Harian belum tersedia.
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Fungsi Kesekretariatan -->
                <div class="card card-modern mb-4">
                    <div class="card-header" style="background: var(--primary); color: white;">
                        <h4 class="mb-0"><i class="bi bi-building"></i> Fungsi Dewan Pengurus Harian</h4>
                    </div>
                    <div class="card-body p-4">
                        <p style="text-align: justify;">
                            Dewan Pengurus Harian Masjid Merah Baiturrahman merupakan unit manajemen utama yang bertugas
                            mengelola administrasi, koordinasi antar bidang, serta dokumentasi seluruh kegiatan masjid.
                            Dewan Pengurus Harian menjadi tulang punggung operasional yang memastikan seluruh program dan
                            kegiatan berjalan dengan baik dan terkoordinir.
                        </p>

                        <h5 class="mt-4 mb-3">Tugas Pokok:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Mengelola administrasi, surat menyurat masjid, data dan informasi masjid</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Mengkoordinasikan seluruh kegiatan antar bidang</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Mendokumentasikan dan mengarsipkan seluruh kegiatan</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Memfasilitasi rapat dan pertemuan pengurus</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Menyusun laporan berkala kepada pengurus dan jamaah</li>
                        </ul>
                    </div>
                </div>

                <!-- Filter Tahun -->
                @if($years->count() > 1)
                <div class="mb-4">
                    <form method="GET" action="{{ route('public.manajemen.kesekretariatan') }}">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <label class="form-label">Filter Tahun:</label>
                            </div>
                            <div class="col-md-4">
                                <select name="tahun" class="form-select" onchange="this.form.submit()">
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                @endif

                <!-- Target Kerja Dynamic -->
                <div class="card card-modern">
                    <div class="card-header" style="background: var(--secondary); color: white;">
                        <h4 class="mb-0"><i class="bi bi-bullseye"></i> Target Kerja {{ $tahun }}</h4>
                    </div>
                    <div class="card-body p-4">
                        @if($targetKesekretariatan->count() > 0)
                            <div class="row">
                                @foreach($targetKesekretariatan as $target)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100 border-primary">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                                     style="width: 50px; height: 50px; font-weight: bold;">
                                                    {{ $target->nomor_urut }}
                                                </div>
                                                <h5 class="mb-0">{{ $target->judul }}</h5>
                                            </div>
                                            <p class="mb-0" style="text-align: justify;">
                                                {{ $target->deskripsi }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info text-center">
                                <i class="bi bi-info-circle"></i> Belum ada target kerja untuk tahun {{ $tahun }}.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
