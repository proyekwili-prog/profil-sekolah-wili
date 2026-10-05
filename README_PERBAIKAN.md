# Celkom Wili - Versi yang sudah diselaraskan

Project ini sudah diselaraskan dengan struktur database `db_profil_sekolah` yang kamu kirim.

## Struktur utama
- `user`
- `profil`
- `guru`
- `siswa`
- `berita`
- `galeri`
- `ekstrakurikuler`

## Login lokal
- Username: `admin`
- Password: `123456`
- Role: Admin

- Username: `operator`
- Password: `123456`
- Role: Operator

Akun tersebut dibuat oleh `php artisan db:seed`. Jika database kamu sudah berisi akun sendiri, gunakan akun yang sudah ada.

## Langkah menjalankan

1. Pastikan MySQL/XAMPP aktif.
2. Pastikan database `db_profil_sekolah` tersedia.
3. Pastikan `.env` menggunakan:
   `DB_DATABASE=db_profil_sekolah`
4. Jika menggunakan database kosong:
   `php artisan migrate`
   `php artisan db:seed`
5. Buat symbolic link storage:
   `php artisan storage:link`
6. Bersihkan cache:
   `php artisan optimize:clear`
7. Jalankan:
   `php artisan serve`

Buka:
`http://127.0.0.1:8000/login`

## Catatan
Migration sudah disesuaikan dengan struktur database pada gambar yang dikirim. Jangan menjalankan `migrate:fresh` pada database yang sudah berisi data penting karena akan menghapus tabel/data.
