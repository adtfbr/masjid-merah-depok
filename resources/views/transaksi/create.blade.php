@extends('layouts.admin')
@section('title', 'Tambah Transaksi')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Akun <span class="text-danger">*</span></label>
                    <select name="akun_id" class="form-select" required>
                        <option value="">-- Pilih Akun --</option>
                        @foreach($akuns as $akun)
                        <option value="{{ $akun->id }}">{{ $akun->nama_akun }} ({{ ucfirst($akun->tipe) }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jumlah <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah" class="form-control" step="0.01" min="0" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3"></textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
