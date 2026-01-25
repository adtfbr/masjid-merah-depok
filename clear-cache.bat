@echo off
cls
echo ========================================
echo QUICK FIX - CLEAR ALL CACHE
echo ========================================
echo.

cd C:\xampp\htdocs\masjid-internal

echo Clearing config cache...
php artisan config:clear

echo Clearing route cache...
php artisan route:clear

echo Clearing view cache...
php artisan view:clear

echo Clearing application cache...
php artisan cache:clear

echo.
echo ========================================
echo DONE! All cache cleared successfully
echo ========================================
echo.
echo Now restart your server with:
echo   php artisan serve
echo.
echo Or run: start-server.bat
echo.
pause
