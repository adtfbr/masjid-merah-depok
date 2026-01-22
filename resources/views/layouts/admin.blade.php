<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Admin Masjid Merah</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo-masjid.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo-masjid.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-masjid.png') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --sidebar-width: 250px;
            --navbar-height: 60px;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding-top: 20px;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s;
        }
        
        .sidebar .brand {
            color: white;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 8px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
            font-weight: 600;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
        }
        
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            padding: 15px 20px;
            border-radius: 10px;
        }
        
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .card-header {
            background: white;
            border-bottom: 2px solid #f1f3f5;
            font-weight: 600;
            padding: 15px 20px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #5568d3 0%, #6a4294 100%);
        }
        
        .stat-card {
            border-left: 4px solid;
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
        
        /* Fix Pagination Style */
        .pagination {
            margin-top: 20px;
            margin-bottom: 0;
        }
        
        .pagination .page-link {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }
        
        .pagination .page-item {
            margin: 0 2px;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="brand">
            <i class="bi bi-buildings"></i> MASJID
        </div>
        
        <div class="nav flex-column mt-4">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            
            <a href="{{ route('bidang.index') }}" class="nav-link {{ request()->routeIs('bidang.*') ? 'active' : '' }}">
                <i class="bi bi-diagram-3"></i> Bidang
            </a>
            
            <a href="{{ route('anggota.index') }}" class="nav-link {{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Anggota
            </a>
            
            <a href="{{ route('kegiatan.index') }}" class="nav-link {{ request()->routeIs('kegiatan.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event"></i> Kegiatan
            </a>
            
            <div class="mt-3 mb-2" style="padding: 0 20px; color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: uppercase;">
                Keuangan
            </div>
            
            <a href="{{ route('akun-keuangan.index') }}" class="nav-link {{ request()->routeIs('akun-keuangan.*') ? 'active' : '' }}">
                <i class="bi bi-wallet2"></i> Akun Keuangan
            </a>
            
            <a href="{{ route('transaksi.index') }}" class="nav-link {{ request()->routeIs('transaksi.*') && !request()->routeIs('transaksi.laporan') ? 'active' : '' }}">
                <i class="bi bi-cash-stack"></i> Transaksi
            </a>
            
            <a href="{{ route('transaksi.laporan') }}" class="nav-link {{ request()->routeIs('transaksi.laporan') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-bar-graph"></i> Laporan
            </a>
            
            <div class="mt-3 mb-2" style="padding: 0 20px; color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: uppercase;">
                Konten Website
            </div>
            
            <a href="{{ route('pengurus-inti.index') }}" class="nav-link {{ request()->routeIs('pengurus-inti.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i> Kesekretariatan
            </a>
            
            <a href="{{ route('struktur-gambar.index') }}" class="nav-link {{ request()->routeIs('struktur-gambar.*') ? 'active' : '' }}">
                <i class="bi bi-diagram-3"></i> Struktur Gambar
            </a>
            
            <a href="{{ route('target-kesekretariatan.index') }}" class="nav-link {{ request()->routeIs('target-kesekretariatan.*') ? 'active' : '' }}">
                <i class="bi bi-list-check"></i> Target Kesekretariatan
            </a>
            
            <a href="{{ route('bidang-program-kerja.index') }}" class="nav-link {{ request()->routeIs('bidang-program-kerja.*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i> Program Kerja Bidang
            </a>
            
            <a href="{{ route('target-program.index') }}" class="nav-link {{ request()->routeIs('target-program.*') ? 'active' : '' }}">
                <i class="bi bi-bullseye"></i> Target Program
            </a>
            
            <div class="mt-3 mb-2" style="padding: 0 20px; color: rgba(255,255,255,0.5); font-size: 0.75rem; text-transform: uppercase;">
                Aset & Log
            </div>
            
            <a href="{{ route('aset.index') }}" class="nav-link {{ request()->routeIs('aset.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i> Aset
            </a>
            
            <a href="{{ route('activity-log.index') }}" class="nav-link {{ request()->routeIs('activity-log.*') ? 'active' : '' }}">
                <i class="bi bi-clock-history"></i> Activity Log
            </a>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar-custom d-flex justify-content-between align-items-center">
            <div>
                <button class="btn btn-link d-md-none" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5 class="mb-0 d-none d-md-block">@yield('title')</h5>
            </div>
            
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle text-decoration-none" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><span class="dropdown-item-text"><small>{{ Auth::user()->email }}</small></span></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Alert Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        <!-- Page Content -->
        @yield('content')
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
        
        // Auto-hide alerts
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
    
    @stack('scripts')
</body>
</html>
