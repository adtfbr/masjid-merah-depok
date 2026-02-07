@extends('layouts.public')

@section('title', 'Visi Misi')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Visi & Misi</h1>
                <p class="lead text-white-50">Arah dan tujuan Yayasan Masjid Baiturrahman</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- VISI -->
                <div class="card card-modern mb-5">
                    <div class="card-header text-white text-center" style="background: linear-gradient(135deg, var(--primary) 0%, #8B2332 100%);">
                        <h3 class="mb-0"><i class="bi bi-eye"></i> VISI</h3>
                    </div>
                    <div class="card-body p-4">
                        <ol class="vision-list">
                            <li class="mb-3">
                                <strong>Mewujudkan masjid sebagai pusat kegiatan keagamaan, pendidikan, dan pemberdayaan masyarakat</strong>
                                <p class="text-muted mt-2" style="text-align: justify;">
                                    Masjid tidak hanya berfungsi sebagai tempat ibadah, tetapi juga sebagai pusat pembelajaran
                                    agama Islam yang komprehensif dan pemberdayaan ekonomi serta sosial bagi seluruh jamaah.
                                </p>
                            </li>
                            <li class="mb-3">
                                <strong>Membangun umat yang beriman, bertakwa, dan berakhlak mulia</strong>
                                <p class="text-muted mt-2" style="text-align: justify;">
                                    Melalui berbagai program dan kegiatan, kami bertujuan membentuk karakter jamaah yang kuat
                                    dalam keimanan, taat dalam beribadah, dan mulia dalam berperilaku sesuai ajaran Islam.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- MISI -->
                <div class="card card-modern">
                    <div class="card-header text-white text-center" style="background: linear-gradient(135deg, var(--secondary) 0%, #0d5a47 100%);">
                        <h3 class="mb-0"><i class="bi bi-list-check"></i> MISI</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="misi-card h-100 p-4 border-start border-primary border-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle misi-number bg-primary text-white d-flex align-items-center justify-content-center me-3">
                                            1
                                        </div>
                                        <h5 class="mb-0">Meningkatkan Kualitas Ibadah</h5>
                                    </div>
                                    <p class="mb-0" style="text-align: justify;">
                                        Menyelenggarakan sholat berjamaah 5 waktu dan Jumat secara rutin dengan khusyuk,
                                        serta mengadakan kajian dan pengajian berkala untuk meningkatkan pemahaman agama jamaah.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="misi-card h-100 p-4 border-start border-primary border-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle misi-number bg-primary text-white d-flex align-items-center justify-content-center me-3">
                                            2
                                        </div>
                                        <h5 class="mb-0">Mengembangkan Pendidikan Islam</h5>
                                    </div>
                                    <p class="mb-0" style="text-align: justify;">
                                        Mengelola TPA/TPQ yang berkualitas, menyelenggarakan program tahfidz Al-Quran,
                                        dan memberikan pendidikan agama untuk semua kalangan usia.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="misi-card h-100 p-4 border-start border-primary border-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle misi-number bg-primary text-white d-flex align-items-center justify-content-center me-3">
                                            3
                                        </div>
                                        <h5 class="mb-0">Memberdayakan Ekonomi Umat</h5>
                                    </div>
                                    <p class="mb-0" style="text-align: justify;">
                                        Mengembangkan unit usaha produktif masjid dan memberikan pelatihan kewirausahaan
                                        untuk meningkatkan kesejahteraan ekonomi jamaah.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="misi-card h-100 p-4 border-start border-primary border-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle misi-number bg-primary text-white d-flex align-items-center justify-content-center me-3">
                                            4
                                        </div>
                                        <h5 class="mb-0">Peduli Sosial Kemasyarakatan</h5>
                                    </div>
                                    <p class="mb-0" style="text-align: justify;">
                                        Melaksanakan program santunan rutin untuk anak yatim dan dhuafa, serta
                                        menyelenggarakan kegiatan bakti sosial untuk membantu masyarakat yang membutuhkan.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="misi-card h-100 p-4 border-start border-primary border-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle misi-number bg-primary text-white d-flex align-items-center justify-content-center me-3">
                                            5
                                        </div>
                                        <h5 class="mb-0">Mengelola Aset Secara Profesional</h5>
                                    </div>
                                    <p class="mb-0" style="text-align: justify;">
                                        Merawat dan mengembangkan aset masjid dengan sistem manajemen yang baik,
                                        transparan, dan akuntabel untuk keberlanjutan masjid.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="misi-card h-100 p-4 border-start border-primary border-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle misi-number bg-primary text-white d-flex align-items-center justify-content-center me-3">
                                            6
                                        </div>
                                        <h5 class="mb-0">Mewujudkan Transparansi & Akuntabilitas</h5>
                                    </div>
                                    <p class="mb-0" style="text-align: justify;">
                                        Menerapkan sistem manajemen modern dengan pelaporan keuangan yang terbuka,
                                        program kerja yang terukur, dan melibatkan partisipasi aktif jamaah.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
