<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-public" id="mainNavbar">
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
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('public.profile.*') ? 'active' : '' }}" href="#" id="navbarProfile" role="button" data-bs-toggle="dropdown">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('public.profile.sejarah') }}">Sejarah Masjid Merah</a></li>
                        <li><a class="dropdown-item" href="{{ route('public.profile.visimisi') }}">Visi Misi</a></li>
                        <li><a class="dropdown-item" href="{{ route('public.profile.struktur') }}">Struktur Kepengurusan</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('public.manajemen.*') || request()->routeIs('public.keuangan') ? 'active' : '' }}" href="#" id="navbarManajemen" role="button" data-bs-toggle="dropdown">
                        Manajemen Utama
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('public.manajemen.kesekretariatan') }}">Dewan Pengurus Harian</a></li>
                        <li><a class="dropdown-item" href="{{ route('public.keuangan') }}">Keuangan</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('public.bidang.*') ? 'active' : '' }}" href="#" id="navbarBidang" role="button" data-bs-toggle="dropdown">
                        Manajemen Bidang
                    </a>
                    <ul class="dropdown-menu">
                        @if(isset($navbarBidangs) && $navbarBidangs->count() > 0)
                            @foreach($navbarBidangs as $bidang)
                                <li><a class="dropdown-item" href="{{ route('public.bidang.show', $bidang->slug) }}">{{ $bidang->nama_bidang }}</a></li>
                            @endforeach
                        @else
                            <li><a class="dropdown-item" href="#">Tidak ada bidang</a></li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('public.proker.*') ? 'active' : '' }}" href="#" id="navbarProker" role="button" data-bs-toggle="dropdown">
                        Program Kerja
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('public.proker.terlaksana') }}">Kegiatan Berjalan</a></li>
                        <li><a class="dropdown-item" href="{{ route('public.proker.rencana') }}">Kegiatan Mendatang</a></li>
                        <li><a class="dropdown-item" href="{{ route('public.proker.target') }}">Target Program</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.aset') ? 'active' : '' }}" href="{{ route('public.aset') }}">Aset</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.kontak') ? 'active' : '' }}" href="{{ route('public.kontak') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
