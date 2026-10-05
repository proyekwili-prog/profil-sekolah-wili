@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Edit Data Guru</h3>
        <p class="text-muted">Perbarui data guru.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.guru.update', $guru->id_guru) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control"
                           value="{{ old('nama_guru', $guru->nama_guru) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">NIP</label>
                    <input type="text" name="nip" class="form-control"
                           value="{{ old('nip', $guru->nip) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control"
                           value="{{ old('mapel', $guru->mapel) }}" required>
                </div>

                @if($guru->foto)
                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
                        <img src="{{ asset('storage/'.$guru->foto) }}"
                             width="120" height="120"
                             class="rounded border"
                             style="object-fit:cover">
                    </div>
                @endif

                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>

                <a href="{{ route('admin.guru.index') }}" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
