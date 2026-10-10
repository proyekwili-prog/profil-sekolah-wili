<?php

namespace App\Http\Controllers;

use App\Models\KelolaGuru;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class KelolaGuruController extends Controller
{
    public function index()
    {
        $gurus = KelolaGuru::orderBy('id_guru', 'desc')->get();

        return view('guru.index', [
            'title' => 'Kelola Guru',
            'gurus' => $gurus,
            'totalGuru' => $gurus->count(),
        ]);
    }

    public function create()
    {
        return view('guru.tambah', ['title' => 'Tambah Data Guru']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'nullable|string|max:15',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        KelolaGuru::create($data);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try{

            return view('guru.edit', [
                'title' => 'Edit Data Guru',
                'guru' => KelolaGuru::findOrFail(Crypt::decrypt($id)),
            ]);
        }
        catch(Exception $e) {
            return redirect()->route('admin.guru.index');
        }
    }

    public function update(Request $request, $id)
    {
        $guru = KelolaGuru::findOrFail(Crypt::decrypt($id));

        $data = $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip' => 'nullable|string|max:15',
            'mapel' => 'required|string|max:40',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        } else {
            unset($data['foto']);
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = KelolaGuru::findOrFail($id);

        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }

    public function detail($id)
{
    
    try {
        $guru = KelolaGuru::findOrFail(Crypt::decrypt($id));
    
        return view('guru.detail', [
            'title' => 'Detail Data Guru',
            'guru' => $guru,
        ]);
    }
    catch(Exception $e) {
            return redirect()->route('admin.guru.index');
        }
}
}
