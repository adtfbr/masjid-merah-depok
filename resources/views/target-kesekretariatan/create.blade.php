@extends('layouts.admin')

@section('title', 'Tambah Target Kesekretariatan')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Target Kesekretariatan</h1>
        <a href="{{ route('target-kesekretariatan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('target-kesekretariatan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="tahun">Tahun <span class="text-danger">*</span></label>
                    <input type="number" name="tahun" id="tahun" 
                           class="form-control @error('tahun') is-invalid @enderror" 
                           value="{{ old('tahun', date('Y')) }}" 
                           min="2020" max="2100" required>
                    @error('tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_urut">Nomor Urut <span class="text-danger">*</span></label>
                    <input type="number" name="nomor_urut" id="nomor_urut" 
                           class="form-control @error('nomor_urut') is-invalid @enderror" 
                           value="{{ old('nomor_urut', 1) }}" 
                           min="1" required>
                    @error('nomor_urut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="judul">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" 
                           class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('target-kesekretariatan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
