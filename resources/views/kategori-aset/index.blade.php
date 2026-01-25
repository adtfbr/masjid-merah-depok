@extends('layouts.admin')

@section('title', 'Kategori Aset')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori Aset</h1>
        <a href="{{ route('kategori-aset.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Kategori
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            @if($kategoris->count() > 0)
            <div class="row">
                @foreach($kategoris as $kategori)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($kategori->foto)
                        <img src="{{ $kategori->foto_url }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $kategori->nama_kategori }}">
                        @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-image text-white" style="font-size: 3rem;"></i>
                        </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $kategori->nama_kategori }}</h5>
                            <p class="text-muted mb-3">
                                <i class="bi bi-box"></i> {{ $kategori->aset_count }} Item
                            </p>
                            <div class="btn-group w-100">
                                <a href="{{ route('kategori-aset.edit', $kategori) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('kategori-aset.destroy', $kategori) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-5 text-muted">
                <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                <p class="mt-3">Belum ada kategori aset</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
