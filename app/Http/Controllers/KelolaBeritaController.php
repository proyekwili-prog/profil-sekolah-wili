<?php


namespace App\Http\Controllers;

use App\Models\KelolaBerita;
use Exception;
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
        return view('berita.tambah', [
            'title' => 'Tambah Berita Baru',
        ]);
    }

    public function detail($id)
    {
        try{

            $berita = KelolaBerita::with('user')
                ->findOrFail(Crypt::decrypt($id));
    
            return view('berita.detail', [
                'title' => 'Detail Berita',
                'berita' => $berita,
                ]);
        }
       catch(Exception $e) {
            return redirect()->route('admin.berita.index');
        }
    }

    public function store(Request $request)
    {
        // Pastikan pengguna sudah login.
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Ambil ID dari akun yang sedang login,
        // bukan dari input form.
        $data['id_user'] = Auth::user()->getAuthIdentifier();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        KelolaBerita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {

            return view('berita.edit', [
                'title' => 'Edit Berita',
                'berita' => KelolaBerita::findOrFail(
                    Crypt::decrypt($id)
                ),
            ]);
        }
        catch(Exception $e) {
            return redirect()->route('admin.berita.index');
        }

    }

    public function update(Request $request, $id)
    {
        $berita = KelolaBerita::findOrFail($id);

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

            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        } else {
            unset($data['gambar']);
        }

        // id_user tidak diubah saat berita diedit.
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
