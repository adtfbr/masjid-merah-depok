@echo off
cls
echo ========================================
echo   CLEANUP PROJECT - MASJID INTERNAL
echo ========================================
echo.
echo Menghapus file temporary...
echo.

cd /d C:\xampp\htdocs\masjid-internal

:: Batch files
del /F /Q apply-new-design.bat 2>nul
del /F /Q check-blade-balance.py 2>nul
del /F /Q cleanup-files.bat 2>nul
del /F /Q clear-all-cache.bat 2>nul
del /F /Q clear-cache-simple.bat 2>nul
del /F /Q clear-cache.bat 2>nul
del /F /Q clear-cache.ps1 2>nul
del /F /Q clear-views.php 2>nul
del /F /Q clear_cache.py 2>nul
del /F /Q DELETE-CACHE-NOW.bat 2>nul
del /F /Q deploy-seo.bat 2>nul
del /F /Q deploy-simplify-bidang.bat 2>nul
del /F /Q FINAL-FIX.bat 2>nul
del /F /Q fix-blade-syntax.bat 2>nul
del /F /Q fix-circle-size.bat 2>nul
del /F /Q fix-dropdown-bidang.bat 2>nul
del /F /Q fix-navbar-mobile.bat 2>nul
del /F /Q FIX-NOW.bat 2>nul
del /F /Q QUICK-CLEAR.bat 2>nul
del /F /Q FORCE-DELETE-CACHE.ps1 2>nul
del /F /Q reset-slug-columns.bat 2>nul

:: Documentation
del /F /Q FIX_CIRCLE_SIZE_INCONSISTENT.md 2>nul
del /F /Q FIX_DROPDOWN_BIDANG_KOSONG.md 2>nul
del /F /Q LAPORAN-PERBAIKAN.txt 2>nul
del /F /Q PERBAIKAN-README.txt 2>nul
del /F /Q QUICK-START.txt 2>nul
del /F /Q PROJECT_CLEANUP.md 2>nul
del /F /Q REFACTOR_BIDANG_FORM.md 2>nul
del /F /Q SEO-DEPLOY.txt 2>nul

:: Scripts
del /F /Q generate-slugs.php 2>nul
del /F /Q reset-slug.sql 2>nul
del /F /Q public\emergency-clear.php 2>nul

:: Backup views
del /F /Q resources\views\layouts\public.blade.php.backup 2>nul
del /F /Q resources\views\layouts\public-clean.blade.php 2>nul

echo.
echo ========================================
echo   CLEANUP SELESAI!
echo ========================================
echo.
echo File temporary sudah dihapus!
echo Project sudah bersih!
echo.
pause
