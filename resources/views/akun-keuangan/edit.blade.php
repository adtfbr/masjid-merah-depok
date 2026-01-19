@extends('layouts.admin')
@section('title', 'Edit Akun Keuangan')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('akun-keuangan.update', $akunKeuangan) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Akun <span class="text-danger">*</span></label>
                <input type="text" name="nama_akun" class="form-control" value="{{ old('nama_akun', $akunKeuangan->nama_akun) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe <span class="text-danger">*</span></label>
                <select name="tipe" class="form-select" required>
                    <option value="pemasukan" {{ old('tipe', $akunKeuangan->tipe) == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="pengeluaran" {{ old('tipe', $akunKeuangan->tipe) == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
                <a href="{{ route('akun-keuangan.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
