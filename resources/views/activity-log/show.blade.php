@extends('layouts.admin')
@section('title', 'Detail Activity Log')
@section('content')
<div class="card">
    <div class="card-header"><h5 class="mb-0"><i class="bi bi-info-circle"></i> Detail Activity Log</h5></div>
    <div class="card-body">
        <table class="table table-borderless">
            <tr><th width="25%">User</th><td><span class="badge bg-primary">{{ $activityLog->user->name }}</span></td></tr>
            <tr><th>Email</th><td>{{ $activityLog->user->email }}</td></tr>
            <tr><th>Aktivitas</th><td><strong>{{ $activityLog->aktivitas }}</strong></td></tr>
            <tr><th>Waktu</th><td>{{ $activityLog->created_at->format('d F Y, H:i:s') }} <small class="text-muted">({{ $activityLog->created_at->diffForHumans() }})</small></td></tr>
            <tr><th>IP Address</th><td><code>{{ $activityLog->ip_address }}</code></td></tr>
            <tr><th>User Agent</th><td><small class="text-muted">{{ $activityLog->user_agent }}</small></td></tr>
        </table>
        <a href="{{ route('activity-log.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
