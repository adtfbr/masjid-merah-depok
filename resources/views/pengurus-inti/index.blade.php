@extends('layouts.admin')

@section('title', 'Pengurus Inti')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengurus Inti</h1>
        <a href="{{ route('pengurus-inti.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengurus
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

    <!-- Dewan Pembina -->
    @if(isset($pengurus['pembina']) && $pengurus['pembina']->count() > 0)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dewan Pembina</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Kontak</th>
                            <th>Urutan</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengurus['pembina'] as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" 
                                         class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $item->kontak ?? '-' }}</td>
                            <td>{{ $item->urutan }}</td>
                            <td>
                                <a href="{{ route('pengurus-inti.edit', $item) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pengurus-inti.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Dewan Pengawas -->
    @if(isset($pengurus['pengawas']) && $pengurus['pengawas']->count() > 0)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dewan Pengawas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Kontak</th>
                            <th>Urutan</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengurus['pengawas'] as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" 
                                         class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $item->kontak ?? '-' }}</td>
                            <td>{{ $item->urutan }}</td>
                            <td>
                                <a href="{{ route('pengurus-inti.edit', $item) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pengurus-inti.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    <!-- Pengurus Inti (Ketua, Sekretaris, Bendahara) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengurus Inti</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Jabatan</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Kontak</th>
                            <th>Urutan</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $pengurusInti = collect([
                                $pengurus['ketua'] ?? collect(),
                                $pengurus['sekretaris'] ?? collect(),
                                $pengurus['bendahara'] ?? collect()
                            ])->flatten();
                        @endphp
                        
                        @forelse($pengurusInti as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->tipe_label }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if($item->foto)
                                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" 
                                         class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $item->kontak ?? '-' }}</td>
                            <td>{{ $item->urutan }}</td>
                            <td>
                                <a href="{{ route('pengurus-inti.edit', $item) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pengurus-inti.destroy', $item) }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center text-muted">Belum ada data pengurus inti</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
