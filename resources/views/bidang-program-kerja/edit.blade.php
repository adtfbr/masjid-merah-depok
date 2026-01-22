@extends('layouts.admin')

@section('title', 'Edit Program Kerja Bidang')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Program Kerja Bidang</h1>
        <a href="{{ route('bidang-program-kerja.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('bidang-program-kerja.update', $bidangProgramKerja) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="bidang_id">Bidang <span class="text-danger">*</span></label>
                    <select name="bidang_id" id="bidang_id" 
                            class="form-control @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang --</option>
                        @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" 
                                {{ old('bidang_id', $bidangProgramKerja->bidang_id) == $bidang->id ? 'selected' : '' }}>
                                {{ $bidang->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('bidang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="judul">Judul Program Kerja <span class="text-danger">*</span></label>
                    <textarea name="judul" id="judul" rows="3"
                              class="form-control @error('judul') is-invalid @enderror" 
                              required>{{ old('judul', $bidangProgramKerja->judul) }}</textarea>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="urutan">Urutan <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" id="urutan" 
                           class="form-control @error('urutan') is-invalid @enderror" 
                           value="{{ old('urutan', $bidangProgramKerja->urutan) }}" min="0" required>
                    <small class="form-text text-muted">Urutan tampilan (semakin kecil semakin atas)</small>
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('bidang-program-kerja.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
