@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Ekstrakurikuler</h3>
        <p class="text-muted">Tambahkan kegiatan ekstrakurikuler baru.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.ekstrakulikuler.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_eskul" class="form-control" maxlength="40"
                           value="{{ old('nama_eskul') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan" class="form-control" maxlength="40"
                           value="{{ old('jadwal_latihan') }}" placeholder="Contoh: Jumat, 14.00-16.00" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pembina</label>
                    <select name="pembina" class="form-select" required>
                        <option value="">-- Pilih Pembina --</option>
                        @foreach($gurus as $guru)
                            <option value="{{ $guru->nama_guru }}"
                                @selected(old('pembina') === $guru->nama_guru)>
                                {{ $guru->nama_guru }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Nama pembina diambil otomatis dari data Guru.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="form-control" required>{{ old('deskripsi') }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <a href="{{ route('admin.ekstrakulikuler.index') }}" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
