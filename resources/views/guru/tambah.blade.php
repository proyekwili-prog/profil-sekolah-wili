@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Data Guru</h3>
        <p class="text-muted">Masukkan data guru baru.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control"
                           value="{{ old('nama_guru') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">NIP</label>
                    <input type="text" name="nip" class="form-control"
                           value="{{ old('nip') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control"
                           value="{{ old('mapel') }}" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Maksimal 2 MB.</small>
                </div>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
