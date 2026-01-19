@extends('layouts.admin')
@section('title', 'Judul Modul')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5><i class="bi bi-icon"></i> Judul</h5>
        <a href="{{ route('route.create') }}" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <!-- Table atau content -->
    </div>
</div>
@endsection
