<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use App\Models\KelolaSiswa;
use App\Models\KelolaGuru;
use App\Models\KelolaBerita;
use App\Models\KelolaGaleri;
use App\Models\KelolaEkstrakuliKuler;

class DashboardController extends Controller
{
    // =========================================================
    // DASHBOARD ADMIN
    // =========================================================
    public function index()
    {
        $beritaTerbaru = KelolaBerita::orderByDesc('tanggal')
            ->orderByDesc('id_berita')
            ->take(5)
            ->get();

        $ekstrakurikulerTerbaru = KelolaEkstrakuliKuler::orderByDesc('id_eskul')
            ->take(4)
            ->get();

        $galeriTerbaru = KelolaGaleri::orderByDesc('tanggal')
            ->orderByDesc('id_galeri')
            ->take(6)
            ->get();

        return view('admin.dashboard', [
            'title' => 'Dashboard',

            'totalSiswa' => KelolaSiswa::count(),
            'totalGuru' => KelolaGuru::count(),
            'totalBerita' => KelolaBerita::count(),
            'totalGaleri' => KelolaGaleri::count(),
            'totalEkstrakurikuler' => KelolaEkstrakuliKuler::count(),

            'beritaTerbaru' => $beritaTerbaru,
            'ekstrakurikulerTerbaru' => $ekstrakurikulerTerbaru,
            'galeriTerbaru' => $galeriTerbaru,
        ]);
    }


    // =========================================================
    // LANDING PAGE / PUBLIC
    // =========================================================
    public function indexPublic()
    {
        // Data profil sekolah
        $profile = ProfileSekolah::first();

        // 3 berita terbaru untuk banner dan bagian berita
        $beritaTerbaru = KelolaBerita::orderByDesc('tanggal')
            ->orderByDesc('id_berita')
            ->take(3)
            ->get();

        // Data guru
        $guru = KelolaGuru::orderBy('nama_guru')
            ->take(6)
            ->get();

        // Data galeri
        $galeri = KelolaGaleri::orderByDesc('id_galeri')
            ->take(6)
            ->get();

        // Data ekstrakurikuler
        $ekstrakurikuler = KelolaEkstrakuliKuler::orderByDesc('id_eskul')
            ->take(6)
            ->get();

        return view('public.dashboard', [
            'profile' => $profile,

            'beritaTerbaru' => $beritaTerbaru,
            'guru' => $guru,
            'galeri' => $galeri,
            'ekstrakurikuler' => $ekstrakurikuler,

            'totalSiswa' => KelolaSiswa::count(),
            'totalGuru' => KelolaGuru::count(),
            'totalBerita' => KelolaBerita::count(),
            'totalEkstrakurikuler' => KelolaEkstrakuliKuler::count(),
        ]);
    }


    // =========================================================
    // HALAMAN PROFIL SEKOLAH PUBLIC
    // =========================================================
    public function profil()
    {
        $profile = ProfileSekolah::first();

        return view('public.profil', [
            'profile' => $profile,
        ]);
    }


    // =========================================================
    // HALAMAN GURU PUBLIC
    // =========================================================
    public function guru()
    {
        $profile = ProfileSekolah::first();

        $guru = KelolaGuru::all();

        return view('public.guru', [
            'profile' => $profile,
            'guru' => $guru,
        ]);
    }


    // =========================================================
    // DETAIL GURU
    // =========================================================
    public function guruDetail($id)
    {
        $profile = ProfileSekolah::first();

        $guru = KelolaGuru::findOrFail($id);

        return view('public.guru-detail', [
            'profile' => $profile,
            'guru' => $guru,
        ]);
    }


    // =========================================================
    // HALAMAN EKSTRAKURIKULER PUBLIC
    // =========================================================
    public function ekstrakurikuler()
    {
        $profile = ProfileSekolah::first();

        $ekstrakurikuler = KelolaEkstrakuliKuler::all();

        return view('public.ekstrakurikuler', [
            'profile' => $profile,
            'ekstrakurikuler' => $ekstrakurikuler,
        ]);
    }


    // =========================================================
    // HALAMAN BERITA PUBLIC
    // =========================================================
    public function berita()
    {
        $profile = ProfileSekolah::first();

        $beritaTerbaru = KelolaBerita::orderByDesc('tanggal')
            ->orderByDesc('id_berita')
            ->get();

        return view('public.berita', [
            'profile' => $profile,
            'beritaTerbaru' => $beritaTerbaru,
        ]);
    }


    // =========================================================
    // HALAMAN GALERI PUBLIC
    // =========================================================
    public function galeri()
    {
        $profile = ProfileSekolah::first();

        $galeri = KelolaGaleri::orderByDesc('id_galeri')
            ->get();

        return view('public.galeri', [
            'profile' => $profile,
            'galeri' => $galeri,
        ]);
    }
}