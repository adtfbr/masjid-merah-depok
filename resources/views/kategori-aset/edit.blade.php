@extends('layouts.admin')
@section('title', 'Edit Kategori Aset')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Kategori Aset</h1>
        <a href="{{ route('kategori-aset.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori-aset.update', $kategoriAset) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori', $kategoriAset->nama_kategori) }}" required>
                    @error('nama_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label>Foto Kategori</label>
                    @if($kategoriAset->foto)
                    <div class="mb-2"><img src="{{ $kategoriAset->foto_url }}" style="max-width: 200px;" class="img-thumbnail"></div>
                    @endif
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                    @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
