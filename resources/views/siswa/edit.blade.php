@extends('public.admin')

@section('title', $title)

@section('content')
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Edit Data Siswa</h3>
        <p class="text-muted">Perbarui data siswa.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $siswa->nisn) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="Laki-laki" @selected(old('jenis_kelamin', $siswa->jenis_kelamin) === 'Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(old('jenis_kelamin', $siswa->jenis_kelamin) === 'Perempuan')>Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}" required>
                </div>
                <a href="{{ route('admin.siswa.index') }}" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
