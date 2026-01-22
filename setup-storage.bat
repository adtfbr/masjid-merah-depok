@echo off
echo ========================================
echo SETUP STORAGE DIRECTORIES
echo ========================================
echo.

cd C:\xampp\htdocs\masjid-internal

echo Creating storage link...
php artisan storage:link

echo.
echo Creating upload directories...

if not exist "storage\app\public\pengurus" mkdir "storage\app\public\pengurus"
echo - Created: storage\app\public\pengurus

if not exist "storage\app\public\struktur" mkdir "storage\app\public\struktur"
echo - Created: storage\app\public\struktur

echo.
echo ========================================
echo STORAGE SETUP COMPLETED
echo ========================================
echo.
pause
