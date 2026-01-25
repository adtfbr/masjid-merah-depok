@extends('layouts.admin')

@section('title', 'Edit Bidang')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-pencil"></i> Edit Bidang</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('bidang.update', $bidang) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Bidang <span class="text-danger">*</span></label>
                        <input type="text" name="nama_bidang" class="form-control @error('nama_bidang') is-invalid @enderror" 
                               value="{{ old('nama_bidang', $bidang->nama_bidang) }}" required>
                        @error('nama_bidang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                                  rows="4">{{ old('deskripsi', $bidang->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update
                        </button>
                        <a href="{{ route('bidang.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Quick Links -->
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-link-45deg"></i> Kelola Konten Bidang</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{ route('bidang-program-kerja.index', ['bidang_id' => $bidang->id]) }}" class="btn btn-outline-primary">
                                <i class="bi bi-list-check"></i> Program Kerja Bidang
                                <span class="badge bg-primary ms-2">{{ $bidang->programKerja->count() }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-grid">
                            <a href="{{ route('target-program.index', ['bidang_id' => $bidang->id]) }}" class="btn btn-outline-success">
                                <i class="bi bi-bullseye"></i> Target Program
                                <span class="badge bg-success ms-2">{{ $bidang->targetProgram->count() }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
