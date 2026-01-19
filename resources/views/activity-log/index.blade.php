@extends('layouts.admin')
@section('title', 'Activity Log')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-clock-history"></i> Activity Log</h5>
        <form action="{{ route('activity-log.clear') }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus log lama?')">
            @csrf @method('DELETE')
            <input type="hidden" name="days" value="30">
            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus Log >30 Hari</button>
        </form>
    </div>
    <div class="card-body">
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <select name="user_id" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua User</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal_mulai" class="form-control" value="{{ request('tanggal_mulai') }}" placeholder="Dari">
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}" placeholder="Sampai">
            </div>
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Cari aktivitas..." value="{{ request('search') }}">
            </div>
        </form>

        @if($logs->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th width="15%">Waktu</th>
                        <th width="15%">User</th>
                        <th>Aktivitas</th>
                        <th width="12%">IP Address</th>
                        <th width="8%">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td><small>{{ $log->created_at->format('d/m/Y H:i') }}</small></td>
                        <td><span class="badge bg-primary">{{ $log->user->name }}</span></td>
                        <td>{{ $log->aktivitas }}</td>
                        <td><small class="text-muted">{{ $log->ip_address }}</small></td>
                        <td><a href="{{ route('activity-log.show', $log) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $logs->links() }}
        @else
        <div class="text-center py-5">
            <i class="bi bi-clock-history text-muted" style="font-size: 4rem;"></i>
            <p class="text-muted mt-3">Belum ada activity log</p>
        </div>
        @endif
    </div>
</div>
@endsection
