<?php

namespace App\Http\Controllers;

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

        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'totalSiswa' => KelolaSiswa::count(),
            'totalGuru' => KelolaGuru::count(),
            'totalBerita' => KelolaBerita::count(),
            'totalGaleri' => KelolaGaleri::count(),
            'totalEkstrakurikuler' => KelolaEkstrakuliKuler::count(),
            'beritaTerbaru' => $beritaTerbaru,
        ]);
    }

    public function indexPublic()
    {
        return view('public.dashboard');
    }
}
