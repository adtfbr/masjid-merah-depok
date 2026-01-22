@echo off
echo ========================================
echo PHASE 3 - DATABASE MIGRATION
echo ========================================
echo.

cd C:\xampp\htdocs\masjid-internal

echo Running migrations...
php artisan migrate

echo.
echo ========================================
echo MIGRATION COMPLETED
echo ========================================
echo.
echo Next steps:
echo 1. Login ke admin panel
echo 2. Input data di menu Konten Website
echo 3. Test halaman public
echo.
pause
