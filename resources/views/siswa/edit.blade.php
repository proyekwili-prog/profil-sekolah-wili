@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('public.admin')

@section('title', $title)

@section('content')

<style>
    /* =========================================================
       EDIT DATA SISWA
       KONSISTEN DENGAN HALAMAN EDIT DATA GURU
    ========================================================= */

    .siswa-form-page {
        width: 100%;
    }

    /* =========================
       HEADER HALAMAN
    ========================= */

    .siswa-form-header {
        display: flex;
        align-items: flex-start;
        margin-bottom: 22px;
    }

    .siswa-form-title-icon {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-right: 10px;

        background: #eff6ff;
        color: #2563eb;

        border-radius: 9px;

        font-size: 17px;

        flex-shrink: 0;
    }

    .siswa-form-title-wrapper {
        padding-top: 1px;
    }

    .siswa-form-title {
        margin: 0;

        color: #172033;

        font-size: 23px;
        font-weight: 700;

        line-height: 1.3;
    }

    .siswa-form-description {
        margin: 5px 0 0;

        color: #64748b;

        font-size: 12px;

        line-height: 1.5;
    }

    /* =========================
       CARD
    ========================= */

    .siswa-form-card {
        background: #ffffff;

        border: 1px solid #dfe5ec;
        border-radius: 11px;

        overflow: hidden;

        box-shadow:
            0 2px 6px rgba(15, 23, 42, 0.03);
    }

    /* =========================
       CARD HEADER
    ========================= */

    .siswa-form-card-header {
        min-height: 61px;

        display: flex;
        align-items: center;

        padding: 10px 17px;

        border-bottom: 1px solid #dfe5ec;

        background: #ffffff;
    }

    .siswa-form-card-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-right: 10px;

        background: #f8fafc;

        border: 1px solid #dfe5ec;
        border-radius: 7px;

        color: #334155;

        font-size: 14px;
    }

    .siswa-form-card-title {
        margin: 0;

        color: #1e293b;

        font-size: 13px;
        font-weight: 700;
    }

    .siswa-form-card-subtitle {
        margin: 2px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }

    /* =========================
       FORM BODY
    ========================= */

    .siswa-form-body {
        padding: 23px 21px 20px;
    }

    /* =========================
       FORM GROUP
    ========================= */

    .siswa-form-group {
        margin-bottom: 17px;
    }

    .siswa-form-label {
        display: block;

        margin-bottom: 6px;

        color: #1e293b;

        font-size: 11px;
        font-weight: 600;
    }

    .siswa-required {
        color: #ef4444;
    }

    /* =========================
       INPUT
    ========================= */

    .siswa-form-control,
    .siswa-form-select {
        width: 100%;

        height: 35px;

        padding: 7px 10px;

        background: #ffffff;

        border: 1px solid #cbd5e1;
        border-radius: 6px;

        color: #334155;

        font-size: 11px;

        outline: none;

        transition: 0.15s ease;
    }

    .siswa-form-control::placeholder {
        color: #94a3b8;
    }

    .siswa-form-control:focus,
    .siswa-form-select:focus {
        border-color: #93c5fd;

        box-shadow:
            0 0 0 2px rgba(37, 99, 235, 0.08);
    }

    .siswa-form-select {
        cursor: pointer;
    }

    /* =========================
       ERROR
    ========================= */

    .siswa-error {
        margin-top: 5px;

        color: #dc2626;

        font-size: 10px;
    }

    .siswa-error-alert {
        margin-bottom: 18px;

        padding: 10px 12px;

        border: 1px solid #fecaca;
        border-radius: 6px;

        background: #fef2f2;

        color: #b91c1c;

        font-size: 11px;
    }

    /* =========================
       FORM FOOTER
    ========================= */

    .siswa-form-footer {
        display: flex;
        align-items: center;

        gap: 7px;

        padding-top: 17px;

        margin-top: 3px;

        border-top: 1px solid #e2e8f0;
    }

    /* =========================
       BUTTON
    ========================= */

    .siswa-btn {
        min-height: 33px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 7px 13px;

        border-radius: 6px;

        font-size: 11px;
        font-weight: 600;

        text-decoration: none;

        transition: 0.15s ease;
    }

    .siswa-btn-back {
        background: #ffffff;

        border: 1px solid #cbd5e1;

        color: #334155;
    }

    .siswa-btn-back:hover {
        background: #f8fafc;

        border-color: #94a3b8;

        color: #1e293b;
    }

    .siswa-btn-save {
        background: #2446b8;

        border: 1px solid #2446b8;

        color: #ffffff;
    }

    .siswa-btn-save:hover {
        background: #1d3da5;

        border-color: #1d3da5;

        color: #ffffff;
    }

    .siswa-btn i {
        font-size: 11px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .siswa-form-body {
            padding: 20px 16px;
        }

        .siswa-form-footer {
            flex-wrap: wrap;
        }
    }
</style>


<div class="container-fluid px-0 siswa-form-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="siswa-form-header">

        <div class="siswa-form-title-icon">

            <i class="bi bi-person-fill-gear"></i>

        </div>

        <div class="siswa-form-title-wrapper">

            <h3 class="siswa-form-title">
                Edit Data Siswa
            </h3>

            <p class="siswa-form-description">
                Perbarui informasi data siswa yang sudah terdaftar.
            </p>

        </div>

    </div>


    {{-- =====================================================
         ERROR VALIDASI
    ====================================================== --}}

    @if($errors->any())

        <div class="siswa-error-alert">

            <strong>
                <i class="bi bi-exclamation-circle me-1"></i>
                Periksa kembali data yang dimasukkan.
            </strong>

            <ul class="mb-0 mt-1 ps-3">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         CARD
    ====================================================== --}}

    <div class="siswa-form-card">


        {{-- CARD HEADER --}}

        <div class="siswa-form-card-header">

            <div class="siswa-form-card-icon">

                <i class="bi bi-person-vcard"></i>

            </div>

            <div>

                <h5 class="siswa-form-card-title">
                    Informasi Siswa
                </h5>

                <p class="siswa-form-card-subtitle">
                    Perbarui informasi siswa yang sudah terdaftar.
                </p>

            </div>

        </div>


        {{-- =================================================
             FORM
        ================================================== --}}

        <div class="siswa-form-body">

            <form
                action="{{ route('admin.siswa.update', Crypt::encrypt($siswa->id_siswa)) }}"
                method="POST">

                @csrf
                @method('PUT')


                {{-- NISN --}}

                <div class="siswa-form-group">

                    <label
                        for="nisn"
                        class="siswa-form-label">

                        NISN
                        <span class="siswa-required">*</span>

                    </label>

                    <input
                        type="text"
                        id="nisn"
                        name="nisn"
                        class="siswa-form-control"
                        value="{{ old('nisn', $siswa->nisn) }}"
                        placeholder="Masukkan NISN siswa"
                        maxlength="10"
                        required>

                    @error('nisn')

                        <div class="siswa-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- NAMA SISWA --}}

                <div class="siswa-form-group">

                    <label
                        for="nama_siswa"
                        class="siswa-form-label">

                        Nama Siswa
                        <span class="siswa-required">*</span>

                    </label>

                    <input
                        type="text"
                        id="nama_siswa"
                        name="nama_siswa"
                        class="siswa-form-control"
                        value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                        placeholder="Masukkan nama siswa"
                        maxlength="40"
                        required>

                    @error('nama_siswa')

                        <div class="siswa-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- JENIS KELAMIN --}}

                <div class="siswa-form-group">

                    <label
                        for="jenis_kelamin"
                        class="siswa-form-label">

                        Jenis Kelamin
                        <span class="siswa-required">*</span>

                    </label>

                    <select
                        id="jenis_kelamin"
                        name="jenis_kelamin"
                        class="siswa-form-select"
                        required>

                        <option value="">
                            -- Pilih Jenis Kelamin --
                        </option>

                        <option
                            value="Laki-laki"
                            @selected(old('jenis_kelamin', $siswa->jenis_kelamin) === 'Laki-laki')>

                            Laki-laki

                        </option>

                        <option
                            value="Perempuan"
                            @selected(old('jenis_kelamin', $siswa->jenis_kelamin) === 'Perempuan')>

                            Perempuan

                        </option>

                    </select>

                    @error('jenis_kelamin')

                        <div class="siswa-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- TAHUN MASUK --}}

                <div class="siswa-form-group mb-0">

                    <label
                        for="tahun_masuk"
                        class="siswa-form-label">

                        Tahun Masuk
                        <span class="siswa-required">*</span>

                    </label>

                    <input
                        type="number"
                        id="tahun_masuk"
                        name="tahun_masuk"
                        class="siswa-form-control"
                        value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
                        placeholder="Contoh: 2025"
                        min="2000"
                        max="2100"
                        required>

                    @error('tahun_masuk')

                        <div class="siswa-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     BUTTON
                ================================================== --}}

                <div class="siswa-form-footer">

                    <a
                        href="{{ route('admin.siswa.index') }}"
                        class="siswa-btn siswa-btn-back">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="siswa-btn siswa-btn-save">

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>

@endsection