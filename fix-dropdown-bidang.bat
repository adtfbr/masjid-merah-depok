@echo off
echo ========================================
echo FIX: Dropdown Bidang Kosong
echo ========================================
echo.
echo Masalah yang diperbaiki:
echo - Dropdown filter bidang kosong/putih
echo - Kolom bidang di tabel kosong/putih  
echo - Kolom urutan menggunakan field yang salah
echo.
echo Penyebab:
echo - View menggunakan $bidang->nama
echo - Seharusnya $bidang->nama_bidang
echo - Field urutan menggunakan "urutan" bukan "nomor_urut"
echo.
echo ========================================
echo.

echo [1/3] Clearing cache...
php artisan cache:clear
php artisan config:clear
php artisan view:clear

echo.
echo [2/3] Optimizing views...
php artisan view:cache

echo.
echo [3/3] Verification...
echo File yang diperbaiki:
echo - resources/views/bidang-program-kerja/index.blade.php
echo - resources/views/target-program/index.blade.php
echo.

echo ========================================
echo FIX SELESAI!
echo ========================================
echo.
echo Silakan test:
echo 1. Buka halaman Program Kerja Bidang
echo 2. Dropdown filter sekarang menampilkan nama bidang
echo 3. Kolom Bidang di tabel menampilkan nama bidang
echo 4. Kolom Urutan menampilkan nomor urut
echo.
echo 5. Buka halaman Target Program  
echo 6. Dropdown filter sekarang menampilkan nama bidang
echo 7. Kolom Bidang di tabel menampilkan nama bidang
echo.

pause
