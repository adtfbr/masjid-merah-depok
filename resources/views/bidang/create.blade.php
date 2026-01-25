@extends('layouts.admin')

@section('title', 'Tambah Bidang')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Bidang Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('bidang.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Bidang <span class="text-danger">*</span></label>
                        <input type="text" name="nama_bidang" class="form-control @error('nama_bidang') is-invalid @enderror" 
                               value="{{ old('nama_bidang') }}" placeholder="Contoh: Bidang Kesejahteraan" required>
                        @error('nama_bidang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                                  rows="4" placeholder="Deskripsi singkat tentang bidang ini...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="bi bi-info-circle"></i> Setelah bidang dibuat, Anda dapat menambahkan Program Kerja dan Target Program melalui menu di sidebar.
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                        <a href="{{ route('bidang.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Info Box -->
        <div class="alert alert-info mt-3">
            <h6 class="alert-heading"><i class="bi bi-lightbulb"></i> Langkah Selanjutnya</h6>
            <p class="mb-0">Setelah membuat bidang, Anda dapat:</p>
            <ul class="mb-0 mt-2">
                <li>Menambahkan <strong>Program Kerja Bidang</strong> melalui menu <i class="bi bi-arrow-right"></i> <strong>Program Kerja Bidang</strong></li>
                <li>Menambahkan <strong>Target Program</strong> melalui menu <i class="bi bi-arrow-right"></i> <strong>Target Program</strong></li>
            </ul>
        </div>
    </div>
</div>
@endsection
