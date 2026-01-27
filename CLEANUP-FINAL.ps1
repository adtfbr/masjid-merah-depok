# CLEANUP SCRIPT - MASJID INTERNAL
# Menghapus semua file temporary dan backup

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  CLEANUP PROJECT FILES" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

$basePath = "C:\xampp\htdocs\masjid-internal"
Set-Location $basePath

# Daftar file yang akan dihapus
$filesToDelete = @(
    # Batch files
    "apply-new-design.bat",
    "check-blade-balance.py",
    "cleanup-files.bat",
    "clear-all-cache.bat",
    "clear-cache-simple.bat",
    "clear-cache.bat",
    "clear-cache.ps1",
    "clear-views.php",
    "clear_cache.py",
    "DELETE-CACHE-NOW.bat",
    "deploy-seo.bat",
    "deploy-simplify-bidang.bat",
    "FINAL-FIX.bat",
    "fix-blade-syntax.bat",
    "fix-circle-size.bat",
    "fix-dropdown-bidang.bat",
    "fix-navbar-mobile.bat",
    "FIX-NOW.bat",
    "QUICK-CLEAR.bat",
    "FORCE-DELETE-CACHE.ps1",
    "reset-slug-columns.bat",
    
    # Documentation files
    "FIX_CIRCLE_SIZE_INCONSISTENT.md",
    "FIX_DROPDOWN_BIDANG_KOSONG.md",
    "LAPORAN-PERBAIKAN.txt",
    "PERBAIKAN-README.txt",
    "QUICK-START.txt",
    "PROJECT_CLEANUP.md",
    "REFACTOR_BIDANG_FORM.md",
    "SEO-DEPLOY.txt",
    
    # Temporary scripts
    "generate-slugs.php",
    "reset-slug.sql",
    "public\emergency-clear.php",
    
    # Backup views
    "resources\views\layouts\public.blade.php.backup",
    "resources\views\layouts\public-clean.blade.php"
)

$deletedCount = 0
$notFoundCount = 0

Write-Host "Menghapus file..." -ForegroundColor Yellow
Write-Host ""

foreach ($file in $filesToDelete) {
    $fullPath = Join-Path $basePath $file
    if (Test-Path $fullPath) {
        try {
            Remove-Item $fullPath -Force -ErrorAction Stop
            Write-Host "[OK] $file" -ForegroundColor Green
            $deletedCount++
        }
        catch {
            Write-Host "[GAGAL] $file - $($_.Exception.Message)" -ForegroundColor Red
        }
    }
    else {
        Write-Host "[SKIP] $file (tidak ada)" -ForegroundColor Gray
        $notFoundCount++
    }
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  CLEANUP SELESAI!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Statistik:" -ForegroundColor Yellow
Write-Host "  - File terhapus: $deletedCount" -ForegroundColor Green
Write-Host "  - File tidak ada: $notFoundCount" -ForegroundColor Gray
Write-Host ""
Write-Host "Project sudah bersih!" -ForegroundColor Green
Write-Host ""

Read-Host "Tekan Enter untuk keluar"
