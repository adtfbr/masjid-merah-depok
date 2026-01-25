@extends('layouts.public')

@section('title', $bidang->nama_bidang)

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">{{ $bidang->nama_bidang }}</h1>
                <p class="lead text-white-50">Manajemen Bidang - Masjid Merah Baiturrahman</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <!-- Header: Penjelasan Bidang -->
        <div class="card card-modern mb-5">
            <div class="card-header" style="background: var(--primary); color: white;">
                <h4 class="mb-0"><i class="bi bi-info-circle"></i> Tentang {{ $bidang->nama_bidang }}</h4>
            </div>
            <div class="card-body p-4">
                @if($bidang->deskripsi)
                    <p style="text-align: justify;">{{ $bidang->deskripsi }}</p>
                @else
                    <p style="text-align: justify;">
                        {{ $bidang->nama_bidang }} merupakan salah satu bidang dalam struktur organisasi 
                        Masjid Merah Baiturrahman yang memiliki peran penting dalam menjalankan program kerja 
                        sesuai dengan cakupan tugasnya.
                    </p>
                @endif
            </div>
        </div>

        <!-- Cakupan Dynamic -->
        @if($programKerja->count() > 0)
        <div class="card card-modern mb-5">
            <div class="card-header" style="background: var(--primary); color: white;">
                <h4 class="mb-0"><i class="bi bi-list-check"></i> Cakupan</h4>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    @foreach($programKerja as $pk)
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0 me-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                                     style="min-width: 48px; width: 48px; height: 48px; font-weight: bold; font-size: 1.25rem;">
                                    {{ $pk->nomor_urut }}
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-2">{{ $pk->judul }}</h6>
                                @if($pk->deskripsi)
                                    <p class="text-muted mb-0" style="font-size: 0.9rem; text-align: justify;">{{ $pk->deskripsi }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Target Program (jika ada) -->
        @if($targetProgram->count() > 0)
        <div class="card card-modern mb-5">
            <div class="card-header" style="background: var(--secondary); color: white;">
                <h4 class="mb-0"><i class="bi bi-bullseye"></i> Target Program</h4>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    @foreach($targetProgram as $target)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-secondary shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-start mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" 
                                             style="min-width: 48px; width: 48px; height: 48px; font-weight: bold; font-size: 1.25rem;">
                                            {{ $target->nomor_urut }}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">{{ $target->judul }}</h5>
                                    </div>
                                </div>
                                <p class="mb-0 ms-0" style="text-align: justify;">
                                    {{ $target->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- PROFIL ANGGOTA BIDANG -->
        <div class="card card-modern">
            <div class="card-header" style="background: var(--secondary); color: white text-center;">
                <h4 class="mb-0"><i class="bi bi-people"></i> Anggota {{ $bidang->nama_bidang }}</h4>
            </div>
            <div class="card-body p-4">
                @if($ketuaBidang || $anggotaBySeksi->count() > 0)
                    <!-- Ketua Bidang (Posisi Atas - Lebih Besar) -->
                    @if($ketuaBidang)
                    <div class="row justify-content-center mb-5">
                        <div class="col-auto">
                            <div class="bagan-card">
                                @if($ketuaBidang->foto)
                                    <img src="{{ Storage::url($ketuaBidang->foto) }}" alt="{{ $ketuaBidang->nama }}">
                                @else
                                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='260' height='260' viewBox='0 0 260 260'%3E%3Crect fill='%23667eea' width='260' height='260'/%3E%3Cg fill='%23ffffff' opacity='0.8'%3E%3Ccircle cx='130' cy='100' r='40'/%3E%3Cpath d='M80 200 Q80 140 130 140 Q180 140 180 200 Z'/%3E%3C/g%3E%3C/svg%3E" alt="{{ $ketuaBidang->nama }}">
                                @endif
                                <div class="bagan-label">
                                    <h5>{{ $ketuaBidang->nama }}</h5>
                                    <p>{{ $ketuaBidang->jabatan }}</p>
                                </div>
                                @if($ketuaBidang->no_hp)
                                    <small class="text-muted d-block mt-2">
                                        <i class="bi bi-telephone"></i> {{ $ketuaBidang->no_hp }}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Anggota Per Seksi -->
                    @if($anggotaBySeksi->count() > 0)
                        @foreach($anggotaBySeksi as $namaSeksi => $anggotaSeksi)
                        <div class="mb-5">
                            <h5 class="mb-4 text-center text-primary">
                                <i class="bi bi-diagram-2"></i> {{ $namaSeksi }}
                            </h5>
                            <div class="row justify-content-center gap-4">
                                @foreach($anggotaSeksi as $anggota)
                                <div class="col-auto">
                                    <div class="bagan-card">
                                        @if($anggota->foto)
                                            <img src="{{ Storage::url($anggota->foto) }}" alt="{{ $anggota->nama }}">
                                        @else
                                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='260' height='260' viewBox='0 0 260 260'%3E%3Crect fill='%23667eea' width='260' height='260'/%3E%3Cg fill='%23ffffff' opacity='0.8'%3E%3Ccircle cx='130' cy='100' r='40'/%3E%3Cpath d='M80 200 Q80 140 130 140 Q180 140 180 200 Z'/%3E%3C/g%3E%3C/svg%3E" alt="{{ $anggota->nama }}">
                                        @endif
                                        <div class="bagan-label">
                                            <h5>{{ $anggota->nama }}</h5>
                                            <p>{{ $anggota->jabatan }}</p>
                                        </div>
                                        @if($anggota->no_hp)
                                            <small class="text-muted d-block mt-2">
                                                <i class="bi bi-telephone"></i> {{ $anggota->no_hp }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    @endif
                @else
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> Belum ada anggota terdaftar untuk bidang ini.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
