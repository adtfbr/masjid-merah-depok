@extends('layouts.public')

@section('title', 'Struktur Organisasi')

@section('content')
<!-- Hero -->
<div class="hero-section" style="padding: 60px 0;">
    <div class="container text-center">
        <h1><i class="bi bi-diagram-3"></i> Struktur Organisasi</h1>
        <p>Pengurus Masjid yang Amanah dan Profesional</p>
    </div>
</div>

<!-- Organisasi -->
<section class="section">
    <div class="container">
        @forelse($bidangs as $bidang)
        <div class="card card-modern mb-4">
            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <h4 class="mb-0"><i class="bi bi-diagram-3"></i> {{ $bidang->nama_bidang }}</h4>
                @if($bidang->deskripsi)
                <p class="mb-0 mt-2" style="opacity: 0.9;">{{ $bidang->deskripsi }}</p>
                @endif
            </div>
            <div class="card-body">
                @if($bidang->anggota->count() > 0)
                <div class="row g-4">
                    @foreach($bidang->anggota as $anggota)
                    <div class="col-md-3 col-sm-6">
                        <div class="text-center">
                            @if($anggota->foto)
                            <img src="{{ asset('storage/' . $anggota->foto) }}" class="rounded-circle mb-3" 
                                 width="100" height="100" style="object-fit: cover; border: 3px solid #667eea;">
                            @else
                            <div class="rounded-circle bg-secondary d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 100px; height: 100px; border: 3px solid #667eea;">
                                <i class="bi bi-person text-white" style="font-size: 2.5rem;"></i>
                            </div>
                            @endif
                            <h6 class="fw-bold">{{ $anggota->nama }}</h6>
                            <span class="badge bg-primary">{{ $anggota->jabatan }}</span>
                            @if($anggota->no_hp)
                            <p class="text-muted mb-0 mt-2"><small><i class="bi bi-telephone"></i> {{ $anggota->no_hp }}</small></p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted text-center mb-0">Belum ada pengurus di bidang ini</p>
                @endif
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="bi bi-diagram-3 text-muted" style="font-size: 5rem;"></i>
            <p class="text-muted mt-3">Belum ada struktur organisasi</p>
        </div>
        @endforelse
    </div>
</section>
@endsection
