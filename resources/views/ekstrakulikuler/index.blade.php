
@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="container-fluid px-0">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-trophy fs-5"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-0">
                        Kelola Ekstrakurikuler
                    </h3>

                    <p class="text-muted mb-0">
                        Kelola data kegiatan ekstrakurikuler sekolah.
                    </p>
                </div>

            </div>
        </div>

        {{-- TAMBAH: ADMIN DAN OPERATOR --}}
        @if(auth()->check() && in_array(strtolower(auth()->user()->role), ['admin', 'operator1', 'operator2'], true))
            <a href="{{ route('admin.ekstrakulikuler.tambah') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle me-1"></i>
                Tambah Ekstrakurikuler

            </a>
        @endif
    </div>

    {{-- NOTIFIKASI SUKSES --}}
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

    {{-- NOTIFIKASI ERROR --}}
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

    {{-- CARD DATA --}}
    <div class="card border-0 shadow-sm">

        {{-- CARD HEADER --}}
        <div class="card-header bg-white border-bottom py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center">

                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                        <i class="bi bi-list-ul fs-5"></i>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">
                            Data Ekstrakurikuler
                        </h5>

                        <small class="text-muted">
                            Daftar kegiatan ekstrakurikuler sekolah
                        </small>
                    </div>

                </div>

                <span class="badge bg-primary rounded-pill px-3 py-2">
                    {{ $ekstrakurikulers->count() }} Data
                </span>

            </div>

        </div>

        {{-- CARD BODY --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>

                            <th class="text-center" style="width:60px;">
                                No
                            </th>

                            <th class="text-center" style="width:110px;">
                                Gambar
                            </th>

                            <th>
                                Nama Ekstrakurikuler
                            </th>

                            <th>
                                Pembina
                            </th>

                            <th>
                                Jadwal Latihan
                            </th>

                            <th class="text-center" style="width:150px;">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @forelse($ekstrakurikulers as $i => $ekstrakurikuler)

                            <tr>

                                {{-- NOMOR --}}
                                <td class="text-center">
                                    {{ $i + 1 }}
                                </td>

                                {{-- GAMBAR --}}
                                <td class="text-center">

                                    @if($ekstrakurikuler->gambar)

                                        <img
                                            src="{{ \Illuminate\Support\Facades\Storage::url($ekstrakurikuler->gambar) }}"
                                            alt="{{ $ekstrakurikuler->nama_eskul }}"
                                            width="75"
                                            height="55"
                                            class="rounded border"
                                            style="object-fit:cover;">

                                    @else

                                        <div
                                            class="bg-light border rounded d-inline-flex align-items-center justify-content-center"
                                            style="width:75px;height:55px;">

                                            <i class="bi bi-image text-muted"></i>

                                        </div>

                                    @endif

                                </td>

                                {{-- NAMA --}}
                                <td class="fw-semibold">
                                    {{ $ekstrakurikuler->nama_eskul }}
                                </td>

                                {{-- PEMBINA --}}
                                <td>
                                    {{ $ekstrakurikuler->pembina }}
                                </td>

                                {{-- JADWAL --}}
                                <td>
                                    {{ $ekstrakurikuler->jadwal_latihan }}
                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">

                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('admin.ekstrakulikuler.detail', Crypt::encrypt($ekstrakurikuler->id_eskul)) }}"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    {{-- EDIT DAN HAPUS: ADMIN DAN OPERATOR --}}
                                    @if(auth()->check() && in_array(strtolower(auth()->user()->role), ['admin', 'operator1', 'operator2'], true))

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.ekstrakulikuler.edit', Crypt::encrypt($ekstrakurikuler->id_eskul)) }}"
                                            class="btn btn-sm btn-outline-secondary"
                                            title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('admin.ekstrakulikuler.destroy', $ekstrakurikuler->id_eskul) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ekstrakurikuler ini?');">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Hapus">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-trophy fs-1 text-muted d-block mb-2"></i>

                                    <span class="text-muted">
                                        Belum ada data ekstrakurikuler.
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

    .btn-outline-primary:hover,
    .btn-outline-secondary:hover,
    .btn-outline-danger:hover {
        color: #fff;
    }

    @media (max-width: 768px) {
        .container-fluid > .d-flex.justify-content-between {
            align-items: flex-start !important;
            flex-direction: column;
            gap: 15px;
        }
    }
</style>

@endsection
