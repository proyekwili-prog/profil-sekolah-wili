
@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('layout.admin')

@section('title', 'Data User')

@section('content')
<div class="container-fluid px-4 py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data User</h3>
            <p class="text-muted mb-0">Kelola data pengguna sistem.</p>
        </div>

        @if(strtolower(auth()->user()->role) === 'admin')
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i>
                Tambah User
            </a>
        @endif
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel User --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-primary">
                        <tr>
                            <th width="80">No</th>
                            <th>Username</th>
                            <th>Role</th>

                            @if(strtolower(auth()->user()->role) === 'admin')
                                <th width="140">Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                {{-- Nomor --}}
                                <td>{{ $loop->iteration }}</td>

                                {{-- Username --}}
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                             style="width:38px;height:38px; flex-shrink:0;">
                                            <i class="bi bi-person"></i>
                                        </div>

                                        <span class="fw-semibold">
                                            {{ $user->username }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Role --}}
                                <td>
                                    @if(strtolower($user->role) === 'admin')
                                        <span class="badge bg-danger">
                                            <i class="bi bi-shield-lock me-1"></i>
                                            Admin
                                        </span>
                                    @elseif(strtolower($user->role) === 'operator')
                                        <span class="badge bg-warning text-dark">
                                            Operator
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            {{ $user->role }}
                                        </span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                @if(strtolower(auth()->user()->role) === 'admin')
                                    <td>
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('admin.user.edit', [
                                                'id' => Crypt::encrypt($user->id_user)
                                            ]) }}"
                                           class="btn btn-sm btn-warning"
                                           title="Edit User">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        @if(strtolower($user->role) === 'admin')
                                            {{-- Admin tidak dapat dihapus --}}
                                            <button type="button"
                                                    class="btn btn-sm btn-secondary"
                                                    disabled
                                                    title="Akun Admin tidak dapat dihapus"
                                                    aria-label="Akun Admin tidak dapat dihapus">
                                                <i class="bi bi-lock-fill"></i>
                                            </button>
                                        @else
                                            {{-- User selain Admin dapat dihapus --}}
                                            <form action="{{ route('admin.user.destroy', Crypt::encrypt($user->id_user)) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus user ini?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="Hapus User">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ strtolower(auth()->user()->role) === 'admin' ? 4 : 3 }}"
                                    class="text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    Belum ada data user.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
@endsection