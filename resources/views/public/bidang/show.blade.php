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
                        <div class="d-flex">
                            <div class="me-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                                     style="width: 40px; height: 40px; font-weight: bold; flex-shrink: 0;">
                                    {{ $pk->nomor_urut }}
                                </div>
                            </div>
                            <div>
                                <h6 class="mb-1">{{ $pk->judul }}</h6>
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
                        <div class="col-md-4">
                            <div class="card border-primary shadow-sm">
                                <div class="card-body text-center p-4">
                                    @if($ketuaBidang->foto)
                                        <img src="{{ Storage::url($ketuaBidang->foto) }}" 
                                             alt="{{ $ketuaBidang->nama }}"
                                             class="rounded-circle mb-3" 
                                             style="width: 140px; height: 140px; object-fit: cover; border: 5px solid var(--primary);">
                                    @else
                                        <div class="rounded-circle bg-secondary mx-auto mb-3" 
                                             style="width: 140px; height: 140px; display: flex; align-items: center; justify-content: center; border: 5px solid var(--primary);">
                                            <i class="bi bi-person-fill text-white" style="font-size: 4rem;"></i>
                                        </div>
                                    @endif
                                    <h4 class="mb-1 fw-bold text-primary">{{ $ketuaBidang->nama }}</h4>
                                    <p class="text-muted mb-2"><strong>{{ $ketuaBidang->jabatan }}</strong></p>
                                    @if($ketuaBidang->no_hp)
                                        <p class="mb-0">
                                            <i class="bi bi-telephone"></i> {{ $ketuaBidang->no_hp }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Anggota Per Seksi -->
                    @if($anggotaBySeksi->count() > 0)
                        @foreach($anggotaBySeksi as $namaSeksi => $anggotaSeksi)
                        <div class="mb-5">
                            <h5 class="mb-3 text-primary">
                                <i class="bi bi-diagram-2"></i> {{ $namaSeksi }}
                            </h5>
                            <div class="row">
                                @foreach($anggotaSeksi as $anggota)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card border-secondary shadow-sm h-100">
                                        <div class="card-body text-center">
                                            @if($anggota->foto)
                                                <img src="{{ Storage::url($anggota->foto) }}" 
                                                     alt="{{ $anggota->nama }}"
                                                     class="rounded-circle mb-3" 
                                                     style="width: 100px; height: 100px; object-fit: cover; border: 4px solid var(--secondary);">
                                            @else
                                                <div class="rounded-circle bg-secondary mx-auto mb-3" 
                                                     style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; border: 4px solid var(--secondary);">
                                                    <i class="bi bi-person-fill text-white" style="font-size: 3rem;"></i>
                                                </div>
                                            @endif
                                            <h6 class="mb-1">{{ $anggota->nama }}</h6>
                                            <p class="text-muted mb-2" style="font-size: 0.9rem;">
                                                <strong>{{ $anggota->jabatan }}</strong>
                                            </p>
                                            @if($anggota->no_hp)
                                                <p class="mb-0" style="font-size: 0.85rem;">
                                                    <i class="bi bi-telephone"></i> {{ $anggota->no_hp }}
                                                </p>
                                            @endif
                                        </div>
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
