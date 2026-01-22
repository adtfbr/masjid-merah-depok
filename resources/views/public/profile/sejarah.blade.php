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
                <h3 class="mb-3 text-primary">Awal Berdiri</h3>
                <p style="text-align: justify;">
                    Masjid Merah Baiturrahman berdiri pada tahun 1980-an sebagai wujud kepedulian masyarakat 
                    setempat terhadap kebutuhan sarana ibadah. Berawal dari musala sederhana yang dibangun 
                    secara gotong royong oleh warga sekitar, masjid ini terus berkembang seiring dengan 
                    bertambahnya jumlah jamaah yang hadir.
                </p>
                <p style="text-align: justify;">
                    Nama "Masjid Merah" sendiri berasal dari warna cat dominan pada bangunan awal yang 
                    menggunakan warna merah bata. Nama ini kemudian melekat dan dikenal luas oleh masyarakat 
                    sekitar hingga saat ini.
                </p>
            </div>
        </div>

        <!-- Section 2: Perkembangan dan Renovasi (Teks di kiri) -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                <img src="{{ asset('images/sejarah-perkembangan1.jpg') }}" 
                     alt="Perkembangan Masjid Merah" 
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 order-md-1">
                <h3 class="mb-3 text-primary">Fase Perkembangan Pertama</h3>
                <p style="text-align: justify;">
                    Seiring dengan perkembangan jumlah jamaah, pada tahun 1990-an dilakukan perluasan 
                    bangunan masjid. Perluasan ini meliputi penambahan ruang sholat utama, tempat wudhu, 
                    dan fasilitas pendukung lainnya. Dana pembangunan berasal dari swadaya masyarakat 
                    dan donatur yang peduli dengan perkembangan masjid.
                </p>
                <p style="text-align: justify;">
                    Pada fase ini juga dibentuk pengurus masjid yang lebih terstruktur untuk mengelola 
                    kegiatan keagamaan dan operasional masjid sehari-hari.
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
                <h3 class="mb-3 text-primary">Renovasi Besar 2000-an</h3>
                <p style="text-align: justify;">
                    Memasuki era 2000-an, Masjid Merah mengalami renovasi besar-besaran. Renovasi ini 
                    mencakup perbaikan struktur bangunan, pemasangan kubah yang lebih megah, penambahan 
                    menara, serta modernisasi fasilitas seperti sound system dan penerangan.
                </p>
                <p style="text-align: justify;">
                    Renovasi ini juga meliputi pembangunan lantai dua untuk menampung jamaah yang semakin 
                    banyak, terutama pada saat Jumat dan hari-hari besar Islam. Total biaya renovasi 
                    mencapai ratusan juta rupiah yang dikumpulkan dari berbagai sumber.
                </p>
            </div>
        </div>

        <!-- Section 4: Modernisasi (Teks di kiri) -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6 order-md-2 mb-4 mb-md-0">
                <img src="{{ asset('images/sejarah-perkembangan3.jpg') }}" 
                     alt="Modernisasi Masjid Merah" 
                     class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6 order-md-1">
                <h3 class="mb-3 text-primary">Era Modernisasi</h3>
                <p style="text-align: justify;">
                    Pada dekade 2010-an, Masjid Merah mulai melakukan modernisasi dalam berbagai aspek. 
                    Tidak hanya dari sisi fisik bangunan, tetapi juga dalam hal manajemen dan program 
                    kegiatan. Dibentuk berbagai bidang yang mengelola aspek-aspek penting seperti 
                    pendidikan, sosial, ekonomi, dan pengelolaan aset.
                </p>
                <p style="text-align: justify;">
                    Masjid juga mulai mengembangkan program-program pemberdayaan masyarakat seperti 
                    TPA/TPQ, pelatihan kewirausahaan, dan kegiatan sosial kemasyarakatan yang rutin 
                    dilaksanakan.
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
                    Saat ini, Masjid Merah Baiturrahman telah menjadi salah satu pusat kegiatan keagamaan 
                    dan sosial yang aktif di wilayah ini. Dengan kapasitas yang dapat menampung ratusan 
                    jamaah, masjid ini tidak hanya berfungsi sebagai tempat ibadah, tetapi juga sebagai 
                    pusat pendidikan dan pemberdayaan umat.
                </p>
                <p style="text-align: justify;">
                    Berbagai program rutin seperti kajian, TPA, santunan sosial, dan kegiatan ekonomi 
                    produktif terus berjalan. Masjid Merah juga telah mengimplementasikan sistem manajemen 
                    modern dengan transparansi keuangan dan program kerja yang terukur.
                </p>
                <p style="text-align: justify;">
                    Ke depan, Masjid Merah bertekad untuk terus berkembang dan memberikan manfaat yang 
                    lebih besar bagi umat dan masyarakat sekitar, sejalan dengan visi menjadi masjid 
                    yang rahmatan lil'alamin.
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
                            <h3 class="text-primary mb-2">1980-an</h3>
                            <p class="mb-0">Berdiri sebagai musala sederhana</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="p-3 bg-light rounded">
                            <h3 class="text-primary mb-2">1990-an</h3>
                            <p class="mb-0">Perluasan bangunan pertama</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="p-3 bg-light rounded">
                            <h3 class="text-primary mb-2">2000-an</h3>
                            <p class="mb-0">Renovasi besar & pembangunan lantai 2</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 text-center">
                        <div class="p-3 bg-light rounded">
                            <h3 class="text-primary mb-2">2010-an</h3>
                            <p class="mb-0">Modernisasi & sistem manajemen</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
