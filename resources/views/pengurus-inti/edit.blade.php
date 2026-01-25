@extends('layouts.admin')

@section('title', 'Edit Dewan Pengurus Harian')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Dewan Pengurus Harian</h1>
        <a href="{{ route('pengurus-inti.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pengurus-inti.update', $pengurusInti) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="tipe">Tipe Pengurus <span class="text-danger">*</span></label>
                    <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="ketua" {{ old('tipe', $pengurusInti->tipe) == 'ketua' ? 'selected' : '' }}>Ketua</option>
                        <option value="sekretaris" {{ old('tipe', $pengurusInti->tipe) == 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                        <option value="bendahara" {{ old('tipe', $pengurusInti->tipe) == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                    </select>
                    @error('tipe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="nama" 
                           class="form-control @error('nama') is-invalid @enderror" 
                           value="{{ old('nama', $pengurusInti->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    @if($pengurusInti->foto)
                        <div class="mb-2">
                            <img src="{{ $pengurusInti->foto_url }}" alt="{{ $pengurusInti->nama }}" 
                                 class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                            <p class="text-muted small mt-1">Foto saat ini</p>
                        </div>
                    @endif
                    <input type="file" name="foto" id="foto" 
                           class="form-control-file @error('foto') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg">
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Biarkan kosong jika tidak ingin mengubah foto.</small>
                    @error('foto')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="text" name="kontak" id="kontak" 
                           class="form-control @error('kontak') is-invalid @enderror" 
                           value="{{ old('kontak', $pengurusInti->kontak) }}"
                           placeholder="Contoh: 081234567890">
                    @error('kontak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="urutan">Urutan <span class="text-danger">*</span></label>
                    <input type="number" name="urutan" id="urutan" 
                           class="form-control @error('urutan') is-invalid @enderror" 
                           value="{{ old('urutan', $pengurusInti->urutan) }}" min="0" required>
                    <small class="form-text text-muted">Urutan tampilan (semakin kecil semakin atas)</small>
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
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
