@extends('layouts.public')

@section('title', 'Sejarah Masjid Merah')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Sejarah Masjid Merah</h1>
                <p class="lead text-white-50">Perjalanan panjang Masjid Merah Baiturrahman dalam melayani umat</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <!-- Section 1: Awal Berdiri -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/sejarah-awal.jpeg') }}"
                     alt="Masjid Merah Awal Berdiri"
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h3 class="mb-3 text-primary">Sekitar Tahun 1970-1980</h3>
                <p style="text-align: justify;">
                    Sejarah dimulai sejak tahun 1970an saat Masjid Baiturrahman masih menjadi Musholla yang dahulu masih berwarna putih dengan ciri khas bangunan yang menggunakan ornamen ornamen Tempo Doeloe. Musholla Baiturrahman ini menjadi salah satunya pilihan warga cikumpa yang saat itu belum banyak memiliki Musholla untuk menjadi pilihan utama sebagai tempat ibadah umat muslim. Sampai akhirnya di awal tahun 90an dibangun menjadi Masjid Baiturrahman
                </p>
            </div>
        </div>

        <!-- Section 2: Perkembangan dan Renovasi (Teks di kiri) -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                <img src="{{ asset('images/sejarah-perkembangan3.jpg') }}"
                     alt="Perkembangan Masjid Merah"
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 order-md-1">
                <h3 class="mb-3 text-primary">Fase Perkembangan Pertama</h3>
                <p style="text-align: justify;">
                    Masjid Baiturrahman diawal tahun 1990an sampai 2010 sudah berdiri kokoh di tanah yang sama, hanya saja lebih dekat dengan jalan raya utama Tole Iskandar
                </p>
            </div>
        </div>

        <!-- Section 3: Renovasi Besar (Gambar di kiri) -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/sejarah-perkembangan2.jpeg') }}"
                     alt="Renovasi Masjid Merah"
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h3 class="mb-3 text-primary">Renovasi Besar 2013-an</h3>
                <p style="text-align: justify;">
                    Hingga pada tahun 2012-an hingga 2013 dilakukan pembangunan kembali untuk menjadikan Masjid Baiturrahman yang sebelumnya berwarna biru, dibangun menjadi warna merah. Hal ini yang kemudian menjadikan Masjid Baiturrahman disebut sebagai Masjid Merah yang ikonik di daerah Depok, Jawa Barat
                </p>
            </div>
        </div>

        <!-- Section 4: Modernisasi (Teks di kiri) -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                <img src="{{ asset('images/sejarah-perkembangan1.jpg') }}"
                     alt="Modernisasi Masjid Merah"
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 order-md-1">
                <h3 class="mb-3 text-primary">Era Modernisasi</h3>
                <p style="text-align: justify;">
                    Pada dekade 2017-an, Masjid Merah mulai melakukan modernisasi dalam berbagai aspek.
                    Tidak hanya dari sisi fisik bangunan, tetapi juga dalam hal manajemen dan program
                    kegiatan. Dibentuk berbagai bidang yang mengelola aspek-aspek penting seperti
                    pendidikan, sosial, ekonomi, dan pengelolaan aset.
                </p>
            </div>
        </div>

        <!-- Section 5: Kondisi Saat Ini (Gambar di kiri) -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('images/sejarah-sekarang.jpeg') }}"
                     alt="Masjid Merah Saat Ini"
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h3 class="mb-3 text-primary">Masjid Merah Saat Ini</h3>
                <p style="text-align: justify;">
                    Sejak selesainya pembangunan Masjid Merah Baiturrahman pada tahun 2013an, Masjid Merah tidak selesai dalam melakukan proses peningkatan pelayanan kepada jamaah. Hal ini terbukti dari upgrade dan pembangunan yang terus berkelanjutan untuk menambah fasilitas guna melayani dan menjamu umat serta memberikan rasa nyaman kepada jamaah untuk beribadah. Hingga kini, di tahun 2026 Masjid Merah Baiturrahman sudah menjadi masjid yang ikonik dan cukup familiar di daerah Depok maupun Jakarta karena citra baik yang diberikan para pengurus kepada seluruh jamaah dan masyarakat yang singgah untuk beribadah maupun istirahat di Masjid Merah Baiturrahman
                </p>
            </div>
        </div>

        <!-- Timeline Summary -->
        <div class="card card-modern">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="bi bi-clock-history"></i> Timeline Perkembangan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3 text-center">
                        <div class="p-3 bg-light rounded">
                            <h3 class="text-primary mb-2">1970-an</h3>
                            <p class="mb-0">Berdiri sebagai musholla sederhana</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="p-3 bg-light rounded">
                            <h3 class="text-primary mb-2">2010-an</h3>
                            <p class="mb-0">Perluasan bangunan pertama</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="p-3 bg-light rounded">
                            <h3 class="text-primary mb-2">2013-an</h3>
                            <p class="mb-0">Renovasi besar & pembangunan lantai 2</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="p-3 bg-light rounded">
                            <h3 class="text-primary mb-2">2017-an</h3>
                            <p class="mb-0">Modernisasi & sistem manajemen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
