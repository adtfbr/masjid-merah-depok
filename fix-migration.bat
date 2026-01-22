@echo off
echo ========================================
echo FIX MIGRATION ERROR
echo ========================================
echo.

cd C:\xampp\htdocs\masjid-internal

echo Rolling back failed migration...
php artisan migrate:rollback --step=1

echo.
echo Running migration again...
php artisan migrate

echo.
echo ========================================
echo MIGRATION FIXED
echo ========================================
echo.
pause
