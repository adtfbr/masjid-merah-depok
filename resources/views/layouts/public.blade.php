<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Masjid Merah Baiturrahman</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo-masjid.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo-masjid.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-masjid.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #A0293A;
            --secondary: #C5A572;
            --accent: #FAF8F3;
            --dark: #1e293b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar-public {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        .navbar-nav .nav-link {
            color: var(--dark);
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('{{ asset('images/hero-masjid.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 0;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-logo {
            width: 200px;
            height: 200px;
            margin-bottom: 30px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
            object-fit: contain;
        }

        .hero-section h1 {
            font-family: 'Gotham', 'Montserrat', 'Arial Black', sans-serif;
            font-size: 70px;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
            letter-spacing: 0.5px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .hero-section .hero-subtitle {
            font-family: 'Gotham', 'Montserrat', 'Arial Black', sans-serif;
            font-size: 70px;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
            letter-spacing: 0.5px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .hero-section p {
            font-size: 1.5rem;
            opacity: 0.9;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
            max-width: 800px;
            margin: 0 auto 1.5rem;
            font-style: italic;
        }

        .hero-section .lead {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        /* Section */
        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #6b7280;
        }

        /* Cards */
        .card-modern {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .card-modern img {
            height: 200px;
            object-fit: cover;
        }

        /* Stats */
        .stat-item {
            text-align: center;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .stat-item i {
            font-size: 3rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }

        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .stat-item p {
            color: #6b7280;
            margin: 0;
        }

        /* Footer */
        .footer {
        background: #1e293b;
        color: white;
        padding: 50px 0 20px;
        }

        .footer h5 {
        font-weight: bold;
        margin-bottom: 20px;
        color: white;
        }

        .footer a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer a:hover {
        color: #C5A572;
        padding-left: 5px;
        }

        .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 20px;
        margin-top: 30px;
        text-align: center;
        color: rgba(255,255,255,0.6);
        }

        .footer .bi {
        color: rgba(255,255,255,0.7);
        }

        /* Button */
        .btn-primary-custom {
            background: var(--primary);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
            color: white;
        }

        .btn-primary-custom:hover {
            background: #8B2332;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(160, 41, 58, 0.4);
            color: white;
        }

        .btn-light:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--primary);
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: white;
        }

        @media (max-width: 768px) {
            .hero-section {
                background-attachment: scroll;
            }

            .hero-logo {
                width: 120px;
                height: 120px;
            }

            .hero-section h1,
            .hero-section .hero-subtitle {
                font-size: 32px;
            }

            .hero-section .lead {
                font-size: 1.2rem;
            }

            .hero-section p {
                font-size: 0.95rem;
            }

            .section-title h2 {
                font-size: 1.75rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-public sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-masjid.png') }}" alt="Logo Masjid">
                <span>MASJID MERAH BAITURRAHMAN</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Beranda -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>

                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('public.profile.*') ? 'active' : '' }}" href="#" id="navbarProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarProfile">
                            <li><a class="dropdown-item" href="{{ route('public.profile.sejarah') }}">Sejarah Masjid Merah</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.profile.visimisi') }}">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.profile.struktur') }}">Struktur Kepengurusan</a></li>
                        </ul>
                    </li>

                    <!-- Manajemen Utama Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('public.manajemen.*') || request()->routeIs('public.keuangan') ? 'active' : '' }}" href="#" id="navbarManajemen" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manajemen Utama
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarManajemen">
                            <li><a class="dropdown-item" href="{{ route('public.manajemen.kesekretariatan') }}">Kesekretariatan</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.keuangan') }}">Keuangan</a></li>
                        </ul>
                    </li>

                    <!-- Manajemen Bidang Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('public.bidang.*') ? 'active' : '' }}" href="#" id="navbarBidang" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manajemen Bidang
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarBidang">
                            <li><a class="dropdown-item" href="{{ route('public.bidang.show', 2) }}">Bidang Kemasjidan</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.bidang.show', 1) }}">Bidang Usaha dan Ekonomi</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.bidang.show', 3) }}">Bidang Pendidikan</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.bidang.show', 5) }}">Bidang Pengelolaan Aset</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.bidang.show', 4) }}">Bidang Sosial Kemasyarakatan</a></li>
                        </ul>
                    </li>

                    <!-- Program Kerja Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('public.proker.*') ? 'active' : '' }}" href="#" id="navbarProker" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Program Kerja
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarProker">
                            <li><a class="dropdown-item" href="{{ route('public.proker.terlaksana') }}">Kegiatan Berjalan</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.proker.rencana') }}">Kegiatan Mendatang</a></li>
                            <li><a class="dropdown-item" href="{{ route('public.proker.target') }}">Target Program</a></li>
                        </ul>
                    </li>

                    <!-- Kontak -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('public.kontak') ? 'active' : '' }}" href="{{ route('public.kontak') }}">Kontak</a>
                    </li>

                    <!-- Admin Button -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>
                        <img src="{{ asset('images/logo-masjid.png') }}" alt="Logo Masjid" style="height: 40px; width: auto; margin-right: 10px; vertical-align: middle;">
                        MASJID MERAH BAITURRAHMAN
                    </h5>
                    <p class="text-white-50">
                        Sistem Informasi Manajemen Masjid untuk transparansi dan kemudahan akses informasi bagi jamaah.
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Menu</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('public.organisasi') }}">Struktur Organisasi</a></li>
                        <li class="mb-2"><a href="{{ route('public.kegiatan') }}">Kegiatan</a></li>
                        <li class="mb-2"><a href="{{ route('public.keuangan') }}">Transparansi Keuangan</a></li>
                        <li class="mb-2"><a href="{{ route('public.aset') }}">Aset Masjid</a></li>
                        <li class="mb-2"><a href="{{ route('public.kontak') }}">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Kontak</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="bi bi-geo-alt"></i>Jl. Tole Iskandar No.KM. 3<br>
                            Mekar Jaya, Kec. Sukmajaya, Kota Depok<br>
                            Jawa Barat 16411</li>
                        <li class="mb-2"><i class="bi bi-telephone"></i> +62 812-3456-7890</li>
                        <li class="mb-2"><i class="bi bi-envelope"></i> info@masjid.com</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; {{ date('Y') }} Masjid Merah Baiturrahman. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
