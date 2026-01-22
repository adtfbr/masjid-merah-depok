# Testing Checklist - Revisi Phase 3

## Tanggal Testing: _______________
## Tester: _______________

---

## 📋 Testing Instructions

Jalankan testing dengan urutan berikut dan centang setiap item yang sudah berhasil ditest.

---

## 1️⃣ HALAMAN MANAJEMEN BIDANG - CAKUPAN

### URL untuk Testing:
- `http://127.0.0.1:8000/bidang/1` (Bidang Usaha dan Ekonomi)
- `http://127.0.0.1:8000/bidang/2` (Bidang Kemasjidan)
- `http://127.0.0.1:8000/bidang/3` (Bidang Pendidikan)
- `http://127.0.0.1:8000/bidang/4` (Bidang Sosial Kemasyarakatan)
- `http://127.0.0.1:8000/bidang/5` (Bidang Pengelolaan Aset)

### Checklist:
- [ ] Section "Tentang Bidang" muncul dengan benar
- [ ] Section "Cakupan" muncul di bawah "Tentang Bidang"
- [ ] Header "Cakupan" menggunakan background primary (warna merah)
- [ ] Cakupan ditampilkan dalam grid 2 kolom
- [ ] Setiap item cakupan memiliki:
  - [ ] Nomor urut dalam lingkaran merah
  - [ ] Judul cakupan
  - [ ] Deskripsi cakupan (jika ada)
- [ ] Layout mirip dengan "Tugas Pokok" di halaman Kesekretariatan
- [ ] Responsive di mobile device
- [ ] Tidak ada error di console browser

### Admin Dashboard - Input Cakupan:
- [ ] Buka admin dashboard
- [ ] Masuk ke menu "Bidang"
- [ ] Pilih salah satu bidang
- [ ] Klik tab/section "Program Kerja" atau "Cakupan"
- [ ] Tambah cakupan baru dengan:
  - [ ] Nomor urut
  - [ ] Judul
  - [ ] Deskripsi
- [ ] Save dan refresh halaman public bidang
- [ ] Cakupan baru muncul di halaman public

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 2️⃣ HALAMAN KEGIATAN BERJALAN - GAMBAR

### URL untuk Testing:
- `http://127.0.0.1:8000/program-kerja/terlaksana`

### Checklist:
- [ ] Hero section muncul dengan benar
- [ ] Judul "Kegiatan Berjalan" center aligned
- [ ] Kegiatan di-group berdasarkan bidang
- [ ] Setiap group memiliki header bidang dengan background gradient
- [ ] Jumlah kegiatan ditampilkan di header bidang

### Untuk Setiap Card Kegiatan:
- [ ] Gambar kegiatan muncul (jika kegiatan punya foto)
- [ ] Placeholder dengan icon muncul (jika tidak ada foto)
- [ ] Gambar ter-crop dengan baik (height: 200px)
- [ ] Nama kegiatan ditampilkan
- [ ] Deskripsi ditampilkan (limited 100 karakter)
- [ ] Tanggal mulai ditampilkan dengan format "d M Y"
- [ ] Badge "Selesai" berwarna hijau muncul
- [ ] Lokasi ditampilkan (jika ada)
- [ ] Tombol "Lihat Detail" berfungsi
- [ ] Tidak ada broken image (icon X merah)
- [ ] Tidak ada error 404 untuk gambar

### Testing dengan Data:
- [ ] Test dengan kegiatan yang punya foto
- [ ] Test dengan kegiatan tanpa foto
- [ ] Test dengan kegiatan dari berbagai bidang

**Path Gambar yang Benar:**
```
public/storage/kegiatan/{nama-file}.jpg
```

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 3️⃣ HALAMAN KEGIATAN MENDATANG - GAMBAR

### URL untuk Testing:
- `http://127.0.0.1:8000/program-kerja/rencana`

### Checklist:
- [ ] Hero section muncul dengan benar
- [ ] Judul "Kegiatan Mendatang" center aligned
- [ ] Hanya menampilkan kegiatan dengan tanggal_mulai > hari ini

### Untuk Setiap Card Kegiatan:
- [ ] Gambar kegiatan muncul (jika kegiatan punya foto)
- [ ] Placeholder dengan icon calendar muncul (jika tidak ada foto)
- [ ] Gambar ter-crop dengan baik (height: 200px)
- [ ] Nama kegiatan ditampilkan
- [ ] Badge "Rencana" berwarna kuning muncul
- [ ] Nama bidang ditampilkan
- [ ] Deskripsi ditampilkan (limited 100 karakter)
- [ ] Tanggal mulai ditampilkan
- [ ] Tanggal selesai ditampilkan (jika ada)
- [ ] Lokasi ditampilkan (jika ada)
- [ ] Tombol "Lihat Detail" berfungsi
- [ ] Tidak ada broken image
- [ ] Tidak ada error 404 untuk gambar

### Testing dengan Data:
- [ ] Test dengan kegiatan yang punya foto
- [ ] Test dengan kegiatan tanpa foto
- [ ] Pastikan kegiatan yang sudah lewat tidak muncul

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 4️⃣ NAVBAR - MENU ASET

### URL untuk Testing:
- Test dari halaman manapun (navbar global)

### Checklist:

#### Menu Structure:
- [ ] Menu "Beranda" ada
- [ ] Dropdown "Profile" ada dengan 3 submenu
- [ ] Dropdown "Manajemen Utama" ada dengan 2 submenu
- [ ] Dropdown "Manajemen Bidang" ada dengan 5 submenu
- [ ] Dropdown "Program Kerja" ada dengan 3 submenu
- [ ] **Menu "Aset" ada** ⭐ BARU
- [ ] Menu "Kontak" ada
- [ ] **Tombol "Admin" TIDAK ADA di navbar** ⭐ PERUBAHAN

#### Menu "Aset":
- [ ] Menu "Aset" berada sebelum menu "Kontak"
- [ ] Klik menu "Aset" mengarah ke `/aset`
- [ ] Active state berfungsi saat di halaman Aset
- [ ] Warna active: merah (var(--primary))

#### Responsive:
- [ ] Hamburger menu berfungsi di mobile
- [ ] Semua menu muncul di mobile dropdown
- [ ] Menu "Aset" juga muncul di mobile

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 5️⃣ FOOTER - TOMBOL ADMIN

### URL untuk Testing:
- Test dari halaman manapun (footer global)

### Checklist:
- [ ] Footer muncul di semua halaman
- [ ] Section copyright muncul
- [ ] **Tombol "Portal Admin" muncul di bawah copyright** ⭐ BARU
- [ ] Tombol menggunakan style `btn-outline-light`
- [ ] Icon `bi-box-arrow-in-right` muncul
- [ ] Teks "Portal Admin" ditampilkan
- [ ] Klik tombol mengarah ke halaman login
- [ ] Hover effect berfungsi
- [ ] Responsive di mobile device

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 6️⃣ DATABASE & BACKEND

### Checklist:
- [ ] Tidak ada error "Column not found: status"
- [ ] Halaman `/program-kerja/terlaksana` load tanpa error
- [ ] Halaman `/program-kerja/rencana` load tanpa error
- [ ] Query kegiatan menggunakan tanggal, bukan status
- [ ] Eager loading `foto` berfungsi (tidak ada N+1 query)

### Testing Database Queries:
Buka Laravel Telescope atau log untuk memeriksa:
- [ ] Query kegiatan berjalan tidak menggunakan kolom `status`
- [ ] Query kegiatan mendatang tidak menggunakan kolom `status`
- [ ] Relasi `foto` di-eager load dengan `with(['bidang', 'foto'])`

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 7️⃣ CROSS-BROWSER TESTING

### Browser Testing:

#### Google Chrome:
- [ ] Semua halaman load dengan benar
- [ ] Gambar muncul
- [ ] Navbar berfungsi
- [ ] Footer berfungsi

#### Mozilla Firefox:
- [ ] Semua halaman load dengan benar
- [ ] Gambar muncul
- [ ] Navbar berfungsi
- [ ] Footer berfungsi

#### Microsoft Edge:
- [ ] Semua halaman load dengan benar
- [ ] Gambar muncul
- [ ] Navbar berfungsi
- [ ] Footer berfungsi

#### Mobile Browser (Chrome/Safari):
- [ ] Semua halaman load dengan benar
- [ ] Gambar muncul
- [ ] Navbar mobile berfungsi
- [ ] Footer mobile berfungsi

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 8️⃣ PERFORMANCE TESTING

### Page Load Speed:
- [ ] Halaman bidang load < 3 detik
- [ ] Halaman kegiatan berjalan load < 3 detik
- [ ] Halaman kegiatan mendatang load < 3 detik
- [ ] Gambar ter-optimize dan tidak terlalu besar

### Image Optimization:
- [ ] Gambar kegiatan tidak lebih dari 2MB per file
- [ ] Lazy loading berfungsi (jika diimplementasikan)
- [ ] Thumbnail/resize untuk card view

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 9️⃣ ADMIN DASHBOARD INTEGRATION

### Testing Input Data:

#### Cakupan Bidang:
- [ ] Login ke admin dashboard
- [ ] Masuk ke menu "Bidang Program Kerja"
- [ ] Pilih bidang
- [ ] Tambah cakupan baru
- [ ] Input: Nomor Urut, Judul, Deskripsi
- [ ] Save berhasil
- [ ] Data muncul di halaman public bidang

#### Upload Gambar Kegiatan:
- [ ] Login ke admin dashboard
- [ ] Masuk ke menu "Kegiatan"
- [ ] Edit kegiatan yang belum punya foto
- [ ] Upload foto kegiatan
- [ ] Save berhasil
- [ ] Gambar muncul di halaman public (terlaksana/rencana)

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## 🔟 REGRESSION TESTING

### Halaman yang Tidak Berubah (Harus Tetap Berfungsi):
- [ ] Halaman Beranda
- [ ] Halaman Sejarah Masjid
- [ ] Halaman Visi Misi
- [ ] Halaman Struktur Kepengurusan
- [ ] Halaman Kesekretariatan
- [ ] Halaman Keuangan
- [ ] Halaman Kontak
- [ ] Halaman Detail Kegiatan
- [ ] Halaman Target Program
- [ ] Halaman Aset

**Notes/Issues:**
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

## ✅ FINAL SIGN-OFF

### Overall Assessment:
- [ ] All major features working
- [ ] No critical bugs found
- [ ] Performance acceptable
- [ ] UI/UX improved as expected
- [ ] Ready for production

### Bugs Found:
```
Priority | Description | Status
---------|-------------|--------
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

### Recommendations:
```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```

---

**Tested By:** _______________
**Date:** _______________
**Signature:** _______________

---

## 📝 Additional Notes

```
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
_______________________________________________________________
```
