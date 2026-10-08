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

            // FOTO PROFIL SEKOLAH
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            // LOGO SEKOLAH
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            // FOTO KEPALA SEKOLAH
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',

            // SAMBUTAN KEPALA SEKOLAH
            'sambutan_kepala_sekolah' => 'nullable|string',
        ]);

        $profile = ProfileSekolah::first() ?? new ProfileSekolah();


        /*
        |--------------------------------------------------------------------------
        | FOTO PROFIL SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            if ($profile->foto) {
                Storage::disk('public')->delete($profile->foto);
            }

            $data['foto'] = $request
                ->file('foto')
                ->store('profil', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | LOGO SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }

            $data['logo'] = $request
                ->file('logo')
                ->store('profil', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | FOTO KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_kepala_sekolah')) {

            if ($profile->foto_kepala_sekolah) {
                Storage::disk('public')->delete(
                    $profile->foto_kepala_sekolah
                );
            }

            $data['foto_kepala_sekolah'] = $request
                ->file('foto_kepala_sekolah')
                ->store('profil', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | SAMBUTAN KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        $data['sambutan_kepala_sekolah'] =
            $request->input('sambutan_kepala_sekolah');


        /*
        |--------------------------------------------------------------------------
        | SIMPAN SEMUA DATA
        |--------------------------------------------------------------------------
        */

        $profile->fill($data);
        $profile->save();


        return redirect()
            ->route('admin.profile')
            ->with(
                'success',
                'Profil sekolah berhasil diperbarui.'
            );
    }
}