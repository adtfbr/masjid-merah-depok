@extends('layouts.admin')
@section('title', 'Edit Kegiatan')
@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Kegiatan</h5></div>
    <div class="card-body">
        <form action="{{ route('kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bidang <span class="text-danger">*</span></label>
                    <select name="bidang_id" class="form-select" required>
                        @foreach($bidangs as $bidang)
                        <option value="{{ $bidang->id }}" {{ old('bidang_id', $kegiatan->bidang_id) == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $kegiatan->tanggal_mulai->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $kegiatan->tanggal_selesai?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $kegiatan->lokasi) }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Anggota yang Terlibat</label>
                <select name="anggota_ids[]" class="form-select" multiple size="5">
                    @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->id }}" {{ $kegiatan->anggota->contains($anggota->id) ? 'selected' : '' }}>{{ $anggota->nama }} ({{ $anggota->bidang->nama_bidang }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Saat Ini</label>
                @if($kegiatan->foto->count() > 0)
                <div class="row g-2 mb-2">
                    @foreach($kegiatan->foto as $foto)
                    <div class="col-md-2">
                        <img src="{{ asset('storage/' . $foto->foto) }}" class="img-thumbnail">
                        <form action="{{ route('kegiatan.foto.delete', $foto->id) }}" method="POST" class="mt-1" onsubmit="return confirm('Hapus foto ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100">Hapus</button>
                        </form>
                    </div>
                    @endforeach
                </div>
                @endif
                <input type="file" name="foto[]" class="form-control" accept="image/*" multiple>
                <small class="text-muted">Upload foto baru</small>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
