<?php

namespace App\Http\Controllers;

use App\Models\KelolaBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class KelolaBeritaController extends Controller
{
    public function index()
    {
        $beritas = KelolaBerita::with('user')
            ->orderByDesc('tanggal')
            ->orderByDesc('id_berita')
            ->get();

        return view('berita.index', [
            'title' => 'Kelola Berita',
            'beritas' => $beritas,
            'totalArtikel' => $beritas->count(),
        ]);
    }

    public function tambah()
    {
        return view('berita.tambah', ['title' => 'Tambah Berita Baru']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data['id_user'] = Auth::id();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        KelolaBerita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('berita.edit', [
            'title' => 'Edit Berita',
            'berita' => KelolaBerita::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    public function update(Request $request, $id)
    {
        $berita = KelolaBerita::findOrFail(Crypt::decrypt($id));

        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        } else {
            unset($data['gambar']);
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = KelolaBerita::findOrFail($id);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
