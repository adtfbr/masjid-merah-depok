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
                    
                    <div class="mb-3">
                        <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" 
                               value="{{ old('jabatan', $anggotum->jabatan) }}" required>
                        @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" 
                               value="{{ old('no_hp', $anggotum->no_hp) }}">
                        @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
