@extends('layouts.admin')

@section('title', 'Gambar Struktur Organisasi')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gambar Struktur Organisasi</h1>
        <a href="{{ route('struktur-gambar.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Upload Gambar
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

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Gambar</th>
                            <th width="100">Status</th>
                            <th width="150">Tanggal Upload</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gambars as $index => $gambar)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{ $gambar->gambar_url }}" target="_blank">
                                    <img src="{{ $gambar->gambar_url }}" alt="Struktur" 
                                         class="img-thumbnail" style="max-width: 200px;">
                                </a>
                            </td>
                            <td>
                                @if($gambar->aktif)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>{{ $gambar->created_at->format('d M Y H:i') }}</td>
                            <td>
                                @if(!$gambar->aktif)
                                <form action="{{ route('struktur-gambar.set-active', $gambar) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success" 
                                            onclick="return confirm('Set sebagai gambar aktif?')">
                                        <i class="fas fa-check"></i> Aktifkan
                                    </button>
                                </form>
                                @endif
                                
                                <form action="{{ route('struktur-gambar.destroy', $gambar) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada gambar struktur</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($gambars->count() > 0)
            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle"></i> 
                <strong>Info:</strong> Hanya satu gambar yang bisa aktif. Gambar aktif akan ditampilkan di halaman publik Struktur Organisasi.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
