@extends('layouts.public')

@section('title', $kategori->nama_kategori)

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">{{ $kategori->nama_kategori }}</h1>
                <p class="lead text-white-50">Daftar Aset Kategori {{ $kategori->nama_kategori }}</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('public.aset') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Kategori
            </a>
        </div>

        @if($kategori->aset->count() > 0)
        <div class="card card-modern">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Aset</th>
                                <th width="15%" class="text-center">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori->aset as $index => $aset)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $aset->nama_aset }}</td>
                                <td class="text-center">
                                    @if($aset->kondisi == 'Baik')
                                        <span class="badge bg-success">Baik</span>
                                    @elseif($aset->kondisi == 'Cukup')
                                        <span class="badge bg-warning">Cukup</span>
                                    @else
                                        <span class="badge bg-danger">Rusak</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Belum ada aset dalam kategori ini.
        </div>
        @endif
    </div>
</div>
@endsection
