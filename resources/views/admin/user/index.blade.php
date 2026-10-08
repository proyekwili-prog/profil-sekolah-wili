@php
    use Illuminate\Support\Facades\Crypt;
@endphp
@extends('public.admin')

@section('title', 'Data User')

@section('content')
<div class="container-fluid px-4 py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data User</h3>
            <p class="text-muted mb-0">Kelola data pengguna sistem.</p>
        </div>

        @if(strtolower(auth()->user()->role) === 'admin')
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i> Tambah User
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

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
                                <th width="120">Aksi</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                             style="width:38px;height:38px;">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <span class="fw-semibold">{{ $user->username }}</span>
                                    </div>
                                </td>

                                <td>
                                    @if($user->role === 'admin')
                                        <span class="badge bg-danger">Admin</span>
                                    @elseif($user->role === 'operator')
                                        <span class="badge bg-warning text-dark">Operator</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $user->role }}</span>
                                    @endif
                                </td>

                                @if(strtolower(auth()->user()->role) === 'admin')
                                    <td>
                                       <a href="{{ route('admin.user.edit', ['id' => Crypt::encrypt($user->id_user)]) }}" class="btn btn-sm btn-warning"> <i class="bi bi-pencil-square"></i> </a> 

                                        <form action="{{ route('admin.user.destroy', Crypt::encrypt($user->id_user)) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
@endsection

