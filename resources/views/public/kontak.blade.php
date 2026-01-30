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

        <!-- ============================================ -->
<!-- SECTION INFAQ & SEDEKAH - IMPROVED LAYOUT -->
<!-- ============================================ -->

<!-- Infaq & Sedekah Section -->
<div class="mt-5 mb-5">
    <div class="card card-modern">
        <div class="card-header text-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
            <h4 class="mb-1"><i class="bi bi-heart-fill"></i> Infaq & Sedekah</h4>
            <p class="mb-0 small">Salurkan sedekah Anda untuk kemakmuran masjid</p>
        </div>
        <div class="card-body p-4">
            <div class="row align-items-stretch g-4">
                <!-- KIRI: Transfer Bank -->
                <div class="col-lg-6">
                    <div class="h-100 p-4 border rounded d-flex flex-column" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
                        <h5 class="mb-4 text-primary text-center">
                            <i class="bi bi-bank"></i> Transfer Bank
                        </h5>

                        <!-- Logo BSN & Nomor Rekening - HORIZONTAL LAYOUT -->
                        <div class="d-flex align-items-center justify-content-center mb-4 flex-grow-1">
                            <!-- Logo BSN di Kiri -->
                            <div class="me-4">
                                <img src="{{ asset('images/logo-bsn.png') }}"
                                     alt="BSN"
                                     style="height: 200px; width: auto; object-fit: contain;"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                <!-- Fallback jika logo tidak ada -->
                                <div style="display: none;">
                                    <div class="badge bg-primary fs-3 px-4 py-3">BSN</div>
                                </div>
                            </div>

                            <!-- Nomor Rekening di Kanan -->
                            <div class="text-start">
                                <p class="text-muted mb-2 small">Nomor Rekening:</p>
                                <h3 class="mb-3 fw-bold text-dark" style="font-family: 'Courier New', monospace; letter-spacing: 2px; font-size: 1.5rem;">
                                    7202200221
                                </h3>
                                <p class="text-muted mb-1 small">Atas Nama:</p>
                                <h6 class="mb-0 fw-bold" style="font-size: 0.9rem;">
                                    YAYASAN MASJID BAITURRAHMAN
                                </h6>
                            </div>
                        </div>

                        <!-- Tombol Copy -->
                        <div class="text-center mt-auto">
                            <button class="btn btn-outline-primary btn-sm" onclick="copyRekening(event)">
                                <i class="bi bi-clipboard"></i> Salin Nomor Rekening
                            </button>
                        </div>
                    </div>
                </div>

                <!-- KANAN: QRIS - SAMA TINGGI -->
                <div class="col-lg-6">
                    <div class="h-100 p-4 border rounded d-flex flex-column" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
                        <h5 class="mb-4 text-success text-center">
                            <i class="bi bi-qr-code"></i> Scan QRIS
                        </h5>

                        <!-- QR Code - CENTERED -->
                        <div class="mb-3 d-flex justify-content-center align-items-center flex-grow-1">
                            <div class="p-3 bg-white border rounded shadow-sm">
                                <img src="{{ asset('images/qris-masjid.png') }}"
                                     alt="QRIS Masjid"
                                     style="width: 220px; height: 220px; object-fit: contain;"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                                <!-- Fallback jika QRIS tidak ada -->
                                <div style="display: none; width: 220px; height: 220px; align-items: center; justify-content: center; background: #f0f0f0; border-radius: 8px; flex-direction: column;">
                                    <i class="bi bi-qr-code" style="font-size: 4rem; color: #ccc;"></i>
                                    <p class="text-muted mt-2 mb-0 small">QRIS Code</p>
                                </div>
                            </div>
                        </div>

                        <!-- Instruksi & Support Payment -->
                        <div class="mt-auto">
                            <div class="alert alert-success mb-3" style="font-size: 0.85rem;">
                                <i class="bi bi-info-circle"></i>
                                <strong>Mudah & Cepat!</strong><br>
                                Scan dengan mobile banking atau e-wallet
                            </div>

                            <!-- Support Payment -->
                            <div class="text-center">
                                <small class="text-muted d-block mb-2">Mendukung:</small>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <span class="badge bg-light text-dark border" style="font-size: 0.7rem;">GoPay</span>
                                    <span class="badge bg-light text-dark border" style="font-size: 0.7rem;">OVO</span>
                                    <span class="badge bg-light text-dark border" style="font-size: 0.7rem;">DANA</span>
                                    <span class="badge bg-light text-dark border" style="font-size: 0.7rem;">ShopeePay</span>
                                    <span class="badge bg-light text-dark border" style="font-size: 0.7rem;">LinkAja</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Tambahan -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="alert alert-info mb-0">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-info-circle me-2" style="font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="alert-heading mb-2">Keutamaan Sedekah</h6>
                                <p class="mb-0 small" style="text-align: justify;">
                                    <em>"Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji. Allah melipatgandakan bagi siapa yang Dia kehendaki..."</em>
                                    <strong>(QS. Al-Baqarah: 261)</strong>
                                </p>
                                <p class="mb-0 mt-2 small">
                                    <i class="bi bi-check-circle-fill text-success"></i> Sedekah Anda akan digunakan untuk kemakmuran masjid, kegiatan dakwah, dan pelayanan kepada jamaah.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Copy Rekening -->
<script>
function copyRekening(event) {
    // Prevent default jika ada
    if (event) event.preventDefault();

    const rekening = '7202200221';

    // Check apakah browser support clipboard API
    if (!navigator.clipboard) {
        // Fallback untuk browser lama
        fallbackCopyRekening(rekening, event);
        return;
    }

    navigator.clipboard.writeText(rekening).then(() => {
        const btn = event ? event.target.closest('button') : document.querySelector('button[onclick*="copyRekening"]');
        if (!btn) return;

        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Tersalin!';
        btn.classList.remove('btn-outline-primary');
        btn.classList.add('btn-success');

        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-primary');
        }, 2000);
    }).catch(err => {
        console.error('Error:', err);
        fallbackCopyRekening(rekening, event);
    });
}

// Fallback method untuk browser yang tidak support clipboard API
function fallbackCopyRekening(text, event) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    textArea.style.position = 'fixed';
    textArea.style.left = '-999999px';
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try {
        const successful = document.execCommand('copy');
        document.body.removeChild(textArea);

        if (successful) {
            const btn = event ? event.target.closest('button') : document.querySelector('button[onclick*="copyRekening"]');
            if (btn) {
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> Tersalin!';
                btn.classList.remove('btn-outline-primary');
                btn.classList.add('btn-success');

                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-outline-primary');
                }, 2000);
            }
        } else {
            alert('Nomor rekening: 7202200221\n\nSilakan salin manual');
        }
    } catch (err) {
        document.body.removeChild(textArea);
        alert('Nomor rekening: 7202200221\n\nSilakan salin manual');
    }
}
</script>

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
