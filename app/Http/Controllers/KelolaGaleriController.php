<?php

namespace App\Http\Controllers;

use App\Models\KelolaGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class KelolaGaleriController extends Controller
{
    public function index()
    {
        $galeri = KelolaGaleri::orderByDesc('tanggal')
            ->orderByDesc('id_galeri')
            ->get();

        return view('galeri.index', [
            'title' => 'Kelola Galeri',
            'galeri' => $galeri,
        ]);
    }

    public function create()
    {
        return view('galeri.tambah', ['title' => 'Tambah Galeri']);
    }

    public function detail($id)
{
    $galeri = KelolaGaleri::findOrFail($id);

    return view('galeri.detail', [
        'title' => 'Detail Galeri',
        'galeri' => $galeri,
    ]);
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $data['file'] = $request->file('file')->store('galeri', 'public');

        KelolaGaleri::create($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('galeri.edit', [
            'title' => 'Edit Galeri',
            'galeri' => KelolaGaleri::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    public function update(Request $request, $id)
    {
        $galeri = KelolaGaleri::findOrFail(Crypt::decrypt($id));

        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('file')) {
            if ($galeri->file) {
                Storage::disk('public')->delete($galeri->file);
            }
            $data['file'] = $request->file('file')->store('galeri', 'public');
        } else {
            unset($data['file']);
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = KelolaGaleri::findOrFail($id);

        if ($galeri->file) {
            Storage::disk('public')->delete($galeri->file);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}
