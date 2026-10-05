@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Berita</h3>
            <p class="text-muted mb-0">Kelola berita dan informasi sekolah.</p>
        </div>
        <a href="{{ route('admin.berita.tambah') }}" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Berita
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th><th>Gambar</th><th>Judul</th>
                            <th>Tanggal</th><th>Penulis</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($beritas as $i => $berita)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                @if($berita->gambar)
                                    <img src="{{ asset('storage/'.$berita->gambar) }}"
                                         width="80" height="55" class="rounded border"
                                         style="object-fit:cover">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $berita->judul }}</div>
                                <small class="text-muted">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 70) }}
                                </small>
                            </td>
                            <td>{{ $berita->tanggal }}</td>
                            <td>{{ $berita->user?->username ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.berita.edit', $berita->id_berita) }}"
                                   class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-5">Belum ada berita.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
