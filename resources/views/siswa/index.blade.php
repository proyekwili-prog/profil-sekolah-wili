@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Siswa</h3>
            <p class="text-muted mb-0">Kelola data siswa sekolah.</p>
        </div>
        <a href="{{ route('admin.siswa.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th><th>NISN</th><th>Nama Siswa</th>
                            <th>Jenis Kelamin</th><th>Tahun Masuk</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($siswas as $i => $siswa)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td class="fw-semibold">{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                            <td>{{ $siswa->tahun_masuk }}</td>
                            <td>
                                <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                   class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-5">Belum ada data siswa.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
