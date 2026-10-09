@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('layout.admin')

@section('title', $title)

@section('content')

<style>
    /* =========================================================
       EDIT GURU - CONSISTENT ADMIN DESIGN
    ========================================================= */

    .guru-edit-page {
        width: 100%;
    }

    /* =========================================================
       HEADER HALAMAN
    ========================================================= */

    .guru-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;

        margin-bottom: 22px;
    }

    .guru-header-left {
        min-width: 0;
    }

    .guru-header-title {
        display: flex;
        align-items: center;
        gap: 10px;

        margin: 0;

        color: #172033;
        font-size: 24px;
        font-weight: 700;
        line-height: 1.3;
        letter-spacing: -0.3px;
    }

    .guru-title-icon {
        width: 40px;
        height: 40px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: #eff6ff;
        color: #2563eb;

        border-radius: 10px;

        font-size: 18px;
        flex-shrink: 0;
    }

    .guru-header-description {
        margin: 7px 0 0 50px;

        color: #64748b;

        font-size: 13px;
        line-height: 1.5;
    }

    /* =========================================================
       CARD
    ========================================================= */

    .guru-edit-card {
        background: #ffffff;

        border: 1px solid #e2e8f0;
        border-radius: 12px;

        overflow: hidden;

        box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
    }

    /* =========================================================
       CARD HEADER
    ========================================================= */

    .guru-card-header {
        display: flex;
        align-items: center;

        min-height: 70px;

        padding: 15px 20px;

        border-bottom: 1px solid #e2e8f0;

        background: #ffffff;
    }

    .guru-card-icon {
        width: 36px;
        height: 36px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        margin-right: 12px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
        border-radius: 8px;

        color: #475569;

        font-size: 16px;
    }

    .guru-card-title {
        margin: 0;

        color: #1e293b;

        font-size: 14px;
        font-weight: 700;
    }

    .guru-card-description {
        margin: 3px 0 0;

        color: #94a3b8;

        font-size: 11px;
    }

    /* =========================================================
       FORM BODY
    ========================================================= */

    .guru-form-body {
        padding: 24px;
    }

    .guru-form-group {
        margin-bottom: 19px;
    }

    .guru-form-label {
        display: block;

        margin-bottom: 7px;

        color: #334155;

        font-size: 13px;
        font-weight: 600;
    }

    .guru-required {
        color: #dc2626;
    }

    .guru-form-control {
        width: 100%;

        min-height: 40px;

        padding: 8px 12px;

        background: #ffffff;

        border: 1px solid #cbd5e1;
        border-radius: 7px;

        color: #334155;

        font-size: 13px;

        outline: none;

        transition:
            border-color 0.15s ease,
            box-shadow 0.15s ease;
    }

    .guru-form-control:focus {
        border-color: #93c5fd;

        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.08);
    }

    .guru-form-control::placeholder {
        color: #94a3b8;
    }

    /* =========================================================
       FOTO SAAT INI
    ========================================================= */

    .guru-current-photo-box {
        display: flex;
        align-items: center;

        gap: 14px;

        padding: 12px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
        border-radius: 8px;
    }

    .guru-current-photo {
        width: 64px;
        height: 64px;

        object-fit: cover;
        object-position: center;

        border-radius: 50%;

        border: 2px solid #e2e8f0;

        background: #ffffff;

        flex-shrink: 0;
    }

    .guru-current-photo-placeholder {
        width: 64px;
        height: 64px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #ffffff;

        border: 1px solid #e2e8f0;

        flex-shrink: 0;
    }

    .guru-current-photo-placeholder i {
        color: #94a3b8;

        font-size: 23px;
    }

    .guru-current-photo-info {
        color: #64748b;

        font-size: 11px;

        line-height: 1.6;
    }

    .guru-current-photo-info strong {
        display: block;

        color: #475569;

        font-size: 12px;
        font-weight: 600;

        margin-bottom: 2px;
    }

    /* =========================================================
       FILE INPUT
    ========================================================= */

    .guru-file {
        padding: 7px 10px;

        cursor: pointer;
    }

    .guru-help-text {
        display: block;

        margin-top: 6px;

        color: #94a3b8;

        font-size: 11px;
    }

    /* =========================================================
       ERROR
    ========================================================= */

    .guru-error-box {
        margin-bottom: 20px;

        padding: 12px 14px;

        background: #fef2f2;

        border: 1px solid #fecaca;
        border-radius: 8px;

        color: #b91c1c;

        font-size: 12px;
    }

    .guru-error-item {
        display: flex;
        align-items: flex-start;

        gap: 6px;

        margin-bottom: 4px;
    }

    .guru-error-item:last-child {
        margin-bottom: 0;
    }

    /* =========================================================
       BUTTON AREA
    ========================================================= */

    .guru-form-actions {
        display: flex;
        align-items: center;

        gap: 8px;

        padding-top: 20px;

        margin-top: 5px;

        border-top: 1px solid #e2e8f0;
    }

    .guru-btn {
        min-height: 38px;

        padding: 8px 15px;

        border-radius: 7px;

        font-size: 12px;
        font-weight: 600;

        transition: 0.15s ease;
    }

    .guru-btn-back {
        background: #ffffff;

        border: 1px solid #cbd5e1;

        color: #475569;
    }

    .guru-btn-back:hover {
        background: #f8fafc;

        border-color: #94a3b8;

        color: #334155;
    }

    .guru-btn-save {
        background: #1e40af;

        border: 1px solid #1e40af;

        color: #ffffff;
    }

    .guru-btn-save:hover {
        background: #1d4ed8;

        border-color: #1d4ed8;

        color: #ffffff;

        transform: translateY(-1px);
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .guru-page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .guru-header-title {
            font-size: 21px;
        }

        .guru-header-description {
            margin-left: 50px;
        }

        .guru-form-body {
            padding: 18px 16px;
        }

        .guru-form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .guru-btn {
            width: 100%;
        }
    }
</style>


<div class="container-fluid px-0 guru-edit-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="guru-page-header">

        <div class="guru-header-left">

            <h3 class="guru-header-title">

                <span class="guru-title-icon">
                    <i class="bi bi-pencil-square"></i>
                </span>

                Edit Data Guru

            </h3>

            <p class="guru-header-description">
                Perbarui informasi data guru yang dipilih.
            </p>

        </div>

    </div>


    {{-- =====================================================
         VALIDATION ERROR
    ====================================================== --}}
    @if($errors->any())

        <div class="guru-error-box">

            @foreach($errors->all() as $error)

                <div class="guru-error-item">

                    <i class="bi bi-exclamation-circle"></i>

                    <span>
                        {{ $error }}
                    </span>

                </div>

            @endforeach

        </div>

    @endif


    {{-- =====================================================
         MAIN CARD
    ====================================================== --}}
    <div class="guru-edit-card">


        {{-- =================================================
             CARD HEADER
        ================================================== --}}
        <div class="guru-card-header">

            <div class="guru-card-icon">

                <i class="bi bi-person-vcard"></i>

            </div>

            <div>

                <h5 class="guru-card-title">
                    Informasi Guru
                </h5>

                <p class="guru-card-description">
                    Perbarui data guru sesuai informasi terbaru.
                </p>

            </div>

        </div>


        {{-- =================================================
             FORM
        ================================================== --}}
        <div class="guru-form-body">

            <form
                action="{{ route('admin.guru.update', Crypt::encrypt($guru->id_guru)) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @method('PUT')


                {{-- =================================================
                     NAMA GURU
                ================================================== --}}
                <div class="guru-form-group">

                    <label class="guru-form-label">

                        Nama Guru

                        <span class="guru-required">*</span>

                    </label>

                    <input
                        type="text"
                        name="nama_guru"
                        class="form-control guru-form-control"
                        value="{{ old('nama_guru', $guru->nama_guru) }}"
                        placeholder="Masukkan nama guru"
                        required>

                </div>


                {{-- =================================================
                     NIP
                ================================================== --}}
                <div class="guru-form-group">

                    <label class="guru-form-label">
                        NIP
                    </label>

                    <input
                        type="text"
                        name="nip"
                        class="form-control guru-form-control"
                        value="{{ old('nip', $guru->nip) }}"
                        placeholder="Masukkan NIP jika ada">

                </div>


                {{-- =================================================
                     MATA PELAJARAN
                ================================================== --}}
                <div class="guru-form-group">

                    <label class="guru-form-label">

                        Mata Pelajaran

                        <span class="guru-required">*</span>

                    </label>

                    <input
                        type="text"
                        name="mapel"
                        class="form-control guru-form-control"
                        value="{{ old('mapel', $guru->mapel) }}"
                        placeholder="Contoh: Matematika"
                        required>

                </div>


                {{-- =================================================
                     FOTO SAAT INI
                ================================================== --}}
                <div class="guru-form-group">

                    <label class="guru-form-label">
                        Foto Saat Ini
                    </label>


                    <div class="guru-current-photo-box">

                        @if($guru->foto)

                            <img
                                src="{{ asset('storage/'.$guru->foto) }}"
                                alt="{{ $guru->nama_guru }}"
                                class="guru-current-photo">

                        @else

                            <div class="guru-current-photo-placeholder">

                                <i class="bi bi-person"></i>

                            </div>

                        @endif


                        <div class="guru-current-photo-info">

                            <strong>
                                Foto Guru
                            </strong>

                            @if($guru->foto)

                                Foto yang saat ini tersimpan.

                            @else

                                Guru belum memiliki foto.

                            @endif

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     GANTI FOTO
                ================================================== --}}
                <div class="guru-form-group">

                    <label class="guru-form-label">
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control guru-form-control guru-file"
                        accept=".jpg,.jpeg,.png,.webp">

                    <span class="guru-help-text">
                        Kosongkan jika tidak ingin mengganti foto.
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </span>

                </div>


                {{-- =================================================
                     BUTTON
                ================================================== --}}
                <div class="guru-form-actions">

                    <a
                        href="{{ route('admin.guru.index') }}"
                        class="btn guru-btn guru-btn-back">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn guru-btn guru-btn-save">

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Perubahan

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>

@endsection