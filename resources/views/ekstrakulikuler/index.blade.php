@extends('layout.admin')

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
                        Kelola Ekstrakurikuler
                    </h3>

                    <p class="text-muted mb-0">
                        Kelola data kegiatan ekstrakurikuler sekolah.
                    </p>
                </div>

            </div>
        </div>

        <a href="{{ route('admin.ekstrakulikuler.tambah') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Ekstrakurikuler

        </a>
    </div>


    <!-- Notifikasi -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show shadow-sm"
             role="alert">

            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- Card Data -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
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


        <!-- Card Body -->
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

                        @foreach($ekstrakurikulers as $i => $ekstrakurikuler)

                            <tr>

                                <!-- No -->
                                <td class="text-center">
                                    {{ $i + 1 }}
                                </td>


                                <!-- Gambar -->
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

                                        <div class="bg-light border rounded d-inline-flex align-items-center justify-content-center"
                                             style="width:75px;height:55px;">

                                            <i class="bi bi-image text-muted"></i>

                                        </div>

                                    @endif

                                </td>


                                <!-- Nama -->
                                <td class="fw-semibold">
                                    {{ $ekstrakurikuler->nama_eskul }}
                                </td>


                                <!-- Pembina -->
                                <td>
                                    {{ $ekstrakurikuler->pembina }}
                                </td>


                                <!-- Jadwal -->
                                <td>
                                    {{ $ekstrakurikuler->jadwal_latihan }}
                                </td>


                                <!-- Aksi -->
                                <td class="text-center">

                                    <!-- Detail -->
                                    <a href="{{ route('admin.ekstrakulikuler.detail', Crypt::encrypt($ekstrakurikuler->id_eskul)) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    <!-- Edit -->
                                    <a href="{{ route('admin.ekstrakulikuler.edit',Crypt::encrypt($ekstrakurikuler->id_eskul)) }}"
                                       class="btn btn-sm btn-outline-secondary"
                                       title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <!-- Hapus -->
                                    <form
                                        action="{{ route('admin.ekstrakulikuler.destroy', $ekstrakurikuler->id_eskulz) }}"
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

                                </td>

                            </tr>

                        @endforeach

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
</style>

@endsection