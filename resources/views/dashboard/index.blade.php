@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Stat Cards -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="border-left-color: #667eea;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Bidang</h6>
                        <h2 class="mb-0">{{ $totalBidang }}</h2>
                    </div>
                    <div class="fs-1 text-primary">
                        <i class="bi bi-diagram-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="border-left-color: #06b6d4;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Anggota</h6>
                        <h2 class="mb-0">{{ $totalAnggota }}</h2>
                    </div>
                    <div class="fs-1 text-info">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="border-left-color: #10b981;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Kegiatan</h6>
                        <h2 class="mb-0">{{ $totalKegiatan }}</h2>
                        <small class="text-success">{{ $kegiatanAktif }} Aktif</small>
                    </div>
                    <div class="fs-1 text-success">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="border-left-color: #f59e0b;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Aset</h6>
                        <h2 class="mb-0">{{ $totalAset }}</h2>
                        <small class="text-muted">Item</small>
                    </div>
                    <div class="fs-1 text-warning">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Keuangan Summary -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-cash-stack"></i> Ringkasan Keuangan {{ date('Y') }}
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Pemasukan</span>
                        <span class="text-success fw-bold">{{ formatRupiah($totalPemasukan) }}</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" style="width: 100%"></div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Pengeluaran</span>
                        <span class="text-danger fw-bold">{{ formatRupiah($totalPengeluaran) }}</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-danger" style="width: {{ $totalPemasukan > 0 ? ($totalPengeluaran / $totalPemasukan * 100) : 0 }}%"></div>
                    </div>
                </div>
                
                <hr>
                
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Saldo Saat Ini</span>
                    <span class="fw-bold {{ $saldoAkhir >= 0 ? 'text-success' : 'text-danger' }}">
                        {{ formatRupiah($saldoAkhir) }}
                    </span>
                </div>
                <small class="text-muted d-block mt-2">
                    <i class="bi bi-info-circle"></i> Saldo bulan terakhir
                </small>
            </div>
        </div>
    </div>
    
    <!-- Chart Transaksi -->
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">
                <i class="bi bi-graph-up"></i> Grafik Transaksi (6 Bulan Terakhir)
            </div>
            <div class="card-body">
                <canvas id="chartTransaksi"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Kegiatan Terbaru -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-calendar-event"></i> Kegiatan Terbaru</span>
                <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                @if($kegiatanTerbaru->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($kegiatanTerbaru as $kegiatan)
                    <a href="{{ route('kegiatan.show', $kegiatan) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">{{ $kegiatan->nama_kegiatan }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-diagram-3"></i> {{ $kegiatan->bidang->nama_bidang }}
                                </small>
                            </div>
                            <small>{!! statusBadge($kegiatan->status) !!}</small>
                        </div>
                        <small class="text-muted">
                            <i class="bi bi-calendar"></i> {{ formatTanggal($kegiatan->tanggal_mulai) }}
                        </small>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-calendar-x fs-1"></i>
                    <p class="mt-2">Belum ada kegiatan</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Transaksi Terbaru -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-cash-stack"></i> Transaksi Terbaru</span>
                <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                @if($transaksiTerbaru->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($transaksiTerbaru as $transaksi)
                    <a href="{{ route('transaksi.show', $transaksi) }}" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">{{ $transaksi->akun->nama_akun }}</h6>
                                <small class="text-muted">{{ formatTanggal($transaksi->tanggal) }}</small>
                            </div>
                            <span class="fw-bold {{ $transaksi->akun->tipe == 'pemasukan' ? 'text-success' : 'text-danger' }}">
                                {{ $transaksi->akun->tipe == 'pemasukan' ? '+' : '-' }} {{ formatRupiah($transaksi->jumlah) }}
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-cash-stack fs-1"></i>
                    <p class="mt-2">Belum ada transaksi</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Activity Log -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-clock-history"></i> Activity Log Terbaru</span>
                <a href="{{ route('activity-log.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                @if($activityLogs->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Aktivitas</th>
                                <th>Waktu</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activityLogs as $log)
                            <tr>
                                <td>{{ $log->user->name }}</td>
                                <td>{{ $log->aktivitas }}</td>
                                <td><small>{{ $log->created_at->diffForHumans() }}</small></td>
                                <td><small class="text-muted">{{ $log->ip_address }}</small></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-clock-history fs-1"></i>
                    <p class="mt-2">Belum ada aktivitas</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartTransaksi');
    const chartData = @json($chartData);
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartData.map(d => d.month),
            datasets: [
                {
                    label: 'Pemasukan',
                    data: chartData.map(d => d.pemasukan),
                    backgroundColor: 'rgba(16, 185, 129, 0.8)',
                    borderColor: 'rgb(16, 185, 129)',
                    borderWidth: 1
                },
                {
                    label: 'Pengeluaran',
                    data: chartData.map(d => d.pengeluaran),
                    backgroundColor: 'rgba(239, 68, 68, 0.8)',
                    borderColor: 'rgb(239, 68, 68)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
