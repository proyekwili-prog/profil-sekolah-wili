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
                        Edit Galeri
                    </h3>

                    <p class="text-muted mb-0">
                        Perbarui dokumentasi foto dan kegiatan sekolah.
                    </p>
                </div>

            </div>
        </div>

        <a href="{{ route('admin.galeri.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>

    </div>


    <!-- Error -->
    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show shadow-sm"
             role="alert">

            <div class="d-flex align-items-start">

                <i class="bi bi-exclamation-triangle me-2 mt-1"></i>

                <div>

                    <strong>Terjadi kesalahan:</strong>

                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                </div>

            </div>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                    <i class="bi bi-pencil-square fs-5"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Form Edit Galeri
                    </h5>

                    <small class="text-muted">
                        Perbarui informasi dokumentasi sekolah.
                    </small>

                </div>

            </div>

        </div>


        <!-- Card Body -->
        <div class="card-body p-4">

            <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <!-- Judul -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Judul
                        <span class="text-danger">*</span>

                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        maxlength="50"
                        value="{{ old('judul', $galeri->judul) }}"
                        placeholder="Masukkan judul dokumentasi"
                        required>

                    <small class="text-muted">
                        Maksimal 50 karakter.
                    </small>

                </div>


                <!-- Keterangan -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        class="form-control"
                        placeholder="Masukkan keterangan dokumentasi...">{{ old('keterangan', $galeri->keterangan) }}</textarea>

                </div>


                <!-- Kategori -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Kategori
                        <span class="text-danger">*</span>

                    </label>

                    <select
                        name="kategori"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <option
                            value="Foto"
                            @selected(old('kategori', $galeri->kategori) === 'Foto')>

                            Foto

                        </option>

                        <option
                            value="Video"
                            @selected(old('kategori', $galeri->kategori) === 'Video')>

                            Video

                        </option>

                    </select>

                </div>


                <!-- Tanggal -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Tanggal
                        <span class="text-danger">*</span>

                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="{{ old('tanggal', $galeri->tanggal) }}"
                        required>

                </div>


                <!-- File Saat Ini -->
                @if($galeri->file)

                    <div class="mb-4">

                        <label class="form-label fw-semibold d-block">
                            File Saat Ini
                        </label>

                        <div class="border rounded-3 p-2 d-inline-block bg-light">

                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::url($galeri->file) }}"
                                width="180"
                                height="120"
                                class="rounded"
                                style="object-fit: cover;"
                                alt="{{ $galeri->judul }}">

                        </div>

                    </div>

                @endif


                <!-- Ganti File -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Ganti File
                    </label>

                    <input
                        type="file"
                        name="file"
                        class="form-control"
                        accept="image/*">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti file.
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                </div>


                <!-- Tombol -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.galeri.index') }}"
                       class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<style>

    .form-control,
    .form-select {
        border-color: #dee2e6;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
    }

    textarea.form-control {
        resize: vertical;
    }

</style>

@endsection