    @extends('public.admin')

    @section('title', 'Edit Profil Sekolah')

    @section('content')
    <div class="container-fluid px-0">
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Edit Profil Sekolah</h3>
            <p class="text-muted mb-0">Perbarui informasi sekolah.</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control"
                                value="{{ old('nama_sekolah', $profile?->nama_sekolah) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">NPSN</label>
                            <input type="text" name="npsn" class="form-control"
                                value="{{ old('npsn', $profile?->npsn) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kepala Sekolah</label>
                            <input type="text" name="kepala_sekolah" class="form-control"
                                value="{{ old('kepala_sekolah', $profile?->kepala_sekolah) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" class="form-control"
                                value="{{ old('tahun_berdiri', $profile?->tahun_berdiri) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kontak</label>
                            <input type="text" name="kontak" class="form-control"
                                value="{{ old('kontak', $profile?->kontak) }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $profile?->alamat) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Visi & Misi</label>
                            <textarea name="visi_misi" class="form-control" rows="6">{{ old('visi_misi', $profile?->visi_misi) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $profile?->deskripsi) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Foto Profil/Gedung</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Logo Sekolah</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div>

                        <div class="row mb-3">
    <div class="col-md-6">
        <label for="foto_kepala_sekolah" class="form-label">
            Foto Kepala Sekolah
        </label>

        <input
            type="file"
            name="foto_kepala_sekolah"
            id="foto_kepala_sekolah"
            class="form-control"
            accept="image/jpeg,image/png,image/jpg,image/webp"
        >

        @if($profile?->foto_kepala_sekolah)
            <div class="mt-2">
                <img
                    src="{{ asset('storage/' . $profile->foto_kepala_sekolah) }}"
                    alt="Foto Kepala Sekolah"
                    style="width: 120px; height: 150px; object-fit: cover; border-radius: 8px;"
                >
            </div>
        @endif
    </div>

    <div class="col-md-6">
        <label for="sambutan_kepala_sekolah" class="form-label">
            Sambutan Kepala Sekolah
        </label>

        <textarea
            name="sambutan_kepala_sekolah"
            id="sambutan_kepala_sekolah"
            class="form-control"
            rows="6"
            placeholder="Tulis sambutan kepala sekolah..."
        >{{ old('sambutan_kepala_sekolah', $profile?->sambutan_kepala_sekolah) }}</textarea>
    </div>
</div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.profile') }}" class="btn btn-light border me-2">Kembali</a>
                        <button class="btn btn-secondary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
