@echo off
cls
echo ========================================
echo FIX NAVBAR MOBILE TRANSPARENCY
echo ========================================
echo.

cd C:\xampp\htdocs\masjid-internal

echo [1/2] Clearing cache...
php artisan view:clear
php artisan cache:clear

echo.
echo [2/2] Starting server...
echo.
echo ========================================
echo Server running at: http://127.0.0.1:8000
echo.
echo Test di browser mobile atau resize browser
echo ========================================
echo.

php artisan serve
