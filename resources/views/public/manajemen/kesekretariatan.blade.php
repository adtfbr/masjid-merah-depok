@extends('layouts.public')

@section('title', 'Kesekretariatan')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Kesekretariatan</h1>
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
                <h4 class="mb-0"><i class="bi bi-people"></i> Pengurus Kesekretariatan</h4>
            </div>
            <div class="card-body p-4">
                @if($ketua || $sekretaris || $bendahara)
                    <!-- Ketua (Posisi Atas - Lebih Besar) -->
                    @if($ketua)
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">
                            <div class="card border-primary shadow-sm">
                                <div class="card-body text-center p-4">
                                    @if($ketua->foto)
                                        <img src="{{ $ketua->foto_url }}" 
                                             alt="{{ $ketua->nama }}"
                                             class="rounded-circle mb-3" 
                                             style="width: 140px; height: 140px; object-fit: cover; border: 5px solid var(--primary);">
                                    @else
                                        <div class="rounded-circle bg-secondary mx-auto mb-3" 
                                             style="width: 140px; height: 140px; display: flex; align-items: center; justify-content: center; border: 5px solid var(--primary);">
                                            <i class="bi bi-person-fill text-white" style="font-size: 4rem;"></i>
                                        </div>
                                    @endif
                                    <h4 class="mb-1 fw-bold text-primary">{{ $ketua->nama }}</h4>
                                    <p class="text-muted mb-2"><strong>{{ $ketua->tipe_label }}</strong></p>
                                    @if($ketua->kontak)
                                        <p class="mb-0">
                                            <i class="bi bi-telephone"></i> {{ $ketua->kontak }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Sekretaris & Bendahara (Posisi Bawah) -->
                    <div class="row justify-content-center">
                        @if($sekretaris)
                        <div class="col-md-4 mb-3">
                            <div class="card border-secondary shadow-sm h-100">
                                <div class="card-body text-center">
                                    @if($sekretaris->foto)
                                        <img src="{{ $sekretaris->foto_url }}" 
                                             alt="{{ $sekretaris->nama }}"
                                             class="rounded-circle mb-3" 
                                             style="width: 100px; height: 100px; object-fit: cover; border: 4px solid var(--secondary);">
                                    @else
                                        <div class="rounded-circle bg-secondary mx-auto mb-3" 
                                             style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; border: 4px solid var(--secondary);">
                                            <i class="bi bi-person-fill text-white" style="font-size: 3rem;"></i>
                                        </div>
                                    @endif
                                    <h5 class="mb-1">{{ $sekretaris->nama }}</h5>
                                    <p class="text-muted mb-2"><strong>{{ $sekretaris->tipe_label }}</strong></p>
                                    @if($sekretaris->kontak)
                                        <p class="mb-0" style="font-size: 0.9rem;">
                                            <i class="bi bi-telephone"></i> {{ $sekretaris->kontak }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($bendahara)
                        <div class="col-md-4 mb-3">
                            <div class="card border-secondary shadow-sm h-100">
                                <div class="card-body text-center">
                                    @if($bendahara->foto)
                                        <img src="{{ $bendahara->foto_url }}" 
                                             alt="{{ $bendahara->nama }}"
                                             class="rounded-circle mb-3" 
                                             style="width: 100px; height: 100px; object-fit: cover; border: 4px solid var(--secondary);">
                                    @else
                                        <div class="rounded-circle bg-secondary mx-auto mb-3" 
                                             style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; border: 4px solid var(--secondary);">
                                            <i class="bi bi-person-fill text-white" style="font-size: 3rem;"></i>
                                        </div>
                                    @endif
                                    <h5 class="mb-1">{{ $bendahara->nama }}</h5>
                                    <p class="text-muted mb-2"><strong>{{ $bendahara->tipe_label }}</strong></p>
                                    @if($bendahara->kontak)
                                        <p class="mb-0" style="font-size: 0.9rem;">
                                            <i class="bi bi-telephone"></i> {{ $bendahara->kontak }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> Data pengurus kesekretariatan belum tersedia.
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Fungsi Kesekretariatan -->
                <div class="card card-modern mb-4">
                    <div class="card-header" style="background: var(--primary); color: white;">
                        <h4 class="mb-0"><i class="bi bi-building"></i> Fungsi Kesekretariatan</h4>
                    </div>
                    <div class="card-body p-4">
                        <p style="text-align: justify;">
                            Kesekretariatan Masjid Merah Baiturrahman merupakan unit manajemen utama yang bertugas 
                            mengelola administrasi, koordinasi antar bidang, serta dokumentasi seluruh kegiatan masjid. 
                            Kesekretariatan menjadi tulang punggung operasional yang memastikan seluruh program dan 
                            kegiatan berjalan dengan baik dan terkoordinir.
                        </p>
                        
                        <h5 class="mt-4 mb-3">Tugas Pokok:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Mengelola administrasi dan surat menyurat masjid</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Mengkoordinasikan seluruh kegiatan antar bidang</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Mendokumentasikan dan mengarsipkan seluruh kegiatan</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Mengelola data dan informasi masjid</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Menyusun laporan berkala kepada pengurus dan jamaah</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-primary"></i> Memfasilitasi rapat dan pertemuan pengurus</li>
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
