@extends('layouts.admin')

@section('title', 'Edit Aset')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="bi bi-pencil"></i> Edit Aset: {{ $aset->nama_aset }}
        </h5>
    </div>

    <div class="card-body">

        {{-- ALERT --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- ================= FORM UPDATE ================= --}}
        <form id="formEditAset"
              action="{{ route('aset.update', $aset->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Aset</label>
                    <input type="text" name="nama_aset" class="form-control"
                           value="{{ old('nama_aset', $aset->nama_aset) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                           value="{{ old('kategori', $aset->kategori) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nilai (Rp)</label>
                    <input type="number" name="nilai" class="form-control"
                           value="{{ old('nilai', $aset->nilai) }}"
                           step="0.01" min="0" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Kondisi</label>
                    <select name="kondisi" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        @foreach (['Baik', 'Cukup', 'Rusak'] as $k)
                            <option value="{{ $k }}"
                                {{ old('kondisi', $aset->kondisi) === $k ? 'selected' : '' }}>
                                {{ $k }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control"
                           value="{{ old('lokasi', $aset->lokasi) }}" required>
                </div>
            </div>

            <hr>

            <div class="mb-3">
                <label class="form-label fw-bold">Upload Foto Baru (Opsional)</label>
                <input type="file" name="foto[]" class="form-control" multiple
                       accept="image/jpeg,image/png,image/jpg">
                <small class="text-muted">Maks 2MB per file</small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" id="btnSubmit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update Aset
                </button>
                <a href="{{ route('aset.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>
        </form>

        {{-- ================= FOTO ================= --}}
        <hr>

        <h6 class="fw-bold">Foto Saat Ini</h6>

        @if ($aset->foto->count())
            <div class="row g-3 mt-2">
                @foreach ($aset->foto as $foto)
                    <div class="col-md-2 col-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $foto->foto) }}"
                                 class="card-img-top"
                                 style="height:120px;object-fit:cover">

                            <div class="card-body p-2">
                                <form action="{{ route('aset.foto.delete', $foto->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus foto ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm w-100">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">Belum ada foto.</p>
        @endif

    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('formEditAset').addEventListener('submit', function () {
    const btn = document.getElementById('btnSubmit');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
});
</script>
@endpush
