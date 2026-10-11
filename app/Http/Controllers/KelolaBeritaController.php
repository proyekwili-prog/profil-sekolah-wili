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
    /**
     * Pastikan hanya Admin atau pemilik berita yang boleh mengubahnya.
     */
    private function pastikanPemilikAtauAdmin(KelolaBerita $berita): void
    {
        $user = Auth::user();

        abort_unless($user, 401);

        if (strtolower((string) $user->role) === 'admin') {
            return;
        }

        abort_unless(
            (int) $berita->id_user === (int) $user->getAuthIdentifier(),
            403,
            'Anda hanya dapat mengelola berita milik sendiri.'
        );
    }

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
        try {
            $berita = KelolaBerita::with('user')
                ->findOrFail(Crypt::decrypt($id));

            return view('berita.detail', [
                'title' => 'Detail Berita',
                'berita' => $berita,
            ]);
        } catch (Exception $e) {
            return redirect()->route('admin.berita.index');
        }
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $data = $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Pembuat diambil dari akun login, bukan dari form.
        $data['id_user'] = Auth::id();

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
        $berita = KelolaBerita::findOrFail(
            Crypt::decrypt($id)
        );
    } catch (Exception $e) {
        return redirect()->route('admin.berita.index');
    }

    $this->pastikanPemilikAtauAdmin($berita);

    return view('berita.edit', [
        'title' => 'Edit Berita',
        'berita' => $berita,
    ]);
}


    public function update(Request $request, $id)
    {
        $berita = KelolaBerita::findOrFail($id);

        $this->pastikanPemilikAtauAdmin($berita);

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

        // Jangan izinkan perubahan id_user melalui form.
        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = KelolaBerita::findOrFail($id);

        $this->pastikanPemilikAtauAdmin($berita);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
