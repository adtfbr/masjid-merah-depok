@extends('layouts.admin')

@section('title', 'Daftar Bidang')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-diagram-3"></i> Daftar Bidang</h5>
        <a href="{{ route('bidang.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Bidang
        </a>
    </div>
    <div class="card-body">
        @if($bidangs->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Bidang</th>
                        <th>Deskripsi</th>
                        <th width="8%" class="text-center">Anggota</th>
                        <th width="8%" class="text-center">Kegiatan</th>
                        <th width="8%" class="text-center">Program</th>
                        <th width="8%" class="text-center">Target</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bidangs as $bidang)
                    <tr>
                        <td>{{ $bidangs->firstItem() + $loop->index }}</td>
                        <td>
                            <strong>{{ $bidang->nama_bidang }}</strong>
                        </td>
                        <td>
                            <small class="text-muted">
                                {{ Str::limit($bidang->deskripsi, 50) ?: '-' }}
                            </small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-info">{{ $bidang->anggota_count }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-success">{{ $bidang->kegiatan_count }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('bidang-program-kerja.index', ['bidang_id' => $bidang->id]) }}" 
                               class="badge bg-primary text-decoration-none" title="Lihat Program Kerja">
                                {{ $bidang->program_kerja_count }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('target-program.index', ['bidang_id' => $bidang->id]) }}" 
                               class="badge bg-warning text-decoration-none" title="Lihat Target Program">
                                {{ $bidang->target_program_count }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('bidang.show', $bidang) }}" class="btn btn-sm btn-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('bidang.edit', $bidang) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('bidang.destroy', $bidang) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Yakin ingin menghapus bidang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
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
            {{ $bidangs->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-diagram-3 text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada data bidang</p>
            <a href="{{ route('bidang.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Bidang Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
