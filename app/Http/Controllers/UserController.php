<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id_user', 'desc')->get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:user,username',
            'password' => 'required|string|min:6',
            'role' => 'required|string|max:50',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'role.required' => 'Role wajib dipilih.',
        ]);

        User::create([
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Data user berhasil ditambahkan.');
    }

    /**
     * Membuka halaman edit user.
     */
    public function edit($id)
    {
        $idUser = $this->decryptUserId($id);

        $user = User::where('id_user', $idUser)->firstOrFail();

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Memperbarui data user.
     */
    public function update(Request $request, $id)
    {
        $idUser = $this->decryptUserId($id);

        $user = User::where('id_user', $idUser)->firstOrFail();

        $request->validate([
            'username' => 'required|string|max:255|unique:user,username,'
                . $user->id_user . ',id_user',
            'role' => 'required|string|max:50',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'role.required' => 'Role wajib dipilih.',
        ]);

        $data = [
            'username' => $request->username,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:6',
            ], [
                'password.min' => 'Password minimal 6 karakter.',
            ]);

            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Data user berhasil diperbarui.');
    }

    /**
     * Menghapus data user.
     */
    public function destroy($id)
    {
        $idUser = $this->decryptUserId($id);

        $user = User::where('id_user', $idUser)->firstOrFail();

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'Data user berhasil dihapus.');
    }

    /**
     * Mendekripsi ID user dari URL.
     */
    private function decryptUserId($id)
    {
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404, 'ID user tidak valid.');
        }
    }
}

