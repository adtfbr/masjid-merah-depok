@echo off
echo ================================
echo  PHASE 2 - DATABASE MIGRATION
echo ================================
echo.

cd /d C:\xampp\htdocs\masjid-internal

echo [1/4] Running migrations...
php artisan migrate

echo.
echo [2/4] Creating storage link...
php artisan storage:link

echo.
echo [3/4] Creating upload directories...
if not exist "storage\app\public\pengurus" mkdir "storage\app\public\pengurus"
if not exist "storage\app\public\struktur" mkdir "storage\app\public\struktur"

echo.
echo [4/4] Clearing cache...
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo.
echo ================================
echo  MIGRATION COMPLETED!
echo ================================
echo.
echo You can now access:
echo - Admin Panel: http://localhost/masjid-internal/admin
echo - Pengurus Inti: http://localhost/masjid-internal/admin/pengurus-inti
echo - Struktur Gambar: http://localhost/masjid-internal/admin/struktur-gambar
echo - Target Kesekretariatan: http://localhost/masjid-internal/admin/target-kesekretariatan
echo - Program Kerja Bidang: http://localhost/masjid-internal/admin/bidang-program-kerja
echo - Target Program: http://localhost/masjid-internal/admin/target-program
echo.

pause
