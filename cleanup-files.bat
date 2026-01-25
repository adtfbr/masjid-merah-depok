@echo off
echo ========================================
echo CLEANUP PROJECT FILES
echo ========================================
echo.
echo File-file yang akan dihapus:
echo.
echo [IMAGES - Testing/Temporary]
echo - 1767948090069.jpg
echo - 1767948090089.jpg
echo - 1767948090109.jpg
echo - 1767948090131.jpg
echo.
echo [BATCH FILES - Old Deployment]
echo - deploy-aset-kategori.bat
echo - deploy-phase2.bat
echo - deploy-phase3.bat
echo - deploy-phase4.bat
echo - deploy-revisi-phase3.bat
echo - deploy-rwd-fix.bat
echo - fix-all.bat
echo - fix-aset-direct.bat
echo - fix-aset-manual.bat
echo - fix-aset-migration.bat
echo - fix-cakupan-target.bat
echo - fix-migration.bat
echo - fix-route-error.bat
echo - menu-fix.bat
echo - migrate-kategori-aset.bat
echo - test-aset-system.bat
echo - update-bagan-design.bat
echo - copy-sejarah-photos.bat
echo.
echo [DOCUMENTATION - Old/Redundant]
echo - AUDIT_REPORT_LENGKAP.md
echo - BUG_FIX_CAKUPAN_TARGET.md
echo - FINAL_SUMMARY.md
echo - FLOW_DIAGRAM.md
echo - HERO_SECTION_COMPLETED.md
echo - IMPLEMENTASI_NAVIGASI_COMPLETED.md
echo - IMPLEMENTATION_COMPLETE.md
echo - INDEX_DOKUMENTASI.md
echo - MOBILE_TEST_QUICK.md
echo - NOTES_VIEW.txt
echo - PANDUAN_ASET_KATEGORI.md
echo - PERBAIKAN_FORM_ANGGOTA_SEKSI.md
echo - PERBAIKAN_HERO_FAVICON.md
echo - PERBAIKAN_TESTING_COMPLETED.md
echo - PERUBAHAN_COLOR_PALETTE.md
echo - PHASE4_COMPLETED.md
echo - PHASE4_INTEGRASI_FORM.md
echo - PHASE4_QUICK_TEST.md
echo - PHASE4_SUMMARY_SIMPLE.md
echo - PHASE_2_COMMANDS.md
echo - PHASE_2_COMPLETED.md
echo - PHASE_2_SUMMARY.md
echo - PHASE_3_TESTING_CHECKLIST.md
echo - QUICK_TEST_GUIDE.md
echo - README_QUICK_FIX.md
echo - REVISI_PHASE3_CHECKLIST.md
echo - REVISI_PHASE3_COMPLETED.md
echo - RWD_FIX_COMPLETED.md
echo - RWD_MOBILE_FIX.md
echo - SOLUSI_ERROR_ROUTE.md
echo - SUMMARY_REVISI_PHASE3.md
echo - TESTING_CHECKLIST_REVISI_PHASE3.md
echo - START_HERE.txt
echo.
echo [MISC FILES]
echo - color-palette-preview.html
echo - nama
echo - nama_bidang
echo.
echo ========================================
echo.
pause
echo.
echo Menghapus file...
echo.

REM Delete temporary images
del /F /Q "1767948090069.jpg" 2>nul
del /F /Q "1767948090089.jpg" 2>nul
del /F /Q "1767948090109.jpg" 2>nul
del /F /Q "1767948090131.jpg" 2>nul

REM Delete old batch files
del /F /Q "deploy-aset-kategori.bat" 2>nul
del /F /Q "deploy-phase2.bat" 2>nul
del /F /Q "deploy-phase3.bat" 2>nul
del /F /Q "deploy-phase4.bat" 2>nul
del /F /Q "deploy-revisi-phase3.bat" 2>nul
del /F /Q "deploy-rwd-fix.bat" 2>nul
del /F /Q "fix-all.bat" 2>nul
del /F /Q "fix-aset-direct.bat" 2>nul
del /F /Q "fix-aset-manual.bat" 2>nul
del /F /Q "fix-aset-migration.bat" 2>nul
del /F /Q "fix-cakupan-target.bat" 2>nul
del /F /Q "fix-migration.bat" 2>nul
del /F /Q "fix-route-error.bat" 2>nul
del /F /Q "menu-fix.bat" 2>nul
del /F /Q "migrate-kategori-aset.bat" 2>nul
del /F /Q "test-aset-system.bat" 2>nul
del /F /Q "update-bagan-design.bat" 2>nul
del /F /Q "copy-sejarah-photos.bat" 2>nul

REM Delete old documentation
del /F /Q "AUDIT_REPORT_LENGKAP.md" 2>nul
del /F /Q "BUG_FIX_CAKUPAN_TARGET.md" 2>nul
del /F /Q "FINAL_SUMMARY.md" 2>nul
del /F /Q "FLOW_DIAGRAM.md" 2>nul
del /F /Q "HERO_SECTION_COMPLETED.md" 2>nul
del /F /Q "IMPLEMENTASI_NAVIGASI_COMPLETED.md" 2>nul
del /F /Q "IMPLEMENTATION_COMPLETE.md" 2>nul
del /F /Q "INDEX_DOKUMENTASI.md" 2>nul
del /F /Q "MOBILE_TEST_QUICK.md" 2>nul
del /F /Q "NOTES_VIEW.txt" 2>nul
del /F /Q "PANDUAN_ASET_KATEGORI.md" 2>nul
del /F /Q "PERBAIKAN_FORM_ANGGOTA_SEKSI.md" 2>nul
del /F /Q "PERBAIKAN_HERO_FAVICON.md" 2>nul
del /F /Q "PERBAIKAN_TESTING_COMPLETED.md" 2>nul
del /F /Q "PERUBAHAN_COLOR_PALETTE.md" 2>nul
del /F /Q "PHASE4_COMPLETED.md" 2>nul
del /F /Q "PHASE4_INTEGRASI_FORM.md" 2>nul
del /F /Q "PHASE4_QUICK_TEST.md" 2>nul
del /F /Q "PHASE4_SUMMARY_SIMPLE.md" 2>nul
del /F /Q "PHASE_2_COMMANDS.md" 2>nul
del /F /Q "PHASE_2_COMPLETED.md" 2>nul
del /F /Q "PHASE_2_SUMMARY.md" 2>nul
del /F /Q "PHASE_3_TESTING_CHECKLIST.md" 2>nul
del /F /Q "QUICK_TEST_GUIDE.md" 2>nul
del /F /Q "README_QUICK_FIX.md" 2>nul
del /F /Q "REVISI_PHASE3_CHECKLIST.md" 2>nul
del /F /Q "REVISI_PHASE3_COMPLETED.md" 2>nul
del /F /Q "RWD_FIX_COMPLETED.md" 2>nul
del /F /Q "RWD_MOBILE_FIX.md" 2>nul
del /F /Q "SOLUSI_ERROR_ROUTE.md" 2>nul
del /F /Q "SUMMARY_REVISI_PHASE3.md" 2>nul
del /F /Q "TESTING_CHECKLIST_REVISI_PHASE3.md" 2>nul
del /F /Q "START_HERE.txt" 2>nul

REM Delete misc files
del /F /Q "color-palette-preview.html" 2>nul
del /F /Q "nama" 2>nul
del /F /Q "nama_bidang" 2>nul

echo.
echo ========================================
echo CLEANUP SELESAI!
echo ========================================
echo.
echo File-file yang DIPERTAHANKAN:
echo.
echo [Core Laravel Files]
echo - .env, .env.example
echo - artisan, composer.json, composer.lock
echo - package.json, package-lock.json
echo - vite.config.js, phpunit.xml
echo - .editorconfig, .gitattributes, .gitignore
echo.
echo [Essential Directories]
echo - app/, bootstrap/, config/, database/
echo - public/, resources/, routes/, storage/
echo - tests/, vendor/, node_modules/
echo - foto masjid/
echo.
echo [Current Documentation]
echo - README.md
echo - CHANGELOG.md
echo - REFACTOR_BIDANG_FORM.md
echo - FIX_DROPDOWN_BIDANG_KOSONG.md
echo - FIX_CIRCLE_SIZE_INCONSISTENT.md
echo.
echo [Active Batch Files]
echo - clear-cache.bat
echo - setup-storage.bat
echo - start-server.bat
echo - deploy-simplify-bidang.bat
echo - fix-dropdown-bidang.bat
echo - fix-circle-size.bat
echo.
echo [Assets]
echo - LOGO YMB UPDATE 09-22.png
echo.
echo ========================================
echo.
echo Rekomendasi selanjutnya:
echo 1. Review CHANGELOG.md dan update dengan perubahan terbaru
echo 2. Buat dokumentasi master di README.md
echo 3. Simpan batch files aktif di folder /scripts/
echo.

pause
