@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Edit Galeri</h3>
        <p class="text-muted">Perbarui dokumentasi.</p>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
    @endif
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.galeri.update', $galeri->id_galeri) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul" class="form-control" maxlength="50" value="{{ old('judul', $galeri->judul) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Keterangan</label>
                    <textarea name="keterangan" rows="4" class="form-control">{{ old('keterangan', $galeri->keterangan) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Foto" @selected(old('kategori', $galeri->kategori) === 'Foto')>Foto</option>
                        <option value="Video" @selected(old('kategori', $galeri->kategori) === 'Video')>Video</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $galeri->tanggal) }}" required>
                </div>
                @if($galeri->file)
                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">File Saat Ini</label>
                        <img src="{{ asset('storage/'.$galeri->file) }}" width="150" class="rounded border">
                    </div>
                @endif
                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti File</label>
                    <input type="file" name="file" class="form-control" accept="image/*">
                </div>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
