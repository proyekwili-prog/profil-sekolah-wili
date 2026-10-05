@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Berita</h3>
        <p class="text-muted">Tambahkan berita baru.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul" class="form-control" maxlength="50" value="{{ old('judul') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Berita</label>
                    <textarea name="isi" rows="8" class="form-control" required>{{ old('isi') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
