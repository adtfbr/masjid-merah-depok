@echo off
echo ========================================
echo FIX: Ukuran Circle Target Program
echo ========================================
echo.
echo Masalah yang diperbaiki:
echo - Ukuran circle angka nomor urut tidak konsisten
echo - Circle terlihat tidak sama rata
echo.
echo Solusi:
echo - Menggunakan ukuran fixed yang konsisten (48x48px)
echo - Menggunakan flexbox yang lebih baik
echo - Menambahkan min-width untuk mencegah shrinking
echo.
echo ========================================
echo.

echo [1/2] Clearing cache...
php artisan cache:clear
php artisan view:clear

echo.
echo [2/2] Optimizing views...
php artisan view:cache

echo.
echo ========================================
echo FIX SELESAI!
echo ========================================
echo.
echo File yang diperbaiki:
echo 1. resources/views/public/proker/target.blade.php
echo 2. resources/views/public/bidang/show.blade.php
echo.
echo Perubahan:
echo - Circle sekarang berukuran 48x48px (konsisten)
echo - Menggunakan min-width untuk mencegah shrinking
echo - Font size disesuaikan menjadi 1.25rem
echo - Layout menggunakan flexbox yang proper
echo.
echo Silakan test di:
echo - Halaman Target Program (menu Program Kerja)
echo - Halaman Detail Bidang (click nama bidang)
echo.

pause
