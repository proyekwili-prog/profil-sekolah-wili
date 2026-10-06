<?php

namespace App\Http\Controllers;

use App\Models\KelolaSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
class KelolaSiswaController extends Controller
{
    public function index()
    {
        $siswas = KelolaSiswa::orderBy('id_siswa', 'desc')->get();

        return view('siswa.index', [
            'title' => 'Kelola Siswa',
            'siswas' => $siswas,
            'totalSiswa' => $siswas->count(),
        ]);
    }

    public function create()
    {
        return view('siswa.tambah', ['title' => 'Tambah Data Siswa']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nisn' => 'required|string|max:10',
            'nama_siswa' => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:2000|max:2100',
        ]);

        KelolaSiswa::create($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('siswa.edit', [
            'title' => 'Edit Data Siswa',
            'siswa' => KelolaSiswa::findOrFail(Crypt::decrypt($id)),
        ]);
    }

    public function update(Request $request, $id)
    {
        $siswa = KelolaSiswa::findOrFail(Crypt::decrypt($id));

        $data = $request->validate([
            'nisn' => 'required|string|max:10',
            'nama_siswa' => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|integer|min:2000|max:2100',
        ]);

        $siswa->update($data);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        KelolaSiswa::findOrFail($id)->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
