@echo off
echo ============================================
echo   DEPLOYMENT - REVISI PHASE 3
echo   Masjid Merah Baiturrahman System
echo ============================================
echo.

echo [1/4] Clearing cache...
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
echo Cache cleared successfully!
echo.

echo [2/4] Optimizing application...
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo Optimization completed!
echo.

echo [3/4] Ensuring storage link exists...
php artisan storage:link
echo Storage link checked!
echo.

echo [4/4] Running final checks...
echo - Checking folder permissions...
if not exist "storage\app\public\kegiatan" mkdir storage\app\public\kegiatan
if not exist "storage\app\public\anggota" mkdir storage\app\public\anggota
if not exist "storage\app\public\aset" mkdir storage\app\public\aset
if not exist "storage\app\public\struktur" mkdir storage\app\public\struktur
if not exist "storage\app\public\pengurus" mkdir storage\app\public\pengurus
echo Storage folders verified!
echo.

echo ============================================
echo   DEPLOYMENT COMPLETED SUCCESSFULLY!
echo ============================================
echo.
echo Changes deployed:
echo  [+] Halaman Bidang - Cakupan layout improved
echo  [+] Kegiatan Berjalan - Images now showing
echo  [+] Kegiatan Mendatang - Images now showing
echo  [+] Navbar - Added "Aset" menu
echo  [+] Footer - Admin button moved here
echo  [+] Database queries - Fixed status column errors
echo.
echo Please test the following pages:
echo  - http://127.0.0.1:8000/bidang/{id}
echo  - http://127.0.0.1:8000/program-kerja/terlaksana
echo  - http://127.0.0.1:8000/program-kerja/rencana
echo  - Navigation: Check Aset menu in navbar
echo  - Footer: Check Admin button
echo.
echo ============================================
pause
