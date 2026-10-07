@extends('public.admin')

@section('title', $title)

@section('content')

<div class="container-fluid px-0">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-trophy fs-5"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-0">
                        Detail Ekstrakurikuler
                    </h3>

                    <p class="text-muted mb-0">
                        Informasi lengkap kegiatan ekstrakurikuler sekolah.
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
                    <i class="bi bi-info-circle fs-5"></i>
                </div>

                <div>
                    <h5 class="fw-bold mb-1">
                        Informasi Ekstrakurikuler
                    </h5>

                    <small class="text-muted">
                        Detail lengkap kegiatan ekstrakurikuler.
                    </small>
                </div>

            </div>

        </div>


        <!-- Card Body -->
        <div class="card-body p-4">

            <!-- Gambar -->
            @if($ekstrakurikuler->gambar)

                <div class="text-center mb-4">

                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::url($ekstrakurikuler->gambar) }}"
                        alt="{{ $ekstrakurikuler->nama_eskul }}"
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
                                Tidak ada gambar ekstrakurikuler
                            </div>

                        </div>

                    </div>

                </div>

            @endif


            <!-- Informasi -->
            <div class="table-responsive">

                <table class="table-detail-eskul mb-0">

                    <tbody>

                        <!-- Nama -->
                        <tr>

                            <th>
                                <i class="bi bi-trophy me-2 text-primary"></i>
                                Nama Ekstrakurikuler
                            </th>

                            <td class="fw-semibold">
                                {{ $ekstrakurikuler->nama_eskul }}
                            </td>

                        </tr>


                        <!-- Pembina -->
                        <tr>

                            <th>
                                <i class="bi bi-person me-2 text-primary"></i>
                                Pembina
                            </th>

                            <td>
                                {{ $ekstrakurikuler->pembina }}
                            </td>

                        </tr>


                        <!-- Jadwal -->
                        <tr>

                            <th>
                                <i class="bi bi-calendar3 me-2 text-primary"></i>
                                Jadwal Latihan
                            </th>

                            <td>
                                {{ $ekstrakurikuler->jadwal_latihan }}
                            </td>

                        </tr>


                        <!-- Deskripsi -->
                        <tr>

                            <th>
                                <i class="bi bi-file-text me-2 text-primary"></i>
                                Deskripsi
                            </th>

                            <td style="white-space: pre-line;">
                                {{ $ekstrakurikuler->deskripsi }}
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            <!-- Tombol -->
            <div class="d-flex justify-content-end gap-2 mt-4">

                <a href="{{ route('admin.ekstrakulikuler.index') }}"
                   class="btn btn-outline-secondary">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali

                </a>

                <a href="{{ route('admin.ekstrakulikuler.edit', $ekstrakurikuler->id_eskul) }}"
                   class="btn btn-primary">

                    <i class="bi bi-pencil me-1"></i>
                    Edit Ekstrakurikuler

                </a>

            </div>

        </div>

    </div>

</div>


<style>
    .table-detail-eskul {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #dee2e6;
    }

    .table-detail-eskul th,
    .table-detail-eskul td {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
        vertical-align: middle;
    }

    .table-detail-eskul th {
        width: 220px;
        background-color: #f8f9fa;
        font-weight: 600;
        color: #212529;
    }

    .table-detail-eskul td {
        background-color: #ffffff;
        color: #212529;
    }
</style>

@endsection