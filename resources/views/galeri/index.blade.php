@php

    use Illuminate\Support\Facades\Crypt;
    use Illuminate\Support\Facades\Storage;
@endphp

@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="container-fluid px-0">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-images fs-5"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-0">Kelola Galeri</h3>
                    <p class="text-muted mb-0">
                        Kelola foto dan dokumentasi kegiatan sekolah.
                    </p>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.galeri.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Galeri
        </a>
    </div>

    <!-- Success -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm"
             role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Tutup">
            </button>
        </div>
    @endif

    <!-- Error -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm"
             role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Tutup">
            </button>
        </div>
    @endif

    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                        <i class="bi bi-images fs-5"></i>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">Data Galeri</h5>
                        <small class="text-muted">
                            Daftar dokumentasi foto dan video sekolah
                        </small>
                    </div>
                </div>

                <span class="badge bg-primary rounded-pill px-3 py-2">
                    {{ $galeri->count() }} Data
                </span>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th class="text-center" style="width: 130px;">Foto / Video</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($galeri as $i => $item)
                            <tr>

                                <!-- Nomor -->
                                <td class="text-center">
                                    {{ $i + 1 }}
                                </td>

                                <!-- Foto / Video -->
                                <td class="text-center">
                                    @if($item->file)
                                        @if($item->kategori === 'Video')
                                            <video
                                                class="galeri-video rounded border"
                                                controls
                                                preload="metadata"
                                                playsinline
                                                aria-label="{{ $item->judul }}">
                                                <source
                                                    src="{{ Storage::url($item->file) }}">
                                                Browser tidak mendukung pemutar video.
                                            </video>
                                        @else
                                            <img
                                                src="{{ Storage::url($item->file) }}"
                                                alt="{{ $item->judul }}"
                                                class="galeri-foto rounded border"
                                                loading="lazy">
                                        @endif
                                    @else
                                        <div class="galeri-placeholder bg-light border rounded d-inline-flex align-items-center justify-content-center">
                                            @if($item->kategori === 'Video')
                                                <i class="bi bi-camera-video text-muted fs-4"></i>
                                            @else
                                                <i class="bi bi-image text-muted fs-4"></i>
                                            @endif
                                        </div>
                                    @endif
                                </td>

                                <!-- Judul -->
                                <td class="fw-semibold">
                                    {{ $item->judul }}
                                </td>

                                <!-- Kategori -->
                                <td>
                                    @if($item->kategori === 'Foto')
                                        <span class="badge bg-primary">
                                            <i class="bi bi-image me-1"></i>
                                            Foto
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-camera-video me-1"></i>
                                            Video
                                        </span>
                                    @endif
                                </td>

                                <!-- Tanggal -->
                                <td>
                                    @if($item->tanggal)
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <!-- Aksi -->
                                <td class="text-center">

                                    <!-- Detail -->
                                    <a
                                        href="{{ route('admin.galeri.detail', Crypt::encrypt($item->id_galeri)) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- Edit -->
                                    <a
                                        href="{{ route('admin.galeri.edit', Crypt::encrypt($item->id_galeri)) }}"
                                        class="btn btn-sm btn-outline-secondary"
                                        title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Hapus -->
                                    <form
                                        action="{{ route('admin.galeri.destroy', Crypt::encrypt($item->id_galeri)) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data galeri ini?');">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-images fs-1 text-muted d-block mb-2"></i>
                                    <span class="text-muted">
                                        Belum ada data galeri.
                                    </span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table thead th {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
        font-weight: 600;
        color: #334155;
        white-space: nowrap;
    }

    .table tbody td {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .galeri-foto,
    .galeri-video,
    .galeri-placeholder {
        width: 100px;
        height: 65px;
    }

    .galeri-foto {
        display: inline-block;
        object-fit: cover;
    }

    .galeri-video {
        display: inline-block;
        object-fit: contain;
        background-color: #000;
    }

    .galeri-placeholder {
        width: 75px;
        height: 55px;
    }

    .btn-outline-primary:hover,
    .btn-outline-secondary:hover,
    .btn-outline-danger:hover {
        color: #fff;
    }
</style>

@endsection