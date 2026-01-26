@extends('layouts.public')

@section('title', 'Kontak')

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-white mb-3">Hubungi Kami</h1>
                <p class="lead text-white-50">Kami siap melayani dan menjawab pertanyaan Anda</p>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card card-modern text-center h-100">
                    <div class="card-body">
                        <div class="mb-3" style="font-size: 3rem; color: #667eea;">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5>Alamat</h5>
                        <p class="text-muted">
                            Jl. Tole Iskandar No.KM. 3<br>
                            Mekar Jaya, Kec. Sukmajaya, Kota Depok<br>
                            Jawa Barat 16411
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-modern text-center h-100">
                    <div class="card-body">
                        <div class="mb-3" style="font-size: 3rem; color: #667eea;">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h5>Telepon</h5>
                        <p class="text-muted">
                            <strong>0878 6257 3069</strong><br>
                            <small>Senin - Ahad: 08:00 - 17:00</small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-modern text-center h-100">
                    <div class="card-body">
                        <div class="mb-3" style="font-size: 3rem; color: #667eea;">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h5>Email</h5>
                        <p class="text-muted">
                            <strong>masjidmerahcikumpa@gmail.com</strong><br>
                            <small>Kami akan membalas dalam 1x24 jam</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="card card-modern">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-chat-dots"></i> Kirim Pesan</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama lengkap Anda" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="email@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subjek</label>
                                <input type="text" class="form-control" placeholder="Subjek pesan" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pesan</label>
                                <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-custom w-100">
                                <i class="bi bi-send"></i> Kirim Pesan
                            </button>
                        </form>
                        <div class="alert alert-info mt-3 mb-0">
                            <small><i class="bi bi-info-circle"></i> Form ini dalam mode demo. Untuk implementasi lengkap, hubungi administrator.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-modern h-100">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-map"></i> Lokasi Kami</h5>
                    </div>
                    <div class="card-body p-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d211617.25850570007!2d106.8265687330347!3d-6.421748474862842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebbf62bf3a1f%3A0x12fda0164aa851a3!2sMasjid%20Jami&#39;%20Baiturrahman!5e0!3m2!1sid!2sid!4v1768067617941!5m2!1sid!2sid"
                            width="650"
                            height="590"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <h4 class="mb-3">Ikuti Kami di Media Sosial</h4>
            <div class="d-flex justify-content-center gap-3">
                <a href="http://www.youtube.com/@masjidmerah.official" class="btn btn-primary btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-youtube"></i>
                </a>
                <a href="https://www.tiktok.com/@remasbara.official?_r=1&_t=ZS-93OX2xuay8q" class="btn btn-info btn-lg rounded-circle text-white" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-tiktok"></i>
                </a>
                <a href="https://www.instagram.com/masjidmerahcikumpa.official?igsh=b2xsd3gybGU1bTVn" class="btn btn-danger btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://wa.me/6287862573069" class="btn btn-success btn-lg rounded-circle" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
