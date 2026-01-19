@extends('layouts.admin')
@section('title', 'Tambah Kegiatan')
@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Kegiatan</h5></div>
    <div class="card-body">
        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bidang <span class="text-danger">*</span></label>
                    <select name="bidang_id" class="form-select @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang --</option>
                        @foreach($bidangs as $bidang)
                        <option value="{{ $bidang->id }}" {{ old('bidang_id') == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                        @endforeach
                    </select>
                    @error('bidang_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan') }}" required>
                    @error('nama_kegiatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" required>
                    @error('lokasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Anggota yang Terlibat</label>
                <select name="anggota_ids[]" class="form-select" multiple size="5">
                    @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->id }}">{{ $anggota->nama }} ({{ $anggota->bidang->nama_bidang }})</option>
                    @endforeach
                </select>
                <small class="text-muted">Tahan Ctrl untuk pilih multiple</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Dokumentasi Foto</label>
                <input type="file" name="foto[]" class="form-control" accept="image/*" multiple>
                <small class="text-muted">Bisa pilih multiple foto</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
