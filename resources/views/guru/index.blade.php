@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Guru</h3>
            <p class="text-muted mb-0">Kelola data guru sekolah.</p>
        </div>
        <a href="{{ route('admin.guru.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Guru
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($gurus as $i => $guru)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>
                                @if($guru->foto)
                                    <img src="{{ asset('storage/'.$guru->foto) }}"
                                         width="55" height="55"
                                         class="rounded-circle border"
                                         style="object-fit:cover">
                                @else
                                    <div class="bg-light border rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:55px;height:55px">
                                        <i class="bi bi-person text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $guru->nama_guru }}</td>
                            <td>{{ $guru->nip ?? '-' }}</td>
                            <td>{{ $guru->mapel }}</td>
                            <td>
                                <a href="{{ route('admin.guru.edit', $guru->id_guru) }}"
                                   class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                Belum ada data guru.
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
