@extends('layouts.admin')
@section('title', 'Tambah Aset')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('aset.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Aset <span class="text-danger">*</span></label>
                    <input type="text" name="nama_aset" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="kategori" class="form-control" placeholder="Contoh: Elektronik" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nilai <span class="text-danger">*</span></label>
                    <input type="number" name="nilai" class="form-control" step="0.01" min="0" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kondisi <span class="text-danger">*</span></label>
                    <select name="kondisi" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Baik">Baik</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Rusak">Rusak</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Aset</label>
                <input type="file" name="foto[]" class="form-control" accept="image/*" multiple>
                <small class="text-muted">Bisa pilih multiple foto</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                <a href="{{ route('aset.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
