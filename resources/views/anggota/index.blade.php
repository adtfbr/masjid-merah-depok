@extends('layouts.admin')

@section('title', 'Daftar Anggota')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-people"></i> Daftar Anggota</h5>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Anggota
        </a>
    </div>
    <div class="card-body">
        <!-- Filter -->
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-4">
                <select name="bidang_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Bidang</option>
                    @foreach($bidangs as $bidang)
                    <option value="{{ $bidang->id }}" {{ request('bidang_id') == $bidang->id ? 'selected' : '' }}>
                        {{ $bidang->nama_bidang }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Cari nama..." 
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Cari
                </button>
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        @if($anggotas->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="8%">Foto</th>
                        <th>Nama</th>
                        <th>Bidang</th>
                        <th>Jabatan</th>
                        <th>No HP</th>
                        <th width="12%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggotas as $anggota)
                    <tr>
                        <td>{{ $anggotas->firstItem() + $loop->index }}</td>
                        <td>
                            @if($anggota->foto)
                            <img src="{{ asset('storage/' . $anggota->foto) }}" 
                                 class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                            @else
                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                <i class="bi bi-person text-white"></i>
                            </div>
                            @endif
                        </td>
                        <td><strong>{{ $anggota->nama }}</strong></td>
                        <td><span class="badge bg-primary">{{ $anggota->bidang->nama_bidang }}</span></td>
                        <td><span class="badge bg-info">{{ $anggota->jabatan }}</span></td>
                        <td>{{ $anggota->no_hp ?: '-' }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('anggota.show', $anggota) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('anggota.edit', $anggota) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('anggota.destroy', $anggota) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $anggotas->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada data anggota</p>
            <a href="{{ route('anggota.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Anggota Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
