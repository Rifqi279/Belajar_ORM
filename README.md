# Belajar ORM - Manajemen Karyawan & Proyek

Aplikasi web sederhana yang dibangun menggunakan Laravel dengan fokus pada materi Laravel Eloquent ORM.

---

## Screenshot

### Halaman Daftar Karyawan
![Halaman Index](docs/Screenshot%20(52).png)

### Halaman Tambah Karyawan
![Halaman Tambah](docs/Screenshot%20(53).png)

### Halaman Edit Karyawan
![Halaman Edit](docs/Screenshot%20(59).png)

---

## Fitur yang Dikerjakan

### 1. Model Proyek (Model Baru)
Menambahkan Model Proyek yang relevan dengan Model Karyawan yang sudah ada sebelumnya.
- Field: nama_proyek, deadline, status (Belum / Selesai)
- Relasi: Satu Proyek memiliki banyak Karyawan (hasMany)

### 2. Join Data Karyawan & Proyek
Menampilkan data gabungan dari tabel karyawans dan proyeks menggunakan Eloquent Eager Loading, sehingga tabel utama menampilkan kolom:
- Nama Karyawan
- Posisi
- Nama Proyek
- Deadline
- Status (dengan badge warna: Hijau (Selesai) / Merah (Belum))

### 3. Fitur Search
Menambahkan fitur pencarian yang dapat mencari berdasarkan:
- Nama karyawan
- Nama proyek (menggunakan orWhereHas)

### 4. Custom Style
Tampilan web menggunakan CSS custom dengan skema warna mauve (`#94617C`), bukan tampilan default Laravel. Fitur tampilan yang diterapkan:
- Header bar berwarna
- Card dengan shadow dan border radius
- Hover effect pada baris tabel
- Badge berwarna untuk status proyek
- Responsive layout

---
