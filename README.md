# Sistem Informasi Gadai

Aplikasi web untuk mengelola data nasabah dan barang gadai, dibuat dengan **Laravel 12** dan **PHP 8.3**.

Project ini awalnya tugas mata kuliah pemrograman web, kemudian dirapikan supaya bisa dijalankan ulang dari nol hanya dengan `migrate` dan `seed`.

## Fitur

- **Login multi-role** — dua jenis akun dengan hak akses berbeda (nasabah dan petugas gadai)
- **Data nasabah** — tambah, lihat, ubah, hapus, plus upload foto
- **Data barang gadai** — CRUD lengkap dengan upload foto barang
- **Laporan** — rekap seluruh nasabah dan barang gadai dalam satu halaman
- **Dashboard** — ringkasan jumlah nasabah dan barang
- **Middleware akses** — setiap role hanya bisa membuka halamannya sendiri

## Teknologi

| Bagian | Dipakai |
|---|---|
| Framework | Laravel 12 |
| Bahasa | PHP 8.2+ |
| Database | SQLite (default) / MySQL |
| Tampilan | Blade + Bootstrap 5 |
| Autentikasi | Session + Hash bawaan Laravel |

## Cara Menjalankan

```bash
# 1. Install dependency
composer install

# 2. Siapkan environment
cp .env.example .env
php artisan key:generate

# 3. Siapkan database (SQLite, tanpa konfigurasi tambahan)
touch database/database.sqlite
php artisan migrate --seed

# 4. Symlink folder upload
php artisan storage:link

# 5. Jalankan
php artisan serve
```

Buka `http://127.0.0.1:8000`.

### Kalau mau pakai MySQL

Ubah bagian database di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gadai_berkah
DB_USERNAME=root
DB_PASSWORD=
```

Lalu jalankan `php artisan migrate --seed`.

## Akun Demo

| Username | Password | Akses |
|---|---|---|
| `admin` | `admin123` | Data nasabah |
| `petugas` | `petugas123` | Data barang gadai |

Akun dibuat lewat `database/seeders/Kelompok15Seeder.php`. Kalau mau diganti, ubah file itu lalu jalankan `php artisan migrate:fresh --seed`.

## Struktur Penting

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php          # login & logout
│   │   ├── Nasabah060Controller.php    # CRUD nasabah
│   │   ├── Barang046Controller.php     # CRUD barang gadai
│   │   └── Newskelompok15.php          # dashboard & laporan
│   └── Middleware/
│       ├── CekLogin.php                # wajib login
│       └── CekAkses.php                # cek role
├── Models/
│   ├── nasabahmodel.php                # tabel db_nasabah
│   ├── BarangModel.php                 # tabel db_barang
│   └── Kelompok15Model.php             # tabel kelompok15 (akun)
database/
├── migrations/                         # skema tabel
└── seeders/                            # akun demo
resources/views/                        # halaman Blade
routes/web.php                          # daftar URL
```

## Catatan Perbaikan

Beberapa hal diperbaiki supaya project bisa jalan di lingkungan baru:

- Menambahkan migration untuk tabel `db_nasabah` dan `db_barang` — sebelumnya tabel ini dibuat manual di phpMyAdmin, sehingga `php artisan migrate` gagal di mesin lain
- Mengganti nama file `newskelompok15.php` menjadi `Newskelompok15.php` agar sesuai PSR-4 (Linux membedakan huruf besar-kecil, Windows tidak)
- Memperbaiki urutan argumen `Validator::make()` pada `Barang046Controller` — pesan validasi sebelumnya tidak pernah tampil
- Menghapus route `/fauzi046` yang memanggil method `pusatbantuan` yang tidak ada (menyebabkan error 500)
- Menambahkan Bootstrap JS yang sebelumnya tidak di-include, sehingga tombol menu di layar kecil tidak berfungsi
- Menyeragamkan nama variabel `$totalGadai` antara controller dan view
- Menghapus controller kosong yang tidak terpakai
- Memperbaiki path foto barang — view memanggil folder `genap046`, padahal file disimpan di `foto_barang`, sehingga foto yang diunggah tidak pernah tampil
- Membersihkan markup rusak (`>>` ganda pada tag form, atribut `enctype` yang menempel tanpa spasi)
- Menata ulang tampilan: navbar terang, kartu dan tabel yang konsisten, form yang lebih nyaman, serta tabel yang bisa digeser di layar kecil

## Lisensi

MIT
