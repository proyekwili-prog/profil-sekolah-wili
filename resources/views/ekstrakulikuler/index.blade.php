@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Ekstrakurikuler</h3>
            <p class="text-muted mb-0">Kelola kegiatan ekstrakurikuler sekolah.</p>
        </div>
        <a href="{{ route('admin.ekstrakulikuler.tambah') }}" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Ekstrakurikuler
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th><th>Gambar</th><th>Nama Ekstrakurikuler</th>
                            <th>Pembina</th><th>Jadwal Latihan</th><th>Deskripsi</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($ekstrakurikulers as $i => $eskul)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                @if($eskul->gambar)
                                    <img src="{{ asset('storage/'.$eskul->gambar) }}"
                                         width="85" height="60" class="rounded border"
                                         style="object-fit:cover">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $eskul->nama_eskul }}</td>
                            <td>{{ $eskul->pembina }}</td>
                            <td>{{ $eskul->jadwal_latihan }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($eskul->deskripsi, 70) }}</td>
                            <td>
                                <a href="{{ route('admin.ekstrakulikuler.edit', $eskul->id_eskul) }}"
                                   class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.ekstrakulikuler.destroy', $eskul->id_eskul) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ekstrakurikuler ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted py-5">Belum ada data ekstrakurikuler.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
