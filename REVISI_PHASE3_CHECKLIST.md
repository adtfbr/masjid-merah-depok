# REVISI PHASE 3 - IMPLEMENTATION CHECKLIST

## ✅ SUDAH SELESAI

### 1. Halaman Sejarah Masjid
- [x] Copy foto dari `foto masjid/` ke `public/images/`
- [x] Update sejarah.blade.php dengan foto asli
- [x] Layout selang-seling: Gambar-Teks-Gambar-Teks
- [x] 5 sections: Awal berdiri, Perkembangan 1, Renovasi, Modernisasi, Sekarang
- [x] Timeline summary di akhir

### 2. Hero Section
- [x] Fix sejarah.blade.php
- [x] Fix visi-misi.blade.php
- [x] Fix struktur.blade.php
- [x] Fix kesekretariatan.blade.php
- [x] Fix bidang/show.blade.php
- [x] Fix proker/terlaksana.blade.php
- [x] Fix proker/rencana.blade.php
- [x] Semua menggunakan format: text-center, h1 display-4, p lead

### 3. Struktur Kepengurusan
- [x] Update struktur.blade.php - Hanya tampilkan bagan struktur organisasi
- [x] Hapus section Dewan Pembina/Pengawas
- [x] Hapus section Pengurus Inti
- [x] Hapus section list anggota bidang

### 4. Halaman Kesekretariatan
- [x] Tambah section Profil Pengurus
- [x] Layout: Ketua di atas (lebih besar), Sekre & Bendahara di bawah
- [x] Update PublicController - load ketua, sekretaris, bendahara
- [x] Responsive design

### 5. Database - Field Seksi
- [x] Migration: tambah field `seksi` (varchar 100) di anggota_bidangs
- [x] Migration: tambah field `urutan` (integer) di anggota_bidangs
- [x] Update Model AnggotaBidang - tambah fillable seksi, urutan
- [x] Tambah scope: seksi(), ordered(), ketuaBidang()

### 6. Halaman Bidang (Grouping by Seksi)
- [x] Update bidang/show.blade.php
- [x] Layout: Ketua Bidang di atas (lebih besar)
- [x] Anggota dikelompokkan per Seksi dengan header
- [x] Update PublicController::showBidang()
- [x] Grouping: ketuaBidang, anggotaBySeksi

### 7. Admin Dashboard - Rename & Cleanup
- [x] Migration: hapus data pembina & pengawas
- [x] Migration: ubah ENUM tipe jadi (ketua, sekretaris, bendahara)
- [x] Update PengurusIntiController - validation tipe
- [x] Update Model PengurusInti - getTipeLabelAttribute
- [x] Update create.blade.php - hapus option pembina/pengawas
- [x] Update edit.blade.php - hapus option pembina/pengawas
- [x] Rename title: "Pengurus Inti" → "Kesekretariatan"
- [x] Update sidebar admin: "Pengurus Inti" → "Kesekretariatan"

---

## 🔄 MASIH DALAM PROGRESS

### 8. Update Navbar Public
**BELUM:** Navbar masih memiliki tombol "Admin" dan belum ada menu "Aset"

**Yang Perlu Dikerjakan:**
- [ ] Update layouts/public.blade.php navbar
- [ ] Tambah menu "Aset" setelah "Program Kerja"
- [ ] Hapus tombol "Admin" dari navbar
- [ ] Struktur baru: Beranda | Profile▼ | Manajemen Utama▼ | Manajemen Bidang▼ | Program Kerja▼ | Aset | Kontak

### 9. Update Footer Public
**BELUM:** Footer belum ada tombol login admin

**Yang Perlu Dikerjakan:**
- [ ] Update layouts/public.blade.php footer
- [ ] Tambah section "Admin" dengan tombol/link ke login
- [ ] Design yang sesuai dengan footer existing

### 10. Halaman Aset Public
**BELUM:** Halaman aset public belum dibuat

**Yang Perlu Dikerjakan:**
- [ ] Buat view: `resources/views/public/aset.blade.php`
- [ ] Hero section dengan h1 center
- [ ] Grid cards untuk menampilkan aset
- [ ] Informasi: foto, nama, nilai, kondisi
- [ ] Summary: Total Aset, Total Nilai

**Controller sudah ada:** `PublicController::aset()` sudah ada dan berfungsi

---

## 📁 FILES YANG SUDAH DIMODIFIKASI

### Views Updated:
1. resources/views/public/profile/sejarah.blade.php ✅
2. resources/views/public/profile/visi-misi.blade.php ✅
3. resources/views/public/profile/struktur.blade.php ✅
4. resources/views/public/manajemen/kesekretariatan.blade.php ✅
5. resources/views/public/bidang/show.blade.php ✅
6. resources/views/public/proker/terlaksana.blade.php ✅
7. resources/views/public/proker/rencana.blade.php ✅
8. resources/views/pengurus-inti/create.blade.php ✅
9. resources/views/pengurus-inti/edit.blade.php ✅
10. resources/views/layouts/admin.blade.php ✅

### Controllers Updated:
1. app/Http/Controllers/PublicController.php ✅
   - kesekretariatan() - load pengurus
   - showBidang() - grouping by seksi
2. app/Http/Controllers/PengurusIntiController.php ✅
   - store() validation
   - update() validation

### Models Updated:
1. app/Models/AnggotaBidang.php ✅
   - Tambah fillable: seksi, urutan
   - Tambah scope: seksi(), ordered(), ketuaBidang()
2. app/Models/PengurusInti.php ✅
   - Update getTipeLabelAttribute()

### Migrations Created:
1. 2024_01_01_000017_add_seksi_to_anggota_bidangs_table.php ✅
2. 2024_01_01_000018_remove_pembina_pengawas_from_pengurus_inti.php ✅

### Batch Files Created:
1. copy-sejarah-photos.bat ✅
2. deploy-revisi-phase3.bat ✅

---

## 🚀 DEPLOYMENT STEPS

### 1. Copy Photos
```bash
copy-sejarah-photos.bat
```

### 2. Run Migrations
```bash
cd C:\xampp\htdocs\masjid-internal
php artisan migrate
```

**PENTING:** Migration akan menghapus semua data pengurus dengan tipe "pembina" dan "pengawas"!

### 3. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### 4. Update Data Anggota (Manual via Admin)
Untuk setiap anggota bidang, perlu diinput:
- **Seksi** (contoh: "Seksi Kajian", "Seksi Pendidikan", dll)
- **Urutan** (untuk sorting dalam seksi)
- **Ketua Bidang** harus punya jabatan yang mengandung "Ketua" atau "Koordinator"

### 5. Input Data Kesekretariatan
Login ke admin, masuk ke menu "Kesekretariatan":
- Input Ketua
- Input Sekretaris
- Input Bendahara

---

## ⚠️ BREAKING CHANGES

### 1. Pengurus Inti
**BEFORE:** 5 tipe (pembina, pengawas, ketua, sekretaris, bendahara)
**AFTER:** 3 tipe (ketua, sekretaris, bendahara)
**IMPACT:** Data pembina & pengawas akan DIHAPUS saat migrasi!

**SOLUSI:** Jika perlu data pembina/pengawas, backup dulu sebelum migrate!

### 2. Anggota Bidang
**BEFORE:** Hanya ada bidang_id, nama, jabatan, foto, no_hp
**AFTER:** Tambah field seksi, urutan

**IMPACT:** 
- View lama masih berfungsi (backward compatible)
- Tapi untuk grouping by seksi perlu input data seksi dulu
- Jika seksi kosong/null, anggota tidak akan muncul di halaman bidang

**SOLUSI:** Input seksi untuk semua anggota via admin

---

## 🧪 TESTING CHECKLIST

### A. Halaman Public
- [ ] /profile/sejarah - Foto tampil semua, layout OK
- [ ] /profile/visi-misi - Hero center, misi 6 items
- [ ] /profile/struktur - Hanya tampil bagan struktur
- [ ] /manajemen/kesekretariatan - Profil pengurus tampil, filter tahun works
- [ ] /bidang/{id} - Ketua di atas, seksi di bawah dengan grouping
- [ ] /proker/terlaksana - Hero center
- [ ] /proker/rencana - Hero center
- [ ] /proker/target - Hero center
- [ ] /aset - **BELUM DIBUAT**

### B. Admin Dashboard
- [ ] Menu "Kesekretariatan" (bukan "Pengurus Inti")
- [ ] Create pengurus - hanya ada 3 tipe
- [ ] Edit pengurus - hanya ada 3 tipe
- [ ] Upload foto pengurus
- [ ] CRUD Anggota - bisa input seksi & urutan

### C. Navbar & Footer
- [ ] Navbar public - **BELUM ADA MENU ASET**
- [ ] Navbar public - **MASIH ADA TOMBOL ADMIN**
- [ ] Footer public - **BELUM ADA LINK ADMIN**

---

## 📊 NEXT STEPS (Urutan Prioritas)

### Priority 1: NAVBAR & FOOTER (CRITICAL)
1. Update layouts/public.blade.php
   - Tambah menu Aset di navbar
   - Hapus tombol Admin dari navbar
   - Tambah link Admin di footer

### Priority 2: HALAMAN ASET PUBLIC
2. Buat resources/views/public/aset.blade.php
   - Hero section
   - Grid aset cards
   - Summary total

### Priority 3: INPUT DATA
3. Login admin, input data:
   - Kesekretariatan (Ketua, Sekre, Bendahara)
   - Seksi untuk setiap anggota bidang
   - Upload gambar struktur organisasi

### Priority 4: TESTING
4. Test semua halaman public
5. Test semua CRUD admin
6. Test responsive mobile

---

## 📝 NOTES & RECOMMENDATIONS

### Tentang Field Seksi
Struktur yang direkomendasikan berdasarkan gambar struktur organisasi:

**Contoh untuk Bidang Kemasjidan:**
- Ketua Bidang: Jabatan = "Ketua Bidang Kemasjidan"
- Seksi Imam: seksi = "Seksi Imam", anggota: Imam Subuh, Imam Dzuhur, dll
- Seksi Muadzin: seksi = "Seksi Muadzin", anggota: Muadzin 1, 2, 3
- Seksi Marbot: seksi = "Seksi Marbot", anggota: Marbot 1, 2

**Urutan:**
- Gunakan urutan 1, 2, 3, dst untuk sorting dalam seksi yang sama
- Ketua bidang bisa diberi urutan 0 agar selalu di atas

### Tentang Foto Sejarah
Foto-foto sudah tersedia di folder `foto masjid/`:
- foto Awal berdiri.jpeg
- foto Perkembangan1.jpg
- foto Perkembangan2.jpeg
- foto Perkembangan3.jpg
- Foto Masjid saat ini.jpeg

Run `copy-sejarah-photos.bat` untuk copy ke `public/images/`

---

## ✅ COMPLETION STATUS

**Phase 3 Revisi:** 70% Complete

**Completed:**
- ✅ Halaman Sejarah dengan foto asli
- ✅ Hero Section fix semua
- ✅ Struktur Kepengurusan simplified
- ✅ Kesekretariatan dengan profil pengurus
- ✅ Bidang grouping by seksi
- ✅ Database schema update
- ✅ Admin rename & cleanup

**Pending:**
- ⏳ Navbar public update
- ⏳ Footer public update
- ⏳ Halaman Aset public

**Estimasi waktu:** 30-45 menit untuk selesaikan yang pending
