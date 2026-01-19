@extends('layouts.admin')
@section('title', 'Daftar Kegiatan')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="bi bi-calendar-event"></i> Daftar Kegiatan</h5>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Tambah Kegiatan</a>
    </div>
    <div class="card-body">
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <select name="bidang_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Bidang</option>
                    @foreach($bidangs as $bidang)
                    <option value="{{ $bidang->id }}" {{ request('bidang_id') == $bidang->id ? 'selected' : '' }}>{{ $bidang->nama_bidang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                </select>
            </div>
        </form>

        @if($kegiatans->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Bidang</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatans as $kegiatan)
                    <tr>
                        <td>{{ $kegiatans->firstItem() + $loop->index }}</td>
                        <td><strong>{{ $kegiatan->nama_kegiatan }}</strong></td>
                        <td><span class="badge bg-primary">{{ $kegiatan->bidang->nama_bidang }}</span></td>
                        <td><small>{{ formatTanggal($kegiatan->tanggal_mulai) }}</small></td>
                        <td><small>{{ $kegiatan->lokasi }}</small></td>
                        <td>{!! statusBadge($kegiatan->status) !!}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('kegiatan.show', $kegiatan) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('kegiatan.edit', $kegiatan) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('kegiatan.destroy', $kegiatan) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $kegiatans->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-calendar-x text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada kegiatan</p>
        </div>
        @endif
    </div>
</div>
@endsection
