@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Galeri</h3>
        <p class="text-muted">Tambahkan dokumentasi baru.</p>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
    @endif
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul" class="form-control" maxlength="50" value="{{ old('judul') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Keterangan</label>
                    <textarea name="keterangan" rows="4" class="form-control">{{ old('keterangan') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Foto" @selected(old('kategori') === 'Foto')>Foto</option>
                        <option value="Video" @selected(old('kategori') === 'Video')>Video</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">File</label>
                    <input type="file" name="file" class="form-control" accept="image/*" required>
                </div>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
