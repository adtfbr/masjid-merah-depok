<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="d-flex align-items-center flex-wrap">
                    <img src="{{ asset('images/logo-masjid.png') }}" alt="Logo Masjid" class="me-2">
                    <span>MASJID MERAH BAITURRAHMAN</span>
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
                    <li class="mb-2">
                        <i class="bi bi-geo-alt"></i> Jl. Tole Iskandar No.KM. 3<br>
                        <span>Mekar Jaya, Kec. Sukmajaya, Kota Depok<br>Jawa Barat 16411</span>
                    </li>
                    <li class="mb-2"><i class="bi bi-telephone"></i> 0878 6257 3069</li>
                    <li class="mb-2"><i class="bi bi-envelope"></i> masjidmerahcikumpa@gmail.com</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="mb-0">&copy; {{ date('Y') }} Masjid Merah Baiturrahman. All rights reserved.</p>
            <div class="mt-3">
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light">
                    <i class="bi bi-box-arrow-in-right"></i> Portal Admin
                </a>
            </div>
        </div>
    </div>
</footer>
