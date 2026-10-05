<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSekolahController extends Controller
{
    public function index()
    {
        return view('admin.profil', [
            'title' => 'Profil Sekolah',
            'profile' => ProfileSekolah::first(),
        ]);
    }

    public function edit()
    {
        return view('admin.edit_profil', [
            'title' => 'Edit Profil Sekolah',
            'profile' => ProfileSekolah::first(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'kepala_sekolah' => 'nullable|string|max:255',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'nullable|string|max:15',
            'visi_misi' => 'nullable|string',
            'tahun_berdiri' => 'nullable|integer|min:1900|max:2100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $profile = ProfileSekolah::first() ?? new ProfileSekolah();

        if ($request->hasFile('foto')) {
            if ($profile->foto) {
                Storage::disk('public')->delete($profile->foto);
            }
            $data['foto'] = $request->file('foto')->store('profil', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('profil', 'public');
        }

        $profile->fill($data);
        $profile->save();

        return redirect()->route('admin.profile')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}
