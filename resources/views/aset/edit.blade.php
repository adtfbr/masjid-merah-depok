@extends('layouts.admin')
@section('title', 'Edit Aset')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Aset</h1>
        <a href="{{ route('aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('aset.update', $aset) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Kategori Barang <span class="text-danger">*</span></label>
                    <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $aset->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                    @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label>Nama Aset <span class="text-danger">*</span></label>
                    <input type="text" name="nama_aset" class="form-control @error('nama_aset') is-invalid @enderror" value="{{ old('nama_aset', $aset->nama_aset) }}" required>
                    @error('nama_aset')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label>Kondisi <span class="text-danger">*</span></label>
                    <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" required>
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="Baik" {{ old('kondisi', $aset->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Cukup" {{ old('kondisi', $aset->kondisi) == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                        <option value="Rusak" {{ old('kondisi', $aset->kondisi) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                    @error('kondisi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
