@extends('layouts.public')

@section('title', 'Transparansi Keuangan')

@section('content')
<div class="hero-section" style="padding: 60px 0;">
    <div class="container text-center">
        <h1><i class="bi bi-cash-stack"></i> Transparansi Keuangan</h1>
        <p>Laporan Keuangan Masjid Secara Transparan</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <!-- Filter Tahun -->
        <div class="card card-modern mb-4">
            <div class="card-body">
                <form method="GET" class="row align-items-center">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Pilih Tahun:</label>
                    </div>
                    <div class="col-md-4">
                        <select name="year" class="form-select" onchange="this.form.submit()">
                            @foreach($years as $y)
                            <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="stat-item" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                    <i class="bi bi-arrow-down-circle text-white"></i>
                    <h3 class="text-white">{{ formatRupiah($totalPemasukan) }}</h3>
                    <p class="text-white mb-0">Total Pemasukan {{ $year }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                    <i class="bi bi-arrow-up-circle text-white"></i>
                    <h3 class="text-white">{{ formatRupiah($totalPengeluaran) }}</h3>
                    <p class="text-white mb-0">Total Pengeluaran {{ $year }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white;">
                    <i class="bi bi-wallet2 text-white"></i>
                    <h3 class="text-white {{ $saldo < 0 ? 'text-warning' : '' }}">{{ formatRupiah($saldo) }}</h3>
                    <p class="text-white mb-0">Saldo {{ $year }}</p>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="card card-modern mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-graph-up"></i> Grafik Keuangan Per Bulan</h5>
            </div>
            <div class="card-body">
                <canvas id="chartKeuangan"></canvas>
            </div>
        </div>

        <!-- Tabel Detail -->
        <div class="card card-modern">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="bi bi-table"></i> Detail Per Bulan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Bulan</th>
                                <th class="text-end">Pemasukan</th>
                                <th class="text-end">Pengeluaran</th>
                                <th class="text-end">Selisih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksiPerBulan as $item)
                            <tr>
                                <td>{{ $item['bulan'] }} {{ $year }}</td>
                                <td class="text-end text-success">{{ formatRupiah($item['pemasukan']) }}</td>
                                <td class="text-end text-danger">{{ formatRupiah($item['pengeluaran']) }}</td>
                                <td class="text-end fw-bold {{ ($item['pemasukan'] - $item['pengeluaran']) >= 0 ? 'text-primary' : 'text-warning' }}">
                                    {{ formatRupiah($item['pemasukan'] - $item['pengeluaran']) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light fw-bold">
                            <tr>
                                <td>TOTAL</td>
                                <td class="text-end text-success">{{ formatRupiah($totalPemasukan) }}</td>
                                <td class="text-end text-danger">{{ formatRupiah($totalPengeluaran) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="alert alert-info mt-4">
            <i class="bi bi-info-circle"></i> <strong>Catatan:</strong> Data keuangan ini dipublikasikan untuk transparansi dan akuntabilitas pengelolaan keuangan masjid.
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartKeuangan');
const data = @json($transaksiPerBulan);

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data.map(d => d.bulan),
        datasets: [
            {
                label: 'Pemasukan',
                data: data.map(d => d.pemasukan),
                backgroundColor: 'rgba(16, 185, 129, 0.8)',
            },
            {
                label: 'Pengeluaran',
                data: data.map(d => d.pengeluaran),
                backgroundColor: 'rgba(239, 68, 68, 0.8)',
            }
        ]
    },
    options: {
        responsive: true,
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
                        return context.dataset.label + ': Rp ' + context.parsed.y.toLocaleString('id-ID');
                    }
                }
            }
        }
    }
});
</script>
@endpush
