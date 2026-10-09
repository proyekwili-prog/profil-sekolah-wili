@extends('layout.admin')

@section('title', $title)

@section('content')

<div class="container-fluid px-0">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-newspaper fs-5"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-0">Detail Berita</h3>
                    <p class="text-muted mb-0">
                        Informasi lengkap berita sekolah.
                    </p>
                </div>
            </div>
        </div>

        
    </div>

    <!-- Card Detail -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                    <i class="bi bi-file-text fs-5"></i>
                </div>

                <div>
                    <h5 class="fw-bold mb-1">
                        Informasi Berita
                    </h5>

                    <small class="text-muted">
                        Detail lengkap artikel berita sekolah.
                    </small>
                </div>

            </div>

        </div>

        <!-- Card Body -->
        <div class="card-body p-4">

            <!-- Gambar -->
            @if($berita->gambar)

                <div class="text-center mb-4">

                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::url($berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="img-fluid rounded-3 border"
                        style="max-width:700px; max-height:400px; object-fit:cover;">

                </div>

            @else

                <div class="d-flex justify-content-center mb-4">

                    <div class="bg-light border rounded-3 d-flex align-items-center justify-content-center"
                         style="width:700px; height:250px; max-width:100%;">

                        <div class="text-center text-muted">

                            <i class="bi bi-image fs-1"></i>

                            <div class="mt-2">
                                Tidak ada gambar berita
                            </div>

                        </div>

                    </div>

                </div>

            @endif

            <!-- Informasi -->
            <div class="table-responsive">

                <table class="table-detail-berita mb-0">

                    <tbody>

                        <!-- Judul -->
                        <tr>

                            <th>
                                <i class="bi bi-type me-2 text-primary"></i>
                                Judul Berita
                            </th>

                            <td class="fw-semibold">
                                {{ $berita->judul }}
                            </td>

                        </tr>

                        <!-- Tanggal -->
                        <tr>

                            <th>
                                <i class="bi bi-calendar3 me-2 text-primary"></i>
                                Tanggal
                            </th>

                            <td>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
                            </td>

                        </tr>

                        <!-- Penulis -->
                        <tr>

                            <th>
                                <i class="bi bi-person me-2 text-primary"></i>
                                Penulis
                            </th>

                            <td>

                                @if($berita->user)

                                    {{ $berita->user->username }}

                                @else

                                    -

                                @endif

                            </td>

                        </tr>

                        <!-- Isi -->
                        <tr>

                            <th>
                                <i class="bi bi-file-text me-2 text-primary"></i>
                                Isi Berita
                            </th>

                            <td style="white-space: pre-line;">
                                {{ $berita->isi }}
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="{{ route('admin.berita.index') }}"
                   class="btn btn-outline-secondary">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali

                </a>

                <a href="{{ route('admin.berita.edit', \Illuminate\Support\Facades\Crypt::encrypt($berita->id_berita)) }}"
                   class="btn btn-primary">

                    <i class="bi bi-pencil me-1"></i>
                    Edit Berita

                </a>

            </div>

        </div>

    </div>

</div>

<style>
    .table-detail-berita {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dee2e6;
    }

    .table-detail-berita th,
    .table-detail-berita td {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
        vertical-align: middle;
    }

    .table-detail-berita th {
        width: 200px;
        background-color: #f8f9fa;
        font-weight: 600;
        color: #212529;
    }

    .table-detail-berita td {
        background-color: #ffffff;
        color: #212529;
    }
</style>

@endsection