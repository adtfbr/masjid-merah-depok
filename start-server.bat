@echo off
echo ========================================
echo CLEAR CACHE DAN START SERVER
echo ========================================
echo.

cd C:\xampp\htdocs\masjid-internal

echo Membersihkan cache...
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo.
echo Cache berhasil dibersihkan!
echo.
echo Starting development server...
echo Server berjalan di http://127.0.0.1:8000
echo Press Ctrl+C to stop
echo.

php artisan serve

pause
