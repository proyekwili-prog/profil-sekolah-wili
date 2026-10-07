@extends('public.admin')

@section('title', $title)

@section('content')

<style>
    /* =========================================================
       DETAIL GURU
    ========================================================= */

    .guru-detail-page {
        width: 100%;
    }

    /* =========================================================
       HEADER HALAMAN
    ========================================================= */

    .guru-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

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
       CARD DETAIL
    ========================================================= */

    .guru-detail-card {
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
       DETAIL BODY
    ========================================================= */

    .guru-detail-body {
        padding: 32px 24px 28px;
    }

    .guru-profile {
        width: 100%;
        max-width: 620px;

        margin: 0 auto;

        text-align: center;
    }

    /* =========================================================
       FOTO
    ========================================================= */

    .guru-photo-wrapper {
        width: 170px;
        height: 170px;

        margin: 0 auto 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

        border-radius: 50%;

        overflow: hidden;

        box-shadow:
            0 4px 12px rgba(15, 23, 42, 0.08);

        position: relative;
    }

    .guru-photo {
        width: 100%;
        height: 100%;

        object-fit: cover;
        object-position: center;

        display: block;
    }

    .guru-photo-placeholder {
        width: 100%;
        height: 100%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        color: #94a3b8;

        font-size: 65px;
    }

    /* =========================================================
       NAMA
    ========================================================= */

    .guru-profile-name {
        margin: 0;

        color: #172033;

        font-size: 23px;
        font-weight: 700;

        line-height: 1.3;
    }

    .guru-profile-role {
        margin: 5px 0 24px;

        color: #64748b;

        font-size: 13px;
    }

    /* =========================================================
       DATA
    ========================================================= */

    .guru-info-list {
        width: 100%;

        margin: 0 auto;

        border: 1px solid #e2e8f0;

        border-radius: 10px;

        overflow: hidden;

        text-align: left;

        background: #ffffff;
    }

    .guru-info-row {
        display: grid;

        grid-template-columns: 180px 1fr;

        min-height: 58px;

        border-bottom: 1px solid #e2e8f0;
    }

    .guru-info-row:last-child {
        border-bottom: none;
    }

    .guru-info-label {
        display: flex;
        align-items: center;

        padding: 13px 16px;

        background: #f8fafc;

        color: #64748b;

        font-size: 12px;
        font-weight: 600;
    }

    .guru-info-value {
        display: flex;
        align-items: center;

        padding: 13px 16px;

        color: #334155;

        font-size: 13px;
        font-weight: 600;
    }

    /* =========================================================
       ACTION BUTTON
    ========================================================= */

    .guru-detail-actions {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 8px;

        margin-top: 24px;
    }

    .guru-btn {
        min-height: 38px;

        padding: 8px 16px;

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

    .guru-btn-edit {
        background: #1e40af;

        border: 1px solid #1e40af;

        color: #ffffff;
    }

    .guru-btn-edit:hover {
        background: #1d4ed8;

        border-color: #1d4ed8;

        color: #ffffff;

        transform: translateY(-1px);
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .guru-header-title {
            font-size: 21px;
        }

        .guru-header-description {
            margin-left: 50px;
        }

        .guru-detail-body {
            padding: 25px 16px;
        }

        .guru-photo-wrapper {
            width: 145px;
            height: 145px;
        }

        .guru-profile-name {
            font-size: 20px;
        }

        .guru-info-row {
            grid-template-columns: 1fr;
        }

        .guru-info-label {
            min-height: auto;

            padding-bottom: 5px;
        }

        .guru-info-value {
            padding-top: 5px;
        }

        .guru-detail-actions {
            flex-direction: column;
        }

        .guru-btn {
            width: 100%;
        }
    }
</style>


<div class="container-fluid px-0 guru-detail-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="guru-page-header">

        <div class="guru-header-left">

            <h3 class="guru-header-title">

                <span class="guru-title-icon">
                    <i class="bi bi-person-vcard"></i>
                </span>

                Detail Guru

            </h3>

            <p class="guru-header-description">
                Informasi lengkap data guru.
            </p>

        </div>

    </div>


    {{-- =====================================================
         MAIN CARD
    ====================================================== --}}
    <div class="guru-detail-card">


        {{-- =================================================
             CARD HEADER
        ================================================== --}}
        <div class="guru-card-header">

            <div class="guru-card-icon">

                <i class="bi bi-person-badge"></i>

            </div>

            <div>

                <h5 class="guru-card-title">
                    Informasi Guru
                </h5>

                <p class="guru-card-description">
                    Data lengkap guru yang dipilih.
                </p>

            </div>

        </div>


        {{-- =================================================
             DETAIL CONTENT
        ================================================== --}}
        <div class="guru-detail-body">

            <div class="guru-profile">


                {{-- =================================================
                     FOTO GURU
                ================================================== --}}
                <div class="guru-photo-wrapper">

                    @if($guru->foto)

                        <img
                            src="{{ asset('storage/'.$guru->foto) }}"
                            alt="{{ $guru->nama_guru }}"
                            class="guru-photo">

                    @else

                        <div class="guru-photo-placeholder">

                            <i class="bi bi-person-fill"></i>

                        </div>

                    @endif

                </div>


                {{-- =================================================
                     NAMA GURU
                ================================================== --}}
                <h2 class="guru-profile-name">
                    {{ $guru->nama_guru }}
                </h2>

                <p class="guru-profile-role">
                    Guru {{ $guru->mapel }}
                </p>


                {{-- =================================================
                     DATA GURU
                ================================================== --}}
                <div class="guru-info-list">


                    {{-- NAMA --}}
                    <div class="guru-info-row">

                        <div class="guru-info-label">
                            Nama Guru
                        </div>

                        <div class="guru-info-value">
                            {{ $guru->nama_guru }}
                        </div>

                    </div>


                    {{-- NIP --}}
                    <div class="guru-info-row">

                        <div class="guru-info-label">
                            NIP
                        </div>

                        <div class="guru-info-value">

                            {{ $guru->nip ?: '-' }}

                        </div>

                    </div>


                    {{-- MATA PELAJARAN --}}
                    <div class="guru-info-row">

                        <div class="guru-info-label">
                            Mata Pelajaran
                        </div>

                        <div class="guru-info-value">

                            {{ $guru->mapel }}

                        </div>

                    </div>


                </div>


                {{-- =================================================
                     ACTION
                ================================================== --}}
                <div class="guru-detail-actions">


                    {{-- EDIT --}}
                    <a
                        href="{{ route('admin.guru.edit', Crypt::encrypt($guru->id_guru)) }}"
                        class="btn guru-btn guru-btn-edit">

                        <i class="bi bi-pencil-square me-1"></i>

                        Edit Data

                    </a>


                    {{-- KEMBALI --}}
                    <a
                        href="{{ route('admin.guru.index') }}"
                        class="btn guru-btn guru-btn-back">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection