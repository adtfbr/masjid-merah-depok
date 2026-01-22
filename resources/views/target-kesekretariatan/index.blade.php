@extends('layouts.admin')

@section('title', 'Target Kesekretariatan')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Target Kesekretariatan</h1>
        <a href="{{ route('target-kesekretariatan.create') }}" class="btn btn-primary">
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

    <!-- Filter Tahun -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('target-kesekretariatan.index') }}" method="GET" class="form-inline">
                <label class="mr-2">Filter Tahun:</label>
                <select name="tahun" class="form-control mr-2" onchange="this.form.submit()">
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ $tahun == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                    @if($years->count() == 0 || !$years->contains(date('Y')))
                        <option value="{{ date('Y') }}" selected>{{ date('Y') }}</option>
                    @endif
                </select>
                <a href="{{ route('target-kesekretariatan.index') }}" class="btn btn-secondary">Reset</a>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Target Kerja Tahun {{ $tahun }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($targets as $target)
                        <tr>
                            <td>{{ $target->nomor_urut }}</td>
                            <td>{{ $target->judul }}</td>
                            <td>{{ Str::limit($target->deskripsi, 100) }}</td>
                            <td>
                                <a href="{{ route('target-kesekretariatan.edit', $target) }}" 
                                   class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('target-kesekretariatan.destroy', $target) }}" 
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
                            <td colspan="4" class="text-center text-muted">
                                Belum ada target kesekretariatan untuk tahun {{ $tahun }}
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
