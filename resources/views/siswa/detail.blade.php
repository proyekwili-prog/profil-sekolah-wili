@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('layout.admin')

@section('title', $title)

@section('content')

<style>
    /* =========================================================
       DETAIL DATA SISWA
       KONSISTEN DENGAN DETAIL DATA GURU
    ========================================================= */

    .siswa-detail-page {
        width: 100%;
    }

    /* =========================
       HEADER
    ========================= */

    .siswa-detail-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        margin-bottom: 22px;
    }

    .siswa-detail-title-area {
        display: flex;
        align-items: flex-start;
    }

    .siswa-detail-title-icon {
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

    .siswa-detail-title-wrapper {
        padding-top: 1px;
    }

    .siswa-detail-title {
        margin: 0;

        color: #172033;

        font-size: 23px;
        font-weight: 700;

        line-height: 1.3;
    }

    .siswa-detail-description {
        margin: 5px 0 0;

        color: #64748b;

        font-size: 12px;

        line-height: 1.5;
    }

    /* =========================
       BUTTON KEMBALI HEADER
    ========================= */

    .siswa-detail-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-height: 34px;

        padding: 7px 13px;

        background: #ffffff;

        border: 1px solid #cbd5e1;
        border-radius: 6px;

        color: #334155;

        font-size: 11px;
        font-weight: 600;

        text-decoration: none;

        transition: 0.15s ease;
    }

    .siswa-detail-back:hover {
        background: #f8fafc;

        border-color: #94a3b8;

        color: #1e293b;
    }

    /* =========================
       CARD
    ========================= */

    .siswa-detail-card {
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

    .siswa-detail-card-header {
        min-height: 61px;

        display: flex;
        align-items: center;

        padding: 10px 17px;

        border-bottom: 1px solid #dfe5ec;
    }

    .siswa-detail-card-icon {
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

    .siswa-detail-card-title {
        margin: 0;

        color: #1e293b;

        font-size: 13px;
        font-weight: 700;
    }

    .siswa-detail-card-subtitle {
        margin: 2px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }

    /* =========================
       DETAIL BODY
    ========================= */

    .siswa-detail-body {
        padding: 28px 21px 24px;
    }

    .siswa-detail-content {
        max-width: 620px;

        margin: 0 auto;

        text-align: center;
    }

    /* =========================
       FOTO
    ========================= */

    .siswa-detail-photo-wrapper {
        width: 150px;
        height: 150px;

        margin: 0 auto 17px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f8fafc;

        border: 1px solid #dbe3ec;

        border-radius: 50%;

        overflow: hidden;
    }

    .siswa-detail-photo {
        width: 100%;
        height: 100%;

        object-fit: cover;

        border-radius: 50%;
    }

    .siswa-detail-photo-placeholder {
        width: 100%;
        height: 100%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        color: #94a3b8;

        font-size: 58px;
    }

    /* =========================
       NAMA
    ========================= */

    .siswa-detail-name {
        margin: 0;

        color: #172033;

        font-size: 20px;
        font-weight: 700;

        line-height: 1.3;
    }

    .siswa-detail-role {
        margin: 5px 0 23px;

        color: #64748b;

        font-size: 11px;
    }

    /* =========================
       DATA
    ========================= */

    .siswa-detail-info {
        width: 100%;

        margin-top: 5px;

        border-top: 1px solid #e2e8f0;

        border-left: 1px solid #e2e8f0;
        border-right: 1px solid #e2e8f0;

        border-radius: 7px 7px 0 0;

        overflow: hidden;

        text-align: left;
    }

    .siswa-detail-row {
        display: flex;
        align-items: stretch;

        min-height: 48px;

        border-bottom: 1px solid #e2e8f0;
    }

    .siswa-detail-label {
        width: 38%;

        display: flex;
        align-items: center;

        padding: 10px 14px;

        background: #f8fafc;

        color: #64748b;

        font-size: 11px;
        font-weight: 600;
    }

    .siswa-detail-value {
        width: 62%;

        display: flex;
        align-items: center;

        padding: 10px 14px;

        background: #ffffff;

        color: #1e293b;

        font-size: 11px;
        font-weight: 600;
    }

    /* =========================
       ACTION
    ========================= */

    .siswa-detail-actions {
        display: flex;
        justify-content: center;
        align-items: center;

        gap: 7px;

        margin-top: 20px;
    }

    .siswa-detail-btn {
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

    .siswa-detail-btn-edit {
        background: #ffffff;

        border: 1px solid #cbd5e1;

        color: #334155;
    }

    .siswa-detail-btn-edit:hover {
        background: #f8fafc;

        border-color: #94a3b8;

        color: #1e293b;
    }

    .siswa-detail-btn-back {
        background: #2446b8;

        border: 1px solid #2446b8;

        color: #ffffff;
    }

    .siswa-detail-btn-back:hover {
        background: #1d3da5;

        border-color: #1d3da5;

        color: #ffffff;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .siswa-detail-header {
            gap: 12px;
        }

        .siswa-detail-back {
            display: none;
        }

        .siswa-detail-body {
            padding: 22px 15px;
        }

        .siswa-detail-label {
            width: 42%;
        }

        .siswa-detail-value {
            width: 58%;
        }
    }
</style>


<div class="container-fluid px-0 siswa-detail-page">


    {{-- =====================================================
         HEADER HALAMAN
    ====================================================== --}}

    <div class="siswa-detail-header">

        <div class="siswa-detail-title-area">

            <div class="siswa-detail-title-icon">

                <i class="bi bi-person-vcard-fill"></i>

            </div>

            <div class="siswa-detail-title-wrapper">

                <h3 class="siswa-detail-title">
                    Detail Data Siswa
                </h3>

                <p class="siswa-detail-description">
                    Informasi lengkap data siswa.
                </p>

            </div>

        </div>


            {{-- <a
                href="{{ route('admin.siswa.index') }}"
                class="siswa-detail-back">

                <i class="bi bi-arrow-left me-1"></i>

                Kembali

            </a> --}}

    </div>


    {{-- =====================================================
         CARD DETAIL
    ====================================================== --}}

    <div class="siswa-detail-card">


        {{-- CARD HEADER --}}

        <div class="siswa-detail-card-header">

            <div class="siswa-detail-card-icon">

                <i class="bi bi-person-lines-fill"></i>

            </div>

            <div>

                <h5 class="siswa-detail-card-title">
                    Informasi Siswa
                </h5>

                <p class="siswa-detail-card-subtitle">
                    Detail informasi siswa yang terdaftar dalam sistem.
                </p>

            </div>

        </div>


        {{-- =================================================
             DETAIL BODY
        ================================================== --}}

        <div class="siswa-detail-body">

            <div class="siswa-detail-content">


                {{-- FOTO --}}

                <div class="siswa-detail-photo-wrapper">

                    <div class="siswa-detail-photo-placeholder">

                        <i class="bi bi-person-fill"></i>

                    </div>

                </div>


                {{-- NAMA --}}

                <h2 class="siswa-detail-name">
                    {{ $siswa->nama_siswa }}
                </h2>

                <p class="siswa-detail-role">
                    Data Siswa
                </p>


                {{-- =================================================
                     INFORMASI
                ================================================== --}}

                <div class="siswa-detail-info">


                    {{-- NISN --}}

                    <div class="siswa-detail-row">

                        <div class="siswa-detail-label">
                            NISN
                        </div>

                        <div class="siswa-detail-value">
                            {{ $siswa->nisn }}
                        </div>

                    </div>


                    {{-- NAMA --}}

                    <div class="siswa-detail-row">

                        <div class="siswa-detail-label">
                            Nama Siswa
                        </div>

                        <div class="siswa-detail-value">
                            {{ $siswa->nama_siswa }}
                        </div>

                    </div>


                    {{-- JENIS KELAMIN --}}

                    <div class="siswa-detail-row">

                        <div class="siswa-detail-label">
                            Jenis Kelamin
                        </div>

                        <div class="siswa-detail-value">
                            {{ $siswa->jenis_kelamin }}
                        </div>

                    </div>


                    {{-- TAHUN MASUK --}}

                    <div class="siswa-detail-row">

                        <div class="siswa-detail-label">
                            Tahun Masuk
                        </div>

                        <div class="siswa-detail-value">
                            {{ $siswa->tahun_masuk }}
                        </div>

                    </div>


                </div>


                {{-- =================================================
                     BUTTON
                ================================================== --}}

                <div class="siswa-detail-actions">

                    <a
                        href="{{ route('admin.siswa.edit', Crypt::encrypt($siswa->id_siswa)) }}"
                        class="siswa-detail-btn siswa-detail-btn-edit">

                        <i class="bi bi-pencil me-1"></i>

                        Edit Data

                    </a>


                    <a
                        href="{{ route('admin.siswa.index') }}"
                        class="siswa-detail-btn siswa-detail-btn-back">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>

                </div>


            </div>

        </div>

    </div>

</div>

@endsection