@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Galeri</h3>
            <p class="text-muted mb-0">Dokumentasi kegiatan sekolah.</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Galeri
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th><th>File</th><th>Judul</th>
                            <th>Keterangan</th><th>Kategori</th><th>Tanggal</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($galeri as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>
                                @if($item->file)
                                    <img src="{{ asset('storage/'.$item->file) }}"
                                         width="90" height="60" class="rounded border"
                                         style="object-fit:cover">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $item->judul }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($item->keterangan ?? '-', 60) }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $item->kategori }}</span></td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <a href="{{ route('admin.galeri.edit', $item->id_galeri) }}"
                                   class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.galeri.destroy', $item->id_galeri) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
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
                            <td colspan="7" class="text-center text-muted py-5">
                                Belum ada data galeri.
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