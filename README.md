<h1 align="center">DesaInvolve</h1>

<hr/>

<h3 align="center">Sistem Informasi Kegiatan Desa</h3>

---

<p align="center">
  <img src="https://github.com/user-attachments/assets/36f5b8ce-b59d-4c5d-892f-31a6f36b31b5" alt="Logo Unsulbar" width="200"/>
</p>

<p align="center">
  <strong>WANTI</strong><br/>
  <strong>D0223026</strong><br/>
  <strong>Framework Web Based</strong><br/>
  <strong>2025</strong>
</p>

---

## 👥 Role dan Fitur-fiturnya

### 🏛️ Pemerintah (Admin)
Role yang mewakili aparatur desa, bertanggung jawab memverifikasi dan mengelola kegiatan serta memantau partisipasi warga.

**Fitur utama:**
- Melihat dan mengelola seluruh kegiatan yang diajukan.
- Menyetujui atau menolak pengajuan kegiatan.
- Melihat daftar warga yang mendaftar kegiatan.
- Melihat jumlah warga dan penyelenggara.

### 🧑‍💼 Penyelenggara
Role organisasi atau kelompok yang bertanggung jawab mengusulkan dan menjalankan kegiatan.

**Fitur utama:**
- Mengajukan kegiatan.
- Melihat status kegiatan (pending, approved, rejected).
- Melihat daftar warga yang mendaftar ke kegiatan mereka.

### 👤 Warga
Role masyarakat umum yang bisa mendaftar kegiatan desa dan memberikan komentar.

**Fitur utama:**
- Melihat daftar kegiatan yang tersedia (status: approved).
- Mendaftar kegiatan yang diinginkan.
- Memberikan komentar terhadap kegiatan.

---

## 🗄️ Tabel-Tabel Database

### 1. `users`
| Field              | Tipe Data     | Keterangan                                  |
|-------------------|---------------|---------------------------------------------|
| id                | BIGINT        | Primary Key (auto increment)                |
| email             | String        | Email unik pengguna                         |
| password          | String        | Password terenkripsi                        |
| role              | String        | Peran pengguna (`warga`, `pemerintah`, `penyelenggara`) |
| created_at        | Timestamp     | Tanggal dibuat                              |
| updated_at        | Timestamp     | Tanggal diperbarui                          |

### 2. `user_profiles`
| Field     | Tipe Data | Keterangan                       |
|-----------|-----------|----------------------------------|
| id        | BIGINT    | Primary Key                      |
| user_id   | BIGINT    | Foreign key ke `users`           |
| nama      | String    | Nama lengkap pengguna            |
| alamat    | String    | Alamat tempat tinggal            |
| no_hp     | String    | Nomor HP                         |
| foto      | String    | Path foto profil (nullable)      |
| created_at| Timestamp | Tanggal dibuat                   |
| updated_at| Timestamp | Tanggal diperbarui               |

### 3. `kegiatans`
| Field           | Tipe Data | Keterangan                            |
|-----------------|-----------|----------------------------------------|
| id              | BIGINT    | Primary Key                            |
| judul           | String    | Judul kegiatan                         |
| deskripsi       | Text      | Deskripsi kegiatan                     |
| tanggal_mulai   | Date      | Tanggal mulai kegiatan                 |
| tanggal_selesai | Date      | Tanggal selesai kegiatan               |
| lokasi          | String    | Lokasi kegiatan                        |
| dibuat_oleh     | BIGINT    | Foreign key ke `users` (penyelenggara) |
| status          | ENUM      | Status: pending, approved, rejected    |
| created_at      | Timestamp | Tanggal dibuat                         |
| updated_at      | Timestamp | Tanggal diperbarui                     |

### 4. `pendaftaran_kegiatans`
| Field             | Tipe Data | Keterangan                       |
|-------------------|-----------|----------------------------------|
| id                | BIGINT    | Primary Key                      |
| warga_id          | BIGINT    | Foreign key ke `users`           |
| kegiatan_id       | BIGINT    | Foreign key ke `kegiatans`       |
| status_pendaftaran| ENUM      | menunggu, diterima, ditolak      |
| created_at        | Timestamp | Tanggal dibuat                   |
| updated_at        | Timestamp | Tanggal diperbarui               |

---

## 🔗 Relasi Antar Tabel

| Tabel 1         | Relasi | Tabel 2              | Jenis Relasi   | Keterangan                                              |
|-----------------|--------|----------------------|----------------|----------------------------------------------------------|
| users           | 1 : 1  | user_profiles         | One to One     | Satu user punya satu profil                              |
| users           | N : N  | kegiatans             | Many to Many   | Lewat tabel `pendaftaran_kegiatans`                     |
| users           | 1 : N  | pendaftaran_kegiatans | One to Many    | Warga bisa mendaftar banyak kegiatan                     |
| kegiatans       | 1 : N  | pendaftaran_kegiatans | One to Many    | Satu kegiatan punya banyak peserta                       |
| kegiatans       | 1 : N  | pengajuan_penyelenggaras | One to Many | Satu kegiatan bisa punya satu pengajuan                 |

---

> 📌 *Proyek ini merupakan bagian dari tugas mata kuliah Framework Web Based Universitas Sulawesi Barat.*
