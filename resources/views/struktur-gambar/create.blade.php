@extends('layouts.admin')

@section('title', 'Upload Gambar Struktur')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Upload Gambar Struktur</h1>
        <a href="{{ route('struktur-gambar.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('struktur-gambar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="gambar">Gambar Struktur <span class="text-danger">*</span></label>
                    <input type="file" name="gambar" id="gambar" 
                           class="form-control-file @error('gambar') is-invalid @enderror" 
                           accept="image/jpeg,image/png,image/jpg" required>
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 5MB. Disarankan ukuran landscape (1920x1080 atau sejenisnya).</small>
                    @error('gambar')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="aktif" name="aktif" value="1" 
                               {{ old('aktif') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="aktif">
                            Set sebagai gambar aktif
                        </label>
                    </div>
                    <small class="form-text text-muted">
                        Jika dicentang, gambar ini akan langsung aktif dan gambar aktif sebelumnya akan dinonaktifkan.
                    </small>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload"></i> Upload
                    </button>
                    <a href="{{ route('struktur-gambar.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview image before upload
    document.getElementById('gambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.className = 'img-thumbnail mt-3';
                preview.style.maxWidth = '100%';
                preview.style.maxHeight = '400px';
                
                const existingPreview = document.querySelector('.image-preview');
                if (existingPreview) {
                    existingPreview.remove();
                }
                
                const container = document.createElement('div');
                container.className = 'image-preview';
                container.appendChild(preview);
                document.querySelector('form').insertBefore(container, document.querySelector('form').lastElementChild);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
