@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('public.admin')

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
                    <h3 class="fw-bold mb-0">
                        Detail Galeri
                    </h3>

                    <p class="text-muted mb-0">
                        Informasi lengkap galeri sekolah.
                    </p>
                </div>

            </div>
        </div>

        {{-- <a href="{{ route('admin.galeri.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a> --}}

    </div>


    <!-- Card Detail -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                    <i class="bi bi-image fs-5"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Informasi Galeri
                    </h5>

                    <small class="text-muted">
                        Detail lengkap dokumentasi galeri sekolah.
                    </small>

                </div>

            </div>

        </div>


        <!-- Card Body -->
        <div class="card-body p-4">

            <!-- Gambar -->
            @if($galeri->file)

                <div class="text-center mb-4">

                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::url($galeri->file) }}"
                        alt="{{ $galeri->judul }}"
                        class="img-fluid rounded-3 border"
                        style="
                            max-width: 700px;
                            max-height: 450px;
                            object-fit: contain;
                        ">

                </div>

            @else

                <div class="d-flex justify-content-center mb-4">

                    <div
                        class="bg-light border rounded-3 d-flex align-items-center justify-content-center"
                        style="width:700px; height:250px; max-width:100%;">

                        <div class="text-center text-muted">

                            <i class="bi bi-image fs-1"></i>

                            <div class="mt-2">
                                Tidak ada gambar galeri
                            </div>

                        </div>

                    </div>

                </div>

            @endif


            <!-- Informasi -->
            <div class="table-responsive">

                <table class="table-detail-galeri mb-0">

                    <tbody>

                        <!-- Judul -->
                        <tr>

                            <th>
                                <i class="bi bi-type me-2 text-primary"></i>
                                Judul
                            </th>

                            <td class="fw-semibold">
                                {{ $galeri->judul }}
                            </td>

                        </tr>


                        <!-- Kategori -->
                        <tr>

                            <th>
                                <i class="bi bi-tag me-2 text-primary"></i>
                                Kategori
                            </th>

                            <td>

                                @if($galeri->kategori === 'Foto')

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

                        </tr>


                        <!-- Tanggal -->
                        <tr>

                            <th>
                                <i class="bi bi-calendar3 me-2 text-primary"></i>
                                Tanggal
                            </th>

                            <td>
                                {{ \Carbon\Carbon::parse($galeri->tanggal)->translatedFormat('d F Y') }}
                            </td>

                        </tr>


                        <!-- Keterangan -->
                        <tr>

                            <th>
                                <i class="bi bi-card-text me-2 text-primary"></i>
                                Keterangan
                            </th>

                            <td style="white-space: pre-line;">

                                @if($galeri->keterangan)

                                    {{ $galeri->keterangan }}

                                @else

                                    -

                                @endif

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- Tombol -->
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="{{ route('admin.galeri.index') }}"
                   class="btn btn-outline-secondary">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali

                </a>

                <a
                    href="{{ route('admin.galeri.edit', Crypt::encrypt($galeri->id_galeri)) }}"
                    class="btn btn-primary">

                    <i class="bi bi-pencil me-1"></i>
                    Edit Galeri

                </a>

            </div>

        </div>

    </div>

</div>


<style>

    .table-detail-galeri {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dee2e6;
    }

    .table-detail-galeri th,
    .table-detail-galeri td {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
        vertical-align: middle;
    }

    .table-detail-galeri th {
        width: 200px;
        background-color: #f8f9fa;
        font-weight: 600;
        color: #212529;
    }

    .table-detail-galeri td {
        background-color: #ffffff;
        color: #212529;
    }

</style>

@endsection