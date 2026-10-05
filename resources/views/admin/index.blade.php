@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-4 py-4">
    
    <!-- Header / Banner Bagian Atas -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold text-dark mb-1">
                <i class="bi bi-trophy-fill me-2 text-secondary"></i> Kelola Ekstrakurikuler & Galeri Kegiatan
            </h3>
            <p class="text-muted small mb-0">Manajemen data kegiatan ekstrakurikuler resmi serta dokumentasi foto kegiatan sekolah.</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <!-- Tombol Tambah Data -->
            <button type="button" class="btn btn-secondary shadow-sm px-3 py-2 d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#tambahEkskulModal">
                <i class="bi bi-plus-circle-fill"></i> Tambah Ekstrakurikuler
            </button>
        </div>
    </div>

    <!-- Tabel Daftar Ekstrakurikuler -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5">
        <div class="card-header bg-white py-3 px-4 border-0">
            <h5 class="fw-bold text-dark m-0"><i class="bi bi-list-check me-2 text-secondary"></i> Daftar Kegiatan Ekstrakurikuler</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-uppercase fs-7 text-secondary">
                        <tr>
                            <th class="py-3 px-4" style="width: 5%;">No</th>
                            <th class="py-3 px-4">Nama Ekstrakurikuler</th>
                            <th class="py-3 px-4">Pembina / Pelatih</th>
                            <th class="py-3 px-4">Jadwal Kegiatan</th>
                            <th class="py-3 px-4 text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 1. Pramuka -->
                        <tr>
                            <td class="px-4 fw-semibold text-secondary">1</td>
                            <td class="px-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light p-2 rounded-3 text-secondary border">
                                        <i class="bi bi-compass fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Pramuka</span>
                                        <span class="text-muted small">Kepanduan Wajib Sekolah</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 text-secondary">Bapak Asep, S.Pd.</td>
                            <td class="px-4">
                                <span class="badge bg-light text-secondary border px-2 py-1">Jumat, 14:00 WIB</span>
                            </td>
                            <td class="px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- 2. Paskibra -->
                        <tr>
                            <td class="px-4 fw-semibold text-secondary">2</td>
                            <td class="px-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light p-2 rounded-3 text-secondary border">
                                        <i class="bi bi-flag fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Paskibra</span>
                                        <span class="text-muted small">Pasukan Pengibar Bendera</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 text-secondary">Ibu Rina, S.Pd.</td>
                            <td class="px-4">
                                <span class="badge bg-light text-secondary border px-2 py-1">Kamis, 15:00 WIB</span>
                            </td>
                            <td class="px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- 3. Volly -->
                        <tr>
                            <td class="px-4 fw-semibold text-secondary">3</td>
                            <td class="px-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light p-2 rounded-3 text-secondary border">
                                        <i class="bi bi-activity fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Bola Voli</span>
                                        <span class="text-muted small">Olahraga & Prestasi</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 text-secondary">Bapak Rudi, S.Or.</td>
                            <td class="px-4">
                                <span class="badge bg-light text-secondary border px-2 py-1">Selasa, 15:30 WIB</span>
                            </td>
                            <td class="px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>

                        <!-- 4. Perisai Diri -->
                        <tr>
                            <td class="px-4 fw-semibold text-secondary">4</td>
                            <td class="px-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-light p-2 rounded-3 text-secondary border">
                                        <i class="bi bi-shield-shaded fs-5"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold text-dark d-block">Perisai Diri</span>
                                        <span class="text-muted small">Seni Bela Diri Tradisional</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 text-secondary">Bapak Hendra</td>
                            <td class="px-4">
                                <span class="badge bg-light text-secondary border px-2 py-1">Rabu, 14:00 WIB</span>
                            </td>
                            <td class="px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-sm btn-outline-secondary" title="Edit"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bagian Dokumentasi & Galeri Foto Kegiatan Ekstrakurikuler -->
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <h4 class="fw-bold text-dark m-0">
                <i class="bi bi-images me-2 text-secondary"></i> Galeri & Foto Kegiatan
            </h4>
            <p class="text-muted small m-0">Dokumentasi momen latihan dan perlombaan ekstrakurikuler.</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <!-- Tombol Unggah Foto Baru -->
            <button type="button" class="btn btn-outline-secondary shadow-sm px-3 py-2 d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#uploadFotoModal">
                <i class="bi bi-cloud-arrow-up-fill"></i> Unggah Foto Kegiatan
            </button>
        </div>
    </div>

    <!-- Grid Kartu Foto Dokumentasi -->
    <div class="row g-4">
        <!-- Foto 1 -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?w=500&auto=format&fit=crop&q=60" class="card-img-top" alt="Kegiatan Pramuka" style="height: 180px; object-fit: cover;">
                    <span class="position-absolute top-0 end-0 m-2 badge bg-secondary bg-opacity-75 backdrop-blur">Pramuka</span>
                </div>
                <div class="card-body p-3">
                    <h6 class="fw-bold text-dark mb-1">Pelantikan Anggota Baru</h6>
                    <p class="text-muted small mb-3">Kegiatan perkemahan dan pelantikan bantara tingkat sekolah.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted fs-7"><i class="bi bi-calendar3 me-1"></i> 12 Agustus 2026</span>
                        <button class="btn btn-sm btn-outline-danger border-0" title="Hapus Foto"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Foto 2 -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?w=500&auto=format&fit=crop&q=60" class="card-img-top" alt="Kegiatan Paskibra" style="height: 180px; object-fit: cover;">
                    <span class="position-absolute top-0 end-0 m-2 badge bg-secondary bg-opacity-75 backdrop-blur">Paskibra</span>
                </div>
                <div class="card-body p-3">
                    <h6 class="fw-bold text-dark mb-1">Latihan Baris-Berbaris</h6>
                    <p class="text-muted small mb-3">Persiapan petugas pengibar bendera untuk upacara hari senin.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted fs-7"><i class="bi bi-calendar3 me-1"></i> 04 September 2026</span>
                        <button class="btn btn-sm btn-outline-danger border-0" title="Hapus Foto"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Foto 3 -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1612872087720-bb876e2e67d1?w=500&auto=format&fit=crop&q=60" class="card-img-top" alt="Kegiatan Volly" style="height: 180px; object-fit: cover;">
                    <span class="position-absolute top-0 end-0 m-2 badge bg-secondary bg-opacity-75 backdrop-blur">Bola Voli</span>
                </div>
                <div class="card-body p-3">
                    <h6 class="fw-bold text-dark mb-1">Sparring Partner Antar Kelas</h6>
                    <p class="text-muted small mb-3">Pertandingan persahabatan bola voli untuk menjaring atlet bakat.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted fs-7"><i class="bi bi-calendar3 me-1"></i> 20 Agustus 2026</span>
                        <button class="btn btn-sm btn-outline-danger border-0" title="Hapus Foto"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Foto 4 -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                <div class="position-relative">
                    <img src="https://images.unsplash.com/photo-1555597673-b21d5c935865?w=500&auto=format&fit=crop&q=60" class="card-img-top" alt="Kegiatan Perisai Diri" style="height: 180px; object-fit: cover;">
                    <span class="position-absolute top-0 end-0 m-2 badge bg-secondary bg-opacity-75 backdrop-blur">Perisai Diri</span>
                </div>
                <div class="card-body p-3">
                    <h6 class="fw-bold text-dark mb-1">Ujian Kenaikan Tingkat</h6>
                    <p class="text-muted small mb-3">Evaluasi teknik jurus dasar dan fisik anggota bela diri.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted fs-7"><i class="bi bi-calendar3 me-1"></i> 10 September 2026</span>
                        <button class="btn btn-sm btn-outline-danger border-0" title="Hapus Foto"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection