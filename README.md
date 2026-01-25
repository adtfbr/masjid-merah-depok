# 🕌 Sistem Informasi Masjid Merah Baiturrahman

> Sistem manajemen internal untuk Masjid Merah Baiturrahman - mengelola bidang, kegiatan, keuangan, aset, dan program kerja secara terintegrasi.

[![Laravel](https://img.shields.io/badge/Laravel-12.46-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2.12-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-Proprietary-yellow.svg)]()

---

## 📋 Daftar Isi

- [Tentang Sistem](#-tentang-sistem)
- [Fitur Utama](#-fitur-utama)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi](#️-konfigurasi)
- [Penggunaan](#-penggunaan)
- [Struktur Project](#-struktur-project)
- [Dokumentasi](#-dokumentasi)
- [Troubleshooting](#-troubleshooting)
- [Changelog](#-changelog)

---

## 🎯 Tentang Sistem

Sistem Informasi Masjid Merah Baiturrahman adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola seluruh aspek operasional masjid, mulai dari manajemen organisasi, program kerja, kegiatan, keuangan, hingga aset masjid.

### Tujuan
- Meningkatkan efisiensi pengelolaan masjid
- Transparansi laporan keuangan dan kegiatan
- Kemudahan akses informasi bagi jamaah
- Dokumentasi digital seluruh kegiatan masjid

---

## ✨ Fitur Utama

### 🏛️ Manajemen Organisasi
- **Bidang & Struktur**: Kelola bidang-bidang organisasi dengan struktur hierarki
- **Pengurus Inti**: Manajemen ketua, wakil, sekretaris, bendahara
- **Anggota Bidang**: Kelola anggota per bidang dengan foto dan jabatan
- **Bagan Organisasi**: Visualisasi struktur organisasi otomatis

### 📊 Program Kerja & Target
- **Program Kerja Bidang**: Cakupan program kerja per bidang
- **Target Program**: Target strategis jangka panjang
- **Target Kesekretariatan**: Target khusus untuk kesekretariatan
- **Tracking Progress**: Monitor pencapaian target

### 📅 Manajemen Kegiatan
- **Daftar Kegiatan**: CRUD kegiatan dengan detail lengkap
- **Status Tracking**: Rencana, Berlangsung, Selesai, Dibatalkan
- **Filter & Search**: Cari berdasarkan bidang, status, tanggal
- **Galeri Foto**: Upload multiple foto per kegiatan

### 💰 Sistem Keuangan
- **Akun Keuangan**: Chart of accounts (Aset, Liabilitas, Ekuitas, Pendapatan, Beban)
- **Transaksi**: Pemasukan dan pengeluaran dengan bukti
- **Laporan**: Laporan keuangan per periode dan per bidang
- **Dashboard**: Visualisasi keuangan real-time

### 🏢 Manajemen Aset
- **Kategori Aset**: Elektronik, Furnitur, Kendaraan, dll dengan foto
- **Daftar Aset**: Inventaris lengkap dengan kondisi
- **Tracking Kondisi**: Baik, Cukup, Rusak
- **Public View**: Transparansi aset untuk jamaah

### 🌐 Website Public
- **Homepage**: Hero section dengan info masjid
- **Profil**: Sejarah, visi-misi, struktur organisasi
- **Program Kerja**: Rencana kerja, target, kegiatan terlaksana
- **Kegiatan**: Gallery kegiatan dengan filter
- **Keuangan**: Laporan keuangan transparan
- **Aset**: Daftar aset masjid
- **Kontak**: Informasi kontak dan lokasi

### 📱 Fitur Tambahan
- **Activity Log**: Audit trail semua aktivitas admin
- **Responsive Design**: Mobile-friendly interface
- **Search & Filter**: Advanced filtering di semua modul
- **Upload Management**: Sistem upload file terintegrasi
- **Cache Management**: Optimisasi performa

---

## 💻 Persyaratan Sistem

### Server Requirements
- PHP >= 8.2
- MySQL >= 5.7 atau MariaDB >= 10.3
- Composer >= 2.0
- Node.js >= 16.x & NPM >= 8.x

### PHP Extensions
- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- JSON
- BCMath
- Fileinfo
- GD (untuk image processing)

### Recommended
- XAMPP 8.2.12 (sudah include semua requirements)

---

## 🚀 Instalasi

### 1. Clone Repository
```bash
cd C:\xampp\htdocs
git clone [repository-url] masjid-internal
cd masjid-internal
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
```bash
# Buat database MySQL
# Nama: masjid_internal

# Edit .env
DB_DATABASE=masjid_internal
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate

# (Optional) Seed data
php artisan db:seed
```

### 5. Storage Setup
```bash
# Setup storage link
setup-storage.bat

# Atau manual:
php artisan storage:link
```

### 6. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 7. Start Server
```bash
# Menggunakan script
start-server.bat

# Atau manual:
php artisan serve
```

### 8. Access Application
```
Admin: http://127.0.0.1:8000/admin
Public: http://127.0.0.1:8000
```

---

## ⚙️ Konfigurasi

### Database
Edit `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=masjid_internal
DB_USERNAME=root
DB_PASSWORD=
```

### Mail (Optional)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Storage
```env
FILESYSTEM_DISK=public
```

---

## 📖 Penggunaan

### Login Admin
```
URL: http://127.0.0.1:8000/admin
Default: admin@masjid.com / password123
```

### Quick Actions

#### Tambah Bidang Baru
1. Menu: Manajemen Bidang → Bidang
2. Klik "Tambah Bidang"
3. Isi nama dan deskripsi
4. Simpan
5. Tambahkan Program Kerja di menu "Program Kerja Bidang"
6. Tambahkan Target di menu "Target Program"

#### Tambah Kegiatan
1. Menu: Kegiatan
2. Klik "Tambah Kegiatan"
3. Pilih bidang, isi detail
4. Upload foto (optional)
5. Simpan

#### Input Transaksi Keuangan
1. Menu: Keuangan → Transaksi
2. Klik "Tambah Transaksi"
3. Pilih tipe (Pemasukan/Pengeluaran)
4. Pilih akun keuangan
5. Isi nominal dan keterangan
6. Upload bukti (optional)
7. Simpan

#### Manajemen Aset
1. Menu: Aset → Kategori Aset
2. Tambah kategori dengan foto
3. Menu: Aset → Daftar Aset
4. Tambah aset dengan memilih kategori
5. Set kondisi aset

---

## 📁 Struktur Project

```
masjid-internal/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── BidangController.php
│   │       ├── KegiatanController.php
│   │       ├── TransaksiKeuanganController.php
│   │       ├── AsetController.php
│   │       └── ...
│   ├── Models/
│   │   ├── Bidang.php
│   │   ├── Kegiatan.php
│   │   ├── TransaksiKeuangan.php
│   │   └── ...
│   └── Helpers/
│       └── helpers.php
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── storage/ (symlink)
│   └── assets/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── admin.blade.php
│   │   │   └── public.blade.php
│   │   ├── bidang/
│   │   ├── kegiatan/
│   │   ├── transaksi/
│   │   ├── aset/
│   │   └── public/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
├── storage/
│   └── app/
│       └── public/
│           ├── aset/
│           ├── kegiatan/
│           ├── struktur/
│           └── sejarah/
├── scripts/ (utilities)
│   ├── clear-cache.bat
│   ├── setup-storage.bat
│   └── start-server.bat
└── docs/
    ├── README.md
    ├── CHANGELOG.md
    └── ...
```

---

## 📚 Dokumentasi

### Dokumentasi Tersedia

#### Refactoring & Improvements
- **REFACTOR_BIDANG_FORM.md** - Penyederhanaan form bidang, menghapus duplikasi input

#### Bug Fixes
- **FIX_DROPDOWN_BIDANG_KOSONG.md** - Fix dropdown dan kolom bidang yang kosong
- **FIX_CIRCLE_SIZE_INCONSISTENT.md** - Fix ukuran circle nomor urut yang tidak konsisten

#### Project Management
- **CHANGELOG.md** - Riwayat perubahan sistem
- **PROJECT_CLEANUP.md** - Dokumentasi cleanup project files

### Scripts & Utilities

#### Active Batch Files
```bash
clear-cache.bat              # Clear all Laravel cache
setup-storage.bat            # Setup storage symlink
start-server.bat             # Start development server
deploy-simplify-bidang.bat   # Deploy bidang form simplification
fix-dropdown-bidang.bat      # Fix dropdown bidang kosong
fix-circle-size.bat          # Fix circle size inconsistency
```

---

## 🔧 Troubleshooting

### Cache Issues
```bash
# Clear all cache
clear-cache.bat

# Atau manual:
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Storage Link Issues
```bash
# Recreate storage link
php artisan storage:link

# Atau gunakan script:
setup-storage.bat
```

### Migration Issues
```bash
# Fresh migrate (WARNING: hapus semua data)
php artisan migrate:fresh

# Rollback dan migrate ulang
php artisan migrate:rollback
php artisan migrate
```

### Permission Issues (Linux/Mac)
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

### Composer Issues
```bash
# Update composer
composer self-update

# Clear composer cache
composer clear-cache

# Reinstall dependencies
composer install --no-cache
```

---

## 📝 Changelog

### [2026-01-25] - Simplification & Fixes

#### Refactoring
- ✅ Menghapus duplikasi input Cakupan dan Target dari form Bidang
- ✅ Memisahkan concern: Bidang, Program Kerja, dan Target Program
- ✅ Menambah navigasi cepat di halaman edit bidang
- ✅ Menampilkan preview Program Kerja dan Target di detail bidang

#### Bug Fixes
- ✅ Fix dropdown filter bidang yang menampilkan nilai kosong
- ✅ Fix kolom bidang di tabel yang kosong
- ✅ Fix field name mismatch (nama → nama_bidang)
- ✅ Fix field urutan → nomor_urut
- ✅ Fix ukuran circle nomor urut yang tidak konsisten
- ✅ Standarisasi ukuran circle menjadi 48x48px
- ✅ Perbaikan flexbox structure untuk circle

#### Project Cleanup
- ✅ Menghapus 56 file yang tidak diperlukan
- ✅ Cleanup temporary images (4 files)
- ✅ Cleanup old batch files (18 files)
- ✅ Cleanup old documentation (31 files)
- ✅ Cleanup miscellaneous files (3 files)
- ✅ Organisasi dokumentasi yang lebih baik

### [2026-01-24] - Kategori Aset System
- ✅ Implementasi tabel kategori_aset
- ✅ Relasi aset dengan kategori
- ✅ CRUD kategori dengan upload foto
- ✅ Public view kategori & aset
- ✅ Fix routing errors
- ✅ Dokumentasi lengkap

### [2025-12] - Initial Development
- ✅ Setup Laravel project
- ✅ Implementasi manajemen bidang
- ✅ Implementasi manajemen kegiatan
- ✅ Implementasi sistem keuangan
- ✅ Implementasi website public
- ✅ Responsive design
- ✅ Activity logging

---

## 👥 Tim Development

- **Developer**: [Your Name]
- **Organization**: Masjid Merah Baiturrahman
- **Contact**: [Email/Phone]

---

## 📄 License

Proprietary - © 2026 Masjid Merah Baiturrahman

---

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap UI Framework
- Bootstrap Icons
- Chart.js for visualizations
- All contributors and testers

---

## 📞 Support

Untuk bantuan dan support:
- Email: [support@email.com]
- Phone: [phone number]
- Documentation: Lihat folder `/docs`

---

**Last Updated**: 25 Januari 2026  
**Version**: 1.5.0  
**Status**: Production Ready ✅

---

💚 **Built with ❤️ for Masjid Merah Baiturrahman**
