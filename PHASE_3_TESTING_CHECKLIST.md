# PHASE 3 IMPLEMENTATION - TESTING CHECKLIST

## 📋 LANGKAH DEPLOYMENT

### 1. Database Migration
- [ ] Run `deploy-phase3.bat` untuk migrate database
- [ ] Verifikasi 5 tabel baru sudah dibuat
- [ ] Cek tidak ada error migration

### 2. Storage Setup
- [ ] Run `setup-storage.bat` untuk setup storage
- [ ] Verifikasi folder `storage/app/public/pengurus` dibuat
- [ ] Verifikasi folder `storage/app/public/struktur` dibuat
- [ ] Verifikasi symlink `public/storage` ada

### 3. Test Admin CRUD

#### A. Pengurus Inti
- [ ] Akses menu "Pengurus Inti" di admin
- [ ] Test CREATE untuk setiap tipe:
  - [ ] Pembina
  - [ ] Pengawas
  - [ ] Ketua
  - [ ] Sekretaris
  - [ ] Bendahara
- [ ] Test UPLOAD foto (JPG/PNG max 2MB)
- [ ] Test EDIT data
- [ ] Test DELETE data
- [ ] Verifikasi foto ter-upload ke `storage/app/public/pengurus`

#### B. Struktur Gambar
- [ ] Akses menu "Struktur Gambar"
- [ ] Test UPLOAD gambar struktur organisasi
- [ ] Test SET ACTIVE (hanya 1 yang aktif)
- [ ] Test DELETE gambar
- [ ] Verifikasi gambar ter-upload ke `storage/app/public/struktur`

#### C. Target Kesekretariatan
- [ ] Akses menu "Target Kesekretariatan"
- [ ] Test CREATE target untuk tahun 2026
- [ ] Test CREATE target untuk tahun 2027
- [ ] Test EDIT target
- [ ] Test DELETE target
- [ ] Test FILTER by tahun

#### D. Program Kerja Bidang
- [ ] Akses menu "Program Kerja Bidang"
- [ ] Test CREATE program untuk Bidang Kemasjidan (ID 2)
- [ ] Test CREATE program untuk Bidang Usaha & Ekonomi (ID 1)
- [ ] Test CREATE program untuk bidang lainnya
- [ ] Test FILTER by bidang
- [ ] Test EDIT program
- [ ] Test DELETE program

#### E. Target Program
- [ ] Akses menu "Target Program"
- [ ] Test CREATE target untuk berbagai bidang
- [ ] Test FILTER by bidang
- [ ] Test EDIT target
- [ ] Test DELETE target

### 4. Test Public Views

#### A. Struktur Kepengurusan (`/profile/struktur`)
- [ ] Hero section muncul
- [ ] Gambar struktur organisasi muncul (jika sudah diupload)
- [ ] Section Dewan Pembina muncul dengan data dari database
- [ ] Section Dewan Pengawas muncul dengan data dari database
- [ ] Section Pengurus Inti (Ketua, Sekretaris, Bendahara) muncul
- [ ] Foto pengurus tampil dengan benar
- [ ] Jika belum ada data, tampil message yang sesuai
- [ ] Section bidang tetap muncul seperti biasa

#### B. Kesekretariatan (`/manajemen/kesekretariatan`)
- [ ] Hero section muncul
- [ ] Fungsi Kesekretariatan tampil
- [ ] Filter tahun muncul (jika ada >1 tahun)
- [ ] Target kerja tampil sesuai tahun yang dipilih
- [ ] Ganti tahun via filter, data berubah
- [ ] Jika belum ada data tahun tertentu, tampil message yang sesuai

#### C. Halaman Bidang (`/bidang/{id}`)
- [ ] Hero section muncul
- [ ] Tentang Bidang tampil
- [ ] Cakupan & Program Kerja tampil dari database (dynamic)
- [ ] Section Target Program muncul (jika ada)
- [ ] Anggota bidang tampil seperti biasa

#### D. Target Program (`/proker/target`)
- [ ] Hero section muncul
- [ ] Intro card muncul
- [ ] Target program per bidang tampil
- [ ] Hanya bidang yang punya target yang muncul
- [ ] Jika belum ada target sama sekali, tampil message
- [ ] Call to action muncul

### 5. Test Data Relationship
- [ ] Create Target Program untuk Bidang Kemasjidan
- [ ] Akses `/bidang/2`, verifikasi target muncul
- [ ] Delete bidang, verifikasi target juga terhapus (CASCADE)
- [ ] Create Program Kerja untuk bidang
- [ ] Akses halaman bidang, verifikasi program kerja muncul

### 6. Test Upload & Delete
- [ ] Upload foto pengurus, cek file di `storage/app/public/pengurus`
- [ ] Update foto pengurus, cek foto lama terhapus
- [ ] Delete pengurus, cek foto ikut terhapus
- [ ] Upload gambar struktur, cek file di `storage/app/public/struktur`
- [ ] Delete gambar struktur, cek file ikut terhapus

### 7. Test Edge Cases
- [ ] Akses halaman public tanpa data apapun di database
- [ ] Upload file selain gambar (harus error)
- [ ] Upload gambar > 5MB untuk struktur (harus error)
- [ ] Upload gambar > 2MB untuk foto pengurus (harus error)
- [ ] Input tahun dengan format salah di Target Kesekretariatan
- [ ] Set multiple gambar struktur sebagai aktif (hanya 1 yang boleh)

## ✅ VERIFICATION CHECKLIST

### Database
- [ ] Tabel `pengurus_inti` ada
- [ ] Tabel `struktur_gambar` ada
- [ ] Tabel `target_kesekretariatan` ada
- [ ] Tabel `bidang_program_kerja` ada
- [ ] Tabel `target_program` ada

### Files
- [ ] Controller files ada (5 files)
- [ ] Model files ada (5 files)
- [ ] View files ada (14 files)
- [ ] Routes terdaftar di `web.php`
- [ ] Menu sidebar admin updated

### Storage
- [ ] Symlink `public/storage` → `storage/app/public`
- [ ] Folder `storage/app/public/pengurus` ada
- [ ] Folder `storage/app/public/struktur` ada

### Public Views
- [ ] `resources/views/public/profile/struktur.blade.php` updated
- [ ] `resources/views/public/manajemen/kesekretariatan.blade.php` updated
- [ ] `resources/views/public/bidang/show.blade.php` updated
- [ ] `resources/views/public/proker/target.blade.php` updated

## 🐛 COMMON ISSUES & SOLUTIONS

### Error: Class not found
```bash
composer dump-autoload
```

### Error: Storage link not found
```bash
php artisan storage:link
```

### Error: Permission denied (Linux/Mac)
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Error: Migration already exists
```bash
php artisan migrate:fresh
# HATI-HATI: Ini akan menghapus semua data!
```

### Error: File upload failed
- Cek `upload_max_filesize` di `php.ini`
- Cek `post_max_size` di `php.ini`
- Cek permissions folder storage

## 📊 DUMMY DATA SUGGESTIONS

### Pengurus Inti
- Pembina: 2-3 orang
- Pengawas: 2-3 orang
- Ketua: 1 orang
- Sekretaris: 1 orang
- Bendahara: 1 orang

### Target Kesekretariatan
- Tahun 2026: 6 target
- Tahun 2027: 6 target

### Program Kerja Bidang
- Setiap bidang: 5-7 program kerja

### Target Program
- Setiap bidang: 3-5 target

## 🎯 SUCCESS CRITERIA

✅ Phase 3 dianggap berhasil jika:
1. Semua migration sukses tanpa error
2. CRUD di admin berfungsi untuk semua modul
3. Upload foto/gambar berfungsi
4. Halaman public menampilkan data dynamic
5. Filter dan sorting bekerja
6. Tidak ada hardcoded data lagi di view

## 📝 NOTES

- Jika ada error, cek di `storage/logs/laravel.log`
- Pastikan sudah login sebagai admin sebelum test CRUD
- Untuk production, jangan lupa backup database sebelum migrate
- Test di multiple browser (Chrome, Firefox, Edge)
