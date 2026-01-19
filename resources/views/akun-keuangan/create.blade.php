@extends('layouts.admin')
@section('title', 'Tambah Akun Keuangan')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('akun-keuangan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Akun <span class="text-danger">*</span></label>
                <input type="text" name="nama_akun" class="form-control @error('nama_akun') is-invalid @enderror" value="{{ old('nama_akun') }}" required>
                @error('nama_akun')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe <span class="text-danger">*</span></label>
                <select name="tipe" class="form-select @error('tipe') is-invalid @enderror" required>
                    <option value="">-- Pilih Tipe --</option>
                    <option value="pemasukan" {{ old('tipe') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="pengeluaran" {{ old('tipe') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
                @error('tipe')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                <a href="{{ route('akun-keuangan.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
