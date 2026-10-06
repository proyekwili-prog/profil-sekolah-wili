<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileSekolahController;
use App\Http\Controllers\KelolaBeritaController;
use App\Http\Controllers\KelolaSiswaController;
use App\Http\Controllers\KelolaGaleriController;
use App\Http\Controllers\KelolaGuruController;
use App\Http\Controllers\KelolaEkstraKuliKulerController;


// ======================================================
// PUBLIC WEBSITE
// ======================================================

Route::get('/', [DashboardController::class, 'indexPublic'])->name('public.dashboard');

Route::get('/profil', [DashboardController::class, 'profil'])->name('public.profil');

Route::get('/guru', [DashboardController::class, 'guru'])->name('public.guru');
Route::get('/guru/{id}', [DashboardController::class, 'guruDetail'])->name('public.guru.detail');

Route::get('/ekstrakurikuler', [DashboardController::class, 'ekstrakurikuler'])
    ->name('public.ekstrakurikuler');

Route::get('/ekstrakurikuler/{id}', [DashboardController::class, 'ekstrakurikulerDetail'])
    ->name('public.ekstrakurikuler.detail');

Route::get('/berita', [DashboardController::class, 'berita'])
    ->name('public.berita');

Route::get('/berita/{id}', [DashboardController::class, 'beritaDetail'])
    ->name('public.berita.detail');

Route::get('/galeri', [DashboardController::class, 'galeri'])
    ->name('public.galeri');

Route::get('/galeri/{id}', [DashboardController::class, 'galeriDetail'])
    ->name('public.galeri.detail');


// ======================================================
// LOGIN
// ======================================================

Route::get('/login', [AuthController::class, 'index'])
    ->name('admin.login');

Route::post('/login', [AuthController::class, 'processLogin'])
    ->name('admin.login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout');


// ======================================================
// ADMIN
// ======================================================

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        // ==================================================
        // DATA USER
        // Admin & Operator hanya bisa melihat
        // ==================================================

        Route::get('/user', [UserController::class, 'index'])
            ->name('user.index');


        // ==================================================
        // ADMIN SAJA
        // ==================================================

        Route::middleware('role:admin')->group(function () {

            // DATA USER
            Route::get('/user/tambah', [UserController::class, 'create'])
                ->name('user.create');

            Route::post('/user', [UserController::class, 'store'])
                ->name('user.store');

            Route::get('/user/{id}/edit', [UserController::class, 'edit'])
                ->name('user.edit');

            Route::put('/user/{id}', [UserController::class, 'update'])
                ->name('user.update');

            Route::delete('/user/{id}', [UserController::class, 'destroy'])
                ->name('user.destroy');


            // PROFIL SEKOLAH
            Route::get('/profile', [ProfileSekolahController::class, 'index'])
                ->name('profile');

            Route::get('/profile/edit', [ProfileSekolahController::class, 'edit'])
                ->name('edit_profile');

            Route::put('/profile/update', [ProfileSekolahController::class, 'update'])
                ->name('profile.update');


            // GURU
            Route::get('/guru', [KelolaGuruController::class, 'index'])
                ->name('guru.index');

            Route::get('/guru/tambah', [KelolaGuruController::class, 'create'])
                ->name('guru.create');

            Route::post('/guru', [KelolaGuruController::class, 'store'])
                ->name('guru.store');

            Route::get('/guru/{id}/edit', [KelolaGuruController::class, 'edit'])
                ->name('guru.edit');

            Route::put('/guru/{id}', [KelolaGuruController::class, 'update'])
                ->name('guru.update');

            Route::delete('/guru/{id}', [KelolaGuruController::class, 'destroy'])
                ->name('guru.destroy');


            // SISWA
            Route::get('/siswa', [KelolaSiswaController::class, 'index'])
                ->name('siswa.index');

            Route::get('/siswa/tambah', [KelolaSiswaController::class, 'create'])
                ->name('siswa.create');

            Route::post('/siswa', [KelolaSiswaController::class, 'store'])
                ->name('siswa.store');

            Route::get('/siswa/{id}/edit', [KelolaSiswaController::class, 'edit'])
                ->name('siswa.edit');

            Route::put('/siswa/{id}', [KelolaSiswaController::class, 'update'])
                ->name('siswa.update');

            Route::delete('/siswa/{id}', [KelolaSiswaController::class, 'destroy'])
                ->name('siswa.destroy');
        });


        // ==================================================
        // ADMIN & OPERATOR
        // ==================================================

        Route::middleware('role:admin,operator')->group(function () {

            // BERITA
            Route::get('/berita', [KelolaBeritaController::class, 'index'])
                ->name('berita.index');

            Route::get('/berita/tambah', [KelolaBeritaController::class, 'tambah'])
                ->name('berita.tambah');

            Route::post('/berita', [KelolaBeritaController::class, 'store'])
                ->name('berita.store');

            Route::get('/berita/{id}/edit', [KelolaBeritaController::class, 'edit'])
                ->name('berita.edit');

            Route::put('/berita/{id}', [KelolaBeritaController::class, 'update'])
                ->name('berita.update');

            Route::delete('/berita/{id}', [KelolaBeritaController::class, 'destroy'])
                ->name('berita.destroy');


            // GALERI
            Route::get('/galeri', [KelolaGaleriController::class, 'index'])
                ->name('galeri.index');

            Route::get('/galeri/tambah', [KelolaGaleriController::class, 'create'])
                ->name('galeri.create');

            Route::post('/galeri', [KelolaGaleriController::class, 'store'])
                ->name('galeri.store');

            Route::get('/galeri/{id}/edit', [KelolaGaleriController::class, 'edit'])
                ->name('galeri.edit');

            Route::put('/galeri/{id}', [KelolaGaleriController::class, 'update'])
                ->name('galeri.update');

            Route::delete('/galeri/{id}', [KelolaGaleriController::class, 'destroy'])
                ->name('galeri.destroy');


            // EKSTRAKURIKULER
            Route::get('/ekstrakulikuler', [KelolaEkstraKuliKulerController::class, 'index'])
                ->name('ekstrakulikuler.index');

            Route::get('/ekstrakulikuler/tambah', [KelolaEkstraKuliKulerController::class, 'tambah'])
                ->name('ekstrakulikuler.tambah');

            Route::post('/ekstrakulikuler', [KelolaEkstraKuliKulerController::class, 'store'])
                ->name('ekstrakulikuler.store');

            Route::get('/ekstrakulikuler/{id}/edit', [KelolaEkstraKuliKulerController::class, 'edit'])
                ->name('ekstrakulikuler.edit');

            Route::put('/ekstrakulikuler/{id}', [KelolaEkstraKuliKulerController::class, 'update'])
                ->name('ekstrakulikuler.update');

            Route::delete('/ekstrakulikuler/{id}', [KelolaEkstraKuliKulerController::class, 'destroy'])
                ->name('ekstrakulikuler.destroy');
        });
    });