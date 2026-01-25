@extends('layouts.admin')

@section('title', 'Target Program')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Target Program</h1>
        <a href="{{ route('target-program.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Target
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    <!-- Filter Bidang -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('target-program.index') }}" method="GET" class="form-inline">
                <label class="mr-2">Filter Bidang:</label>
                <select name="bidang_id" class="form-control mr-2" onchange="this.form.submit()">
                    <option value="">-- Semua Bidang --</option>
                    @foreach($bidangs as $bidang)
                        <option value="{{ $bidang->id }}" {{ $bidangId == $bidang->id ? 'selected' : '' }}>
                            {{ $bidang->nama_bidang }}
                        </option>
                    @endforeach
                </select>
                <a href="{{ route('target-program.index') }}" class="btn btn-secondary">Reset</a>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Target Program
                @if($bidangId)
                    - {{ $bidangs->find($bidangId)->nama_bidang ?? '' }}
                @endif
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Bidang</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($targets as $target)
                        <tr>
                            <td class="text-center">{{ $target->nomor_urut }}</td>
                            <td>{{ $target->bidang->nama_bidang }}</td>
                            <td>{{ $target->judul }}</td>
                            <td>{{ Str::limit($target->deskripsi, 100) }}</td>
                            <td>
                                <a href="{{ route('target-program.edit', $target) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('target-program.destroy', $target) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada target program
                                @if($bidangId)
                                    untuk bidang ini
                                @endif
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
