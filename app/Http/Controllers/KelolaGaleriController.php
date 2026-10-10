<?php

namespace App\Http\Controllers;

use App\Models\KelolaGaleri;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

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
        return view('galeri.tambah', [
            'title' => 'Tambah Galeri',
        ]);
    }

    public function detail($id)
    {
        try {

            $galeri = KelolaGaleri::findOrFail(
                Crypt::decrypt($id)
            );
    
            return view('galeri.detail', [
                'title' => 'Detail Galeri',
                'galeri' => $galeri,
            ]);
        }
         catch(Exception $e) {
            return redirect()->route('admin.galeri.index');
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        // Validasi file disesuaikan dengan kategori.
        $aturanFile = $request->input('kategori') === 'Video'
            ? 'required|file|mimes:mp4,webm,mov,ogg|max:51200'
            : 'required|image|mimes:jpeg,png,jpg,webp|max:2048';

        $request->validate([
            'file' => $aturanFile,
        ], [
            'file.required' => 'File foto atau video wajib diunggah.',
            'file.image' => 'File kategori Foto harus berupa gambar.',
            'file.mimes' => 'Format file tidak didukung.',
            'file.max' => 'Ukuran file melebihi batas yang ditentukan.',
        ]);

        $data['file'] = $request->file('file')
            ->store('galeri', 'public');

        KelolaGaleri::create($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {

            return view('galeri.edit', [
                'title' => 'Edit Galeri',
                'galeri' => KelolaGaleri::findOrFail(
                    Crypt::decrypt($id)
                ),
            ]);
        }
         catch(Exception $e) {
            return redirect()->route('admin.galeri.index');
        }
    }

    public function update(Request $request, $id)
    {
        $galeri = KelolaGaleri::findOrFail(
            Crypt::decrypt($id)
        );

        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        // Jika kategori berubah, file pengganti wajib diunggah.
        if (
            $request->input('kategori') !== $galeri->kategori
            && !$request->hasFile('file')
        ) {
            throw ValidationException::withMessages([
                'file' => 'Unggah file baru sesuai kategori yang dipilih.',
            ]);
        }

        if ($request->hasFile('file')) {
            $aturanFile = $request->input('kategori') === 'Video'
                ? 'required|file|mimes:mp4,webm,mov,ogg|max:51200'
                : 'required|image|mimes:jpeg,png,jpg,webp|max:2048';

            $request->validate([
                'file' => $aturanFile,
            ], [
                'file.image' => 'File kategori Foto harus berupa gambar.',
                'file.mimes' => 'Format file tidak didukung.',
                'file.max' => 'Ukuran file melebihi batas yang ditentukan.',
            ]);

            // Simpan file baru sebelum menghapus file lama.
            $fileLama = $galeri->file;
            $fileBaru = $request->file('file')
                ->store('galeri', 'public');

            $data['file'] = $fileBaru;

            $galeri->update($data);

            if ($fileLama) {
                Storage::disk('public')->delete($fileLama);
            }
        } else {
            // File tetap dipertahankan jika tidak diganti.
            $galeri->update($data);
        }

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = KelolaGaleri::findOrFail(
            Crypt::decrypt($id)
        );

        if ($galeri->file) {
            Storage::disk('public')->delete($galeri->file);
        }

        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}