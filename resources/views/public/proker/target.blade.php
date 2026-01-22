@extends('layouts.public')

@section('title', 'Target Program')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Target Program Masjid</h1>
                <p class="lead text-white-50">Rencana Strategis Jangka Panjang</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Intro -->
                <div class="card card-modern mb-4" style="background: linear-gradient(135deg, var(--primary) 0%, #8B2332 100%);">
                    <div class="card-body p-4 text-white text-center">
                        <h4 class="mb-3">Target Program Strategis Masjid Merah Baiturrahman</h4>
                        <p class="mb-0" style="font-size: 1.1rem;">
                            Berikut adalah target-target strategis yang akan dicapai oleh Masjid Merah Baiturrahman 
                            untuk mewujudkan visi menjadi pusat kegiatan keagamaan, pendidikan, dan pemberdayaan masyarakat.
                        </p>
                    </div>
                </div>

                @if($bidangs->count() > 0)
                    @foreach($bidangs as $bidang)
                        @if($bidang->targetProgram->count() > 0)
                        <!-- Target per Bidang -->
                        <div class="card card-modern mb-4">
                            <div class="card-header" style="background: var(--secondary); color: white;">
                                <h5 class="mb-0">
                                    <i class="bi bi-bullseye"></i> {{ $bidang->nama_bidang }}
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    @foreach($bidang->targetProgram as $target)
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
                    @endforeach
                @else
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> Target program belum tersedia. Silakan hubungi admin untuk informasi lebih lanjut.
                    </div>
                @endif

                <!-- Call to Action -->
                <div class="card card-modern" style="background: var(--accent);">
                    <div class="card-body p-4 text-center">
                        <h5 class="mb-3">Mari Bersama Mewujudkan Target Ini</h5>
                        <p class="text-muted mb-4">
                            Dukungan dan partisipasi aktif dari seluruh jamaah sangat diharapkan untuk mencapai 
                            target-target mulia ini. Bersama kita membangun masjid yang lebih baik.
                        </p>
                        <a href="{{ route('public.kontak') }}" class="btn btn-primary-custom">
                            <i class="bi bi-envelope"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
