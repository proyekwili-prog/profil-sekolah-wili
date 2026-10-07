<?php

namespace App\Http\Controllers;

use App\Models\KelolaEkstrakuliKuler;
use App\Models\KelolaGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelolaEkstraKuliKulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = KelolaEkstrakuliKuler::orderByDesc('id_eskul')->get();
        $gurus = KelolaGuru::orderBy('nama_guru')->get();

        return view('ekstrakulikuler.index', [
            'title' => 'Ekstrakurikuler',
            'ekstrakurikulers' => $ekstrakurikulers,
            'gurus' => $gurus,
        ]);
    }

    public function tambah()
    {
        return view('ekstrakulikuler.tambah', [
            'title' => 'Tambah Ekstrakurikuler',
            'gurus' => KelolaGuru::orderBy('nama_guru')->get(),
        ]);
    }

    public function detail($id)
{
    $ekstrakurikuler = KelolaEkstrakuliKuler::findOrFail($id);

    return view('ekstrakulikuler.detail', [
        'title' => 'Detail Ekstrakurikuler',
        'ekstrakurikuler' => $ekstrakurikuler,
    ]);
}

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_eskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if (!KelolaGuru::where('nama_guru', $data['pembina'])->exists()) {
            return back()->withInput()->withErrors([
                'pembina' => 'Pembina yang dipilih tidak ditemukan pada data guru.',
            ]);
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        KelolaEkstrakuliKuler::create($data);

        return redirect()->route('admin.ekstrakulikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

   public function edit($id)
{
    return view('ekstrakulikuler.edit', [
        'title' => 'Edit Ekstrakurikuler',
        'ekstrakurikuler' => KelolaEkstrakuliKuler::findOrFail($id),
        'gurus' => KelolaGuru::orderBy('nama_guru')->get(),
    ]);
}

    public function update(Request $request, $id)
    {
        $eskul = KelolaEkstrakuliKuler::findOrFail($id);

        $data = $request->validate([
            'nama_eskul' => 'required|string|max:40',
            'pembina' => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if (!KelolaGuru::where('nama_guru', $data['pembina'])->exists()) {
            return back()->withInput()->withErrors([
                'pembina' => 'Pembina yang dipilih tidak ditemukan pada data guru.',
            ]);
        }

        if ($request->hasFile('gambar')) {
            if ($eskul->gambar) {
                Storage::disk('public')->delete($eskul->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        } else {
            unset($data['gambar']);
        }

        $eskul->update($data);

        return redirect()->route('admin.ekstrakulikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $eskul = KelolaEkstrakuliKuler::findOrFail($id);

        if ($eskul->gambar) {
            Storage::disk('public')->delete($eskul->gambar);
        }

        $eskul->delete();

        return redirect()->route('admin.ekstrakulikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
