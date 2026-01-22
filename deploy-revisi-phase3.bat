@echo off
echo ========================================
echo DEPLOYMENT - REVISI PHASE 3
echo ========================================
echo.

cd C:\xampp\htdocs\masjid-internal

echo Step 1: Copy sejarah photos...
call copy-sejarah-photos.bat

echo.
echo Step 2: Run migrations...
php artisan migrate

echo.
echo Step 3: Clear cache...
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo.
echo ========================================
echo DEPLOYMENT COMPLETED
echo ========================================
echo.
echo REVISI YANG SUDAH SELESAI:
echo [X] Halaman Sejarah - Foto asli
echo [X] Hero Section - Text center semua
echo [X] Struktur Kepengurusan - Hanya bagan
echo [X] Kesekretariatan - Profil pengurus
echo [X] Bidang Show - Grouping by seksi
echo [X] Database - Field seksi + urutan
echo [X] Admin - Rename Pengurus Inti jadi Kesekretariatan
echo [X] Admin - Hapus tipe pembina + pengawas
echo.
echo YANG MASIH PERLU DIKERJAKAN:
echo [ ] Update Navbar Public - Tambah Aset, hapus tombol Admin
echo [ ] Update Footer - Tambah tombol Admin
echo [ ] Update Controller - Untuk halaman Aset public
echo [ ] Test semua halaman
echo.
pause
