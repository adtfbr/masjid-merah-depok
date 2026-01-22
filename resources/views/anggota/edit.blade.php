@extends('layouts.admin')

@section('title', 'Edit Anggota')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Anggota</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('anggota.update', $anggotum) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Bidang <span class="text-danger">*</span></label>
                        <select name="bidang_id" class="form-select @error('bidang_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Bidang --</option>
                            @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" {{ old('bidang_id', $anggotum->bidang_id) == $bidang->id ? 'selected' : '' }}>
                                {{ $bidang->nama_bidang }}
                            </option>
                            @endforeach
                        </select>
                        @error('bidang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                               value="{{ old('nama', $anggotum->nama) }}" required>
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" 
                                       value="{{ old('jabatan', $anggotum->jabatan) }}" placeholder="Contoh: Ketua Bidang" required>
                                <small class="text-muted">Jika Ketua Bidang, tulis: "Ketua Bidang" atau "Koordinator"</small>
                                @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Seksi/Bagian</label>
                                <input type="text" name="seksi" class="form-control @error('seksi') is-invalid @enderror" 
                                       value="{{ old('seksi', $anggotum->seksi) }}" placeholder="Contoh: Seksi Ibadah">
                                <small class="text-muted">Kosongkan jika Ketua Bidang. Untuk anggota isi dengan nama seksi.</small>
                                @error('seksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">No HP</label>
                                <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" 
                                       value="{{ old('no_hp', $anggotum->no_hp) }}" placeholder="Contoh: 081234567890">
                                @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Urutan Tampil</label>
                                <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" 
                                       value="{{ old('urutan', $anggotum->urutan ?? 0) }}" min="0" placeholder="0">
                                <small class="text-muted">Angka lebih kecil tampil lebih dulu. Default: 0</small>
                                @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        @if($anggotum->foto)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $anggotum->foto) }}" class="rounded" style="max-width: 200px;">
                            <p class="text-muted mt-1"><small>Foto saat ini</small></p>
                        </div>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" 
                               accept="image/*" onchange="previewImage(event)">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                        @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2">
                            <img id="preview" src="" class="rounded" style="max-width: 200px; display: none;">
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <strong><i class="bi bi-info-circle"></i> Panduan Pengisian:</strong>
                        <ul class="mb-0 mt-2">
                            <li><strong>Ketua Bidang:</strong> Jabatan = "Ketua Bidang", Seksi = (kosongkan)</li>
                            <li><strong>Anggota Seksi:</strong> Jabatan = "Anggota", Seksi = "Seksi Ibadah" (atau nama seksi lain)</li>
                            <li><strong>Urutan:</strong> Ketua Bidang = 0, Anggota = 1,2,3... (atau sesuai urutan yang diinginkan)</li>
                        </ul>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update
                        </button>
                        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endpush
