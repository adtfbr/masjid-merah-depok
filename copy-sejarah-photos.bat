@echo off
echo ========================================
echo COPY SEJARAH PHOTOS TO PUBLIC
echo ========================================
echo.

cd "C:\xampp\htdocs\masjid-internal"

echo Copying photos...
copy "foto masjid\foto Awal berdiri.jpeg" "public\images\sejarah-awal.jpeg"
copy "foto masjid\foto Perkembangan1.jpg" "public\images\sejarah-perkembangan1.jpg"
copy "foto masjid\foto Perkembangan2.jpeg" "public\images\sejarah-perkembangan2.jpeg"
copy "foto masjid\foto Perkembangan3.jpg" "public\images\sejarah-perkembangan3.jpg"
copy "foto masjid\Foto Masjid saat ini.jpeg" "public\images\sejarah-sekarang.jpeg"

echo.
echo ========================================
echo PHOTOS COPIED SUCCESSFULLY
echo ========================================
echo.
pause
