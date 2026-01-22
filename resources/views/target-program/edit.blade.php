@extends('layouts.admin')

@section('title', 'Edit Target Program')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Target Program</h1>
        <a href="{{ route('target-program.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('target-program.update', $targetProgram) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="bidang_id">Bidang <span class="text-danger">*</span></label>
                    <select name="bidang_id" id="bidang_id" 
                            class="form-control @error('bidang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Bidang --</option>
                        @foreach($bidangs as $bidang)
                            <option value="{{ $bidang->id }}" 
                                {{ old('bidang_id', $targetProgram->bidang_id) == $bidang->id ? 'selected' : '' }}>
                                {{ $bidang->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('bidang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_urut">Nomor Urut <span class="text-danger">*</span></label>
                    <input type="number" name="nomor_urut" id="nomor_urut" 
                           class="form-control @error('nomor_urut') is-invalid @enderror" 
                           value="{{ old('nomor_urut', $targetProgram->nomor_urut) }}" 
                           min="1" required>
                    @error('nomor_urut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="judul">Judul <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" 
                           class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul', $targetProgram->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              required>{{ old('deskripsi', $targetProgram->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('target-program.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
