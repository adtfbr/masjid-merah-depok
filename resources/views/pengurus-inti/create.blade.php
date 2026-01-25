@extends('layouts.admin')

@section('title', 'Tambah Dewan Pengurus Harian')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Dewan Pengurus Harian</h1>
        <a href="{{ route('pengurus-inti.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pengurus-inti.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="tipe">Tipe Pengurus <span class="text-danger">*</span></label>
                    <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="ketua" {{ old('tipe') == 'ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="sekretaris" {{ old('tipe') == 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                        <option value="bendahara" {{ old('tipe') == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                    </select>
                    @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="nama" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" 
                           class="form-control-file @error('foto') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg">
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                    @error('foto')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="text" name="kontak" id="kontak" 
                           class="form-control @error('kontak') is-invalid @enderror" 
                           value="{{ old('kontak') }}"
                           placeholder="Contoh: 081234567890">
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="urutan">Urutan <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" id="urutan" 
                           class="form-control @error('urutan') is-invalid @enderror" 
                           value="{{ old('urutan', 0) }}" min="0" required>
                    <small class="form-text text-muted">Urutan tampilan (semakin kecil semakin atas)</small>
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('pengurus-inti.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
