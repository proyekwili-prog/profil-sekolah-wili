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

   public function indexPublic()
{
    $profile = ProfileSekolah::first();

    $beritaTerbaru = KelolaBerita::orderByDesc('tanggal')
        ->orderByDesc('id_berita')
        ->take(3)
        ->get();

    $guru = KelolaGuru::orderBy('nama_guru')
        ->take(6)
        ->get();

    $galeri = KelolaGaleri::orderByDesc('id_galeri')
        ->take(6)
        ->get();

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

    public function profil()
    {
        $profile = \App\Models\ProfileSekolah::first();

        return view('public.profil', [
            'profile' => $profile,
        ]);
    }

    public function guru()
    {
        $profile = \App\Models\ProfileSekolah::first();

        $guru = \App\Models\KelolaGuru::all();

        return view('public.guru', [
            'profile' => $profile,
            'guru' => $guru,
        ]);
    }

    // DETAIL GURU
    public function guruDetail($id)
    {
        $profile = \App\Models\ProfileSekolah::first();

        $guru = \App\Models\KelolaGuru::findOrFail($id);

        return view('public.guru-detail', [
            'profile' => $profile,
            'guru' => $guru,
        ]);
    }

    public function ekstrakurikuler()
    {
        $profile = \App\Models\ProfileSekolah::first();

        $ekstrakurikuler = \App\Models\KelolaEkstrakuliKuler::all();

        return view('public.ekstrakurikuler', [
            'profile' => $profile,
            'ekstrakurikuler' => $ekstrakurikuler,
        ]);
    }

    public function berita()
    {
        $profile = \App\Models\ProfileSekolah::first();

        $beritaTerbaru = KelolaBerita::orderByDesc('tanggal')
            ->orderByDesc('id_berita')
            ->get();

        return view('public.berita', [
            'profile' => $profile,
            'beritaTerbaru' => $beritaTerbaru,
        ]);
    }

    public function galeri()
    {
        $profile = \App\Models\ProfileSekolah::first();

        $galeri = KelolaGaleri::orderByDesc('id_galeri')
            ->get();

        return view('public.galeri', [
            'profile' => $profile,
            'galeri' => $galeri,
        ]);
    }
}