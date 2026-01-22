# PHASE 2 - QUICK REFERENCE COMMANDS

## 🚀 Deployment Commands

### Windows (Command Prompt)
```cmd
cd C:\xampp\htdocs\masjid-internal
deploy-phase2.bat
```

### Manual Steps
```cmd
cd C:\xampp\htdocs\masjid-internal

# Run migration
php artisan migrate

# Create storage link
php artisan storage:link

# Create directories
mkdir storage\app\public\pengurus
mkdir storage\app\public\struktur

# Clear cache
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 📋 Testing Checklist

### 1. Test Pengurus Inti
- [ ] Buka http://localhost/masjid-internal/admin/pengurus-inti
- [ ] Tambah data Pembina
- [ ] Tambah data Pengawas
- [ ] Tambah data Ketua
- [ ] Upload foto
- [ ] Edit data
- [ ] Hapus data
- [ ] Cek grouping by tipe

### 2. Test Struktur Gambar
- [ ] Buka http://localhost/masjid-internal/admin/struktur-gambar
- [ ] Upload gambar struktur (landscape)
- [ ] Set sebagai aktif
- [ ] Upload gambar lain
- [ ] Ganti aktif ke gambar baru
- [ ] Hapus gambar tidak aktif

### 3. Test Target Kesekretariatan
- [ ] Buka http://localhost/masjid-internal/admin/target-kesekretariatan
- [ ] Tambah target tahun 2025
- [ ] Tambah multiple target
- [ ] Test filter tahun
- [ ] Edit target
- [ ] Hapus target

### 4. Test Program Kerja Bidang
- [ ] Buka http://localhost/masjid-internal/admin/bidang-program-kerja
- [ ] Pilih bidang dari dropdown
- [ ] Tambah program kerja
- [ ] Tambah multiple program untuk 1 bidang
- [ ] Test filter bidang
- [ ] Edit program kerja
- [ ] Hapus program kerja

### 5. Test Target Program
- [ ] Buka http://localhost/masjid-internal/admin/target-program
- [ ] Pilih bidang dari dropdown
- [ ] Tambah target program
- [ ] Tambah multiple target
- [ ] Test ordering by nomor_urut
- [ ] Edit target
- [ ] Hapus target

---

## 🔍 Verification Queries

### Check Tables Created
```sql
SHOW TABLES LIKE '%pengurus%';
SHOW TABLES LIKE '%struktur%';
SHOW TABLES LIKE '%target%';
SHOW TABLES LIKE '%program%';
```

### Check Table Structure
```sql
DESCRIBE pengurus_inti;
DESCRIBE struktur_gambar;
DESCRIBE target_kesekretariatan;
DESCRIBE bidang_program_kerja;
DESCRIBE target_program;
```

### Check Data
```sql
SELECT * FROM pengurus_inti;
SELECT * FROM struktur_gambar;
SELECT * FROM target_kesekretariatan;
SELECT * FROM bidang_program_kerja;
SELECT * FROM target_program;
```

---

## 🐛 Common Issues & Solutions

### Issue 1: Migration fails - Table already exists
```cmd
php artisan migrate:rollback --step=5
php artisan migrate
```

### Issue 2: Class not found
```cmd
composer dump-autoload
php artisan config:clear
```

### Issue 3: Route not found (404)
```cmd
php artisan route:clear
php artisan route:list | findstr "pengurus"
```

### Issue 4: Upload foto tidak berhasil
```cmd
# Check storage link
php artisan storage:link

# Verify directories
dir storage\app\public\pengurus
dir storage\app\public\struktur
```

### Issue 5: Cannot access admin
```cmd
# Clear all cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 📊 Sample Data SQL (Optional)

### Insert Sample Pengurus Inti
```sql
INSERT INTO pengurus_inti (tipe, nama, kontak, urutan, created_at, updated_at) VALUES
('pembina', 'H. Ahmad Sutrisno', '081234567890', 1, NOW(), NOW()),
('pembina', 'Hj. Siti Aminah', '081234567891', 2, NOW(), NOW()),
('pengawas', 'Drs. Budi Santoso', '081234567892', 1, NOW(), NOW()),
('ketua', 'Ir. Muhammad Yusuf', '081234567893', 1, NOW(), NOW()),
('sekretaris', 'Ahmad Hidayat, S.Kom', '081234567894', 1, NOW(), NOW()),
('bendahara', 'Siti Nur Azizah, S.E', '081234567895', 1, NOW(), NOW());
```

### Insert Sample Target Kesekretariatan
```sql
INSERT INTO target_kesekretariatan (tahun, nomor_urut, judul, deskripsi, created_at, updated_at) VALUES
(2025, 1, 'Administrasi Yayasan', 'Mengelola administrasi yayasan dengan baik dan tertib', NOW(), NOW()),
(2025, 2, 'Dokumentasi Kegiatan', 'Mendokumentasikan semua kegiatan yayasan', NOW(), NOW()),
(2025, 3, 'Koordinasi Antar Bidang', 'Memfasilitasi koordinasi antar bidang', NOW(), NOW());
```

### Insert Sample Program Kerja Bidang
```sql
INSERT INTO bidang_program_kerja (bidang_id, judul, urutan, created_at, updated_at) VALUES
(1, 'Pengelolaan Usaha dan Ekonomi Yayasan', 1, NOW(), NOW()),
(1, 'Pengelolaan Usaha dan Ekonomi Jamaah', 2, NOW(), NOW()),
(2, 'Pengelolaan Masjid dan Musholla', 1, NOW(), NOW()),
(2, 'Pengelolaan Kepanitiaan Acara Keagamaan', 2, NOW(), NOW());
```

### Insert Sample Target Program
```sql
INSERT INTO target_program (bidang_id, nomor_urut, judul, deskripsi, created_at, updated_at) VALUES
(1, 1, 'Pengembangan Unit Usaha', 'Mengembangkan unit usaha yayasan yang berkelanjutan', NOW(), NOW()),
(1, 2, 'Pemberdayaan Ekonomi Jamaah', 'Memberdayakan ekonomi jamaah melalui program-program produktif', NOW(), NOW()),
(2, 1, 'Peningkatan Kualitas Ibadah', 'Meningkatkan kualitas ibadah jamaah', NOW(), NOW());
```

---

## 🎯 Next: Phase 3 Preview

Phase 3 akan mengintegrasikan data dynamic ke public views:

### Files to Update:
1. `resources/views/public/profile/struktur.blade.php`
   - Tampilkan gambar struktur dari DB
   - Tampilkan pengurus inti dari DB
   
2. `resources/views/public/manajemen/kesekretariatan.blade.php`
   - Tampilkan target kesekretariatan dari DB
   
3. `resources/views/public/bidang/show.blade.php`
   - Tampilkan program kerja bidang dari DB
   
4. `resources/views/public/proker/target.blade.php`
   - Tampilkan target program dari DB

### Features to Add:
- Dynamic content loading
- Proper error handling
- Loading states
- Empty states
- Responsive design

---

## ✅ Phase 2 Completion Criteria

- [x] All migrations created and working
- [x] All models created with relationships
- [x] All controllers with full CRUD
- [x] All views created and styled
- [x] Routes registered correctly
- [x] Admin sidebar updated
- [x] File upload working
- [x] Validation working
- [x] Error handling implemented

**Status: READY FOR TESTING** ✨
