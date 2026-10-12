<?php


namespace App\Http\Controllers;

use App\Models\KelolaEkstrakuliKuler;
use App\Models\KelolaGuru;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class KelolaEkstraKuliKulerController extends Controller
{
    /**
     * Admin dapat mengelola semua data.
     * Operator hanya dapat mengelola data miliknya sendiri.
     */
    private function pastikanPemilikAtauAdmin(
        KelolaEkstrakuliKuler $eskul
    ): void {
        $user = Auth::user();

        abort_unless($user, 401);

        if (strtolower((string) $user->role) === 'admin') {
            return;
        }

        abort_unless(
            (int) $eskul->id_user === (int) $user->getAuthIdentifier(),
            403,
            'Anda hanya dapat mengelola ekstrakurikuler milik sendiri.'
        );
    }

    public function index()
    {
        $ekstrakurikulers = KelolaEkstrakuliKuler::orderByDesc('id_eskul')
            ->get();

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
        try {
            $eskul = KelolaEkstrakuliKuler::findOrFail(
                Crypt::decrypt($id)
            );

            return view('ekstrakulikuler.detail', [
                'title' => 'Detail Ekstrakurikuler',
                'ekstrakurikuler' => $eskul,
            ]);
        } catch (Exception $e) {
            return redirect()->route('admin.ekstrakulikuler.index');
        }
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
            $data['gambar'] = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');
        }

        // Pemilik diambil dari akun yang sedang login.
        $data['id_user'] = Auth::id();

        KelolaEkstrakuliKuler::create($data);

        return redirect()->route('admin.ekstrakulikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {
            $eskul = KelolaEkstrakuliKuler::findOrFail(
                Crypt::decrypt($id)
            );
        } catch (Exception $e) {
            return redirect()->route('admin.ekstrakulikuler.index');
        }

        // Periksa pemilik sebelum menampilkan formulir edit.
        $this->pastikanPemilikAtauAdmin($eskul);

        return view('ekstrakulikuler.edit', [
            'title' => 'Edit Ekstrakurikuler',
            'ekstrakurikuler' => $eskul,
            'gurus' => KelolaGuru::orderBy('nama_guru')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $eskul = KelolaEkstrakuliKuler::findOrFail($id);

        // Periksa izin sebelum mengubah data atau gambar.
        $this->pastikanPemilikAtauAdmin($eskul);

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
            $gambarLama = $eskul->gambar;

            $data['gambar'] = $request->file('gambar')
                ->store('ekstrakurikuler', 'public');

            $eskul->update($data);

            if ($gambarLama) {
                Storage::disk('public')->delete($gambarLama);
            }
        } else {
            $eskul->update($data);
        }

        return redirect()->route('admin.ekstrakulikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $eskul = KelolaEkstrakuliKuler::findOrFail($id);

        // Periksa izin sebelum menghapus gambar maupun data.
        $this->pastikanPemilikAtauAdmin($eskul);

        if ($eskul->gambar) {
            Storage::disk('public')->delete($eskul->gambar);
        }

        $eskul->delete();

        return redirect()->route('admin.ekstrakulikuler.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
