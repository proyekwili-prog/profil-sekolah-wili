@extends('public.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div class="container-fluid px-0">

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 d-flex align-items-center gap-2 mb-4">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif


    {{-- =========================================
         HEADER
    ========================================== --}}
    <div class="profile-page-header mb-4">

        <div class="d-flex justify-content-between align-items-center gap-3">

            <div class="d-flex align-items-center gap-3">

                <div class="profile-title-icon">
                    <i class="bi bi-building"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-1">
                        Profil Sekolah
                    </h3>

                    <p class="text-muted mb-0">
                        Informasi identitas dan profil sekolah.
                    </p>
                </div>

            </div>


            <a href="{{ route('admin.edit_profile') }}"
               class="btn btn-primary px-3">

                <i class="bi bi-pencil-square me-1"></i>
                Edit Profil

            </a>

        </div>

    </div>


    {{-- =========================================
         PROFIL UTAMA
    ========================================== --}}
    <div class="profile-main-card mb-4">

        <div class="row g-0">

            {{-- BAGIAN FOTO --}}
            <div class="col-lg-4">

                <div class="profile-school-section">

                    <div class="profile-logo-wrapper">

                        @if($profile?->logo)

                            <img src="{{ asset('storage/'.$profile->logo) }}"
                                 alt="Logo {{ $profile->nama_sekolah ?? 'Sekolah' }}"
                                 class="profile-logo">

                        @else

                            <img src="{{ asset('assets/images/satap.png') }}"
                                 alt="Logo Sekolah"
                                 class="profile-logo">

                        @endif

                    </div>


                    <h4 class="profile-school-name">
                        {{ $profile->nama_sekolah ?? 'Belum diisi' }}
                    </h4>

                    <div class="profile-school-label">
                        <i class="bi bi-mortarboard-fill me-1"></i>
                        Profil Sekolah
                    </div>

                </div>

            </div>


            {{-- BAGIAN INFORMASI --}}
            <div class="col-lg-8">

                <div class="profile-information">

                    <div class="profile-section-heading">

                        <div class="profile-section-icon">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>

                        <div>
                            <h5 class="fw-bold mb-0">
                                Informasi Sekolah
                            </h5>

                            <small class="text-muted">
                                Informasi utama sekolah
                            </small>
                        </div>

                    </div>


                    <div class="row g-3">

                        {{-- NPSN --}}
                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-icon info-blue">
                                    <i class="bi bi-card-text"></i>
                                </div>

                                <div class="info-content">

                                    <div class="info-label">
                                        NPSN
                                    </div>

                                    <div class="info-value">
                                        {{ $profile->npsn ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- KEPALA SEKOLAH --}}
                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-icon info-green">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>

                                <div class="info-content">

                                    <div class="info-label">
                                        Kepala Sekolah
                                    </div>

                                    <div class="info-value">
                                        {{ $profile->kepala_sekolah ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- TAHUN BERDIRI --}}
                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-icon info-orange">
                                    <i class="bi bi-calendar-event-fill"></i>
                                </div>

                                <div class="info-content">

                                    <div class="info-label">
                                        Tahun Berdiri
                                    </div>

                                    <div class="info-value">
                                        {{ $profile->tahun_berdiri ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- KONTAK --}}
                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-icon info-purple">
                                    <i class="bi bi-telephone-fill"></i>
                                </div>

                                <div class="info-content">

                                    <div class="info-label">
                                        Kontak
                                    </div>

                                    <div class="info-value">
                                        {{ $profile->kontak ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ALAMAT --}}
                    <div class="detail-box mt-3">

                        <div class="detail-box-header">

                            <div class="detail-icon info-red">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div>
                                <div class="info-label">
                                    Alamat Sekolah
                                </div>

                                <small class="text-muted">
                                    Lokasi dan alamat sekolah
                                </small>
                            </div>

                        </div>

                        <div class="detail-text">
                            {{ $profile->alamat ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================
         VISI MISI + DESKRIPSI
    ========================================== --}}
    <div class="row g-4 mb-4">

        {{-- VISI MISI --}}
        <div class="col-lg-6">

            <div class="content-card h-100">

                <div class="content-card-header">

                    <div class="content-heading">

                        <div class="content-icon content-icon-blue">
                            <i class="bi bi-bullseye"></i>
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Visi & Misi
                            </h5>

                            <small class="text-muted">
                                Visi dan misi sekolah
                            </small>

                        </div>

                    </div>

                </div>


                <div class="content-card-body">

                    @if($profile?->visi_misi)

                        <div class="visi-misi-content">
                            {!! nl2br(e($profile->visi_misi)) !!}
                        </div>

                    @else

                        <div class="empty-content">

                            <div class="empty-content-icon">
                                <i class="bi bi-bullseye"></i>
                            </div>

                            <div>
                                <div class="fw-semibold">
                                    Visi dan misi belum diisi
                                </div>

                                <small class="text-muted">
                                    Silakan lengkapi melalui menu Edit Profil.
                                </small>
                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- DESKRIPSI --}}
        <div class="col-lg-6">

            <div class="content-card h-100">

                <div class="content-card-header">

                    <div class="content-heading">

                        <div class="content-icon content-icon-green">
                            <i class="bi bi-file-text-fill"></i>
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Deskripsi Sekolah
                            </h5>

                            <small class="text-muted">
                                Gambaran umum sekolah
                            </small>

                        </div>

                    </div>

                </div>


                <div class="content-card-body">

                    @if($profile?->deskripsi)

                        <div class="description-content">
                            {!! nl2br(e($profile->deskripsi)) !!}
                        </div>

                    @else

                        <div class="empty-content">

                            <div class="empty-content-icon">
                                <i class="bi bi-file-text"></i>
                            </div>

                            <div>
                                <div class="fw-semibold">
                                    Deskripsi belum diisi
                                </div>

                                <small class="text-muted">
                                    Silakan lengkapi melalui menu Edit Profil.
                                </small>
                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>


</div>


{{-- =========================================
     STYLE
========================================== --}}

<style>

    /* =====================================
       HEADER
    ====================================== */

    .profile-page-header {
        width: 100%;
    }

    .profile-title-icon {
        width: 46px;
        height: 46px;

        border-radius: 12px;

        background: rgba(13, 110, 253, 0.10);
        color: #0d6efd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;

        flex-shrink: 0;
    }


    /* =====================================
       MAIN PROFILE CARD
    ====================================== */

    .profile-main-card {
        background: #ffffff;

        border: 1px solid #e9ecef;

        border-radius: 14px;

        overflow: hidden;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }


    /* =====================================
       SCHOOL PROFILE
    ====================================== */

    .profile-school-section {
        min-height: 100%;

        padding: 40px 30px;

        background: linear-gradient(
            180deg,
            #f8fbff 0%,
            #ffffff 100%
        );

        border-right: 1px solid #edf0f2;

        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        text-align: center;
    }


    .profile-logo-wrapper {
        width: 170px;
        height: 170px;

        border-radius: 20px;

        background: #ffffff;

        border: 1px solid #e5e7eb;

        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 18px;

        margin-bottom: 20px;
    }


    .profile-logo {
        width: 100%;
        height: 100%;

        object-fit: contain;
    }


    .profile-school-name {
        color: #212529;

        line-height: 1.4;

        max-width: 330px;

        margin-bottom: 8px;
    }


    .profile-school-label {
        font-size: 13px;

        color: #6c757d;
    }


    /* =====================================
       INFORMATION
    ====================================== */

    .profile-information {
        padding: 30px;
    }


    .profile-section-heading {
        display: flex;

        align-items: center;

        gap: 12px;

        margin-bottom: 22px;
    }


    .profile-section-icon {
        width: 42px;
        height: 42px;

        border-radius: 10px;

        background: rgba(13, 110, 253, 0.10);

        color: #0d6efd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;

        flex-shrink: 0;
    }


    /* =====================================
       INFO BOX
    ====================================== */

    .info-box {
        height: 100%;

        display: flex;

        align-items: center;

        gap: 13px;

        padding: 16px;

        border: 1px solid #e9ecef;

        border-radius: 11px;

        background: #ffffff;

        transition: all 0.2s ease;
    }


    .info-box:hover {
        border-color: #d9dee3;

        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);

        transform: translateY(-1px);
    }


    .info-icon {
        width: 40px;
        height: 40px;

        border-radius: 9px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 16px;

        flex-shrink: 0;
    }


    .info-blue {
        background: rgba(13, 110, 253, 0.10);
        color: #0d6efd;
    }


    .info-green {
        background: rgba(25, 135, 84, 0.10);
        color: #198754;
    }


    .info-orange {
        background: rgba(253, 126, 20, 0.10);
        color: #fd7e14;
    }


    .info-purple {
        background: rgba(111, 66, 193, 0.10);
        color: #6f42c1;
    }


    .info-red {
        background: rgba(220, 53, 69, 0.10);
        color: #dc3545;
    }


    .info-content {
        min-width: 0;

        flex: 1;
    }


    .info-label {
        font-size: 12px;

        color: #6c757d;

        font-weight: 600;

        margin-bottom: 4px;
    }


    .info-value {
        font-size: 14px;

        font-weight: 600;

        color: #212529;

        word-break: break-word;
    }


    /* =====================================
       DETAIL BOX
    ====================================== */

    .detail-box {
        padding: 17px;

        border: 1px solid #e9ecef;

        border-radius: 11px;

        background: #fafbfc;
    }


    .detail-box-header {
        display: flex;

        align-items: center;

        gap: 12px;

        margin-bottom: 12px;
    }


    .detail-icon {
        width: 40px;
        height: 40px;

        border-radius: 9px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;
    }


    .detail-text {
        font-size: 14px;

        line-height: 1.7;

        color: #495057;
    }


    /* =====================================
       CONTENT CARD
    ====================================== */

    .content-card {
        background: #ffffff;

        border: 1px solid #e9ecef;

        border-radius: 14px;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);

        overflow: hidden;
    }


    .content-card-header {
        padding: 18px 22px;

        border-bottom: 1px solid #edf0f2;
    }


    .content-heading {
        display: flex;

        align-items: center;

        gap: 12px;
    }


    .content-icon {
        width: 42px;
        height: 42px;

        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;

        flex-shrink: 0;
    }


    .content-icon-blue {
        background: rgba(13, 110, 253, 0.10);
        color: #0d6efd;
    }


    .content-icon-green {
        background: rgba(25, 135, 84, 0.10);
        color: #198754;
    }


    .content-card-body {
        padding: 22px;
    }


    /* =====================================
       VISI MISI
    ====================================== */

    .visi-misi-content {
        color: #495057;

        font-size: 14px;

        line-height: 1.8;

        white-space: normal;
    }


    /* =====================================
       DESCRIPTION
    ====================================== */

    .description-content {
        color: #495057;

        font-size: 14px;

        line-height: 1.8;
    }


    /* =====================================
       EMPTY
    ====================================== */

    .empty-content {
        min-height: 150px;

        display: flex;

        align-items: center;

        justify-content: center;

        gap: 14px;

        text-align: left;

        color: #6c757d;
    }


    .empty-content-icon {
        width: 50px;
        height: 50px;

        border-radius: 50%;

        background: #f8f9fa;

        color: #adb5bd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;

        flex-shrink: 0;
    }


    /* =====================================
       RESPONSIVE
    ====================================== */

    @media (max-width: 991.98px) {

        .profile-school-section {
            min-height: auto;

            border-right: 0;

            border-bottom: 1px solid #edf0f2;

            padding: 30px 20px;
        }


        .profile-information {
            padding: 24px;
        }

    }


    @media (max-width: 767.98px) {

        .profile-page-header .d-flex {
            align-items: flex-start;
        }


        .profile-page-header .d-flex > .btn {
            flex-shrink: 0;
        }


        .profile-title-icon {
            width: 42px;
            height: 42px;

            font-size: 18px;
        }


        .profile-information {
            padding: 20px;
        }


        .profile-logo-wrapper {
            width: 145px;
            height: 145px;
        }


        .content-card-header {
            padding: 16px;
        }


        .content-card-body {
            padding: 18px;
        }

    }


    @media (max-width: 575.98px) {

        .profile-page-header > .d-flex {
            flex-direction: column;
        }


        .profile-page-header .btn {
            width: 100%;
        }


        .profile-school-name {
            font-size: 20px;
        }


        .info-box {
            padding: 14px;
        }

    }

</style>

@endsection