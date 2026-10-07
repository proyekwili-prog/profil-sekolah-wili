@php
    use Illuminate\Support\Facades\Crypt;
@endphp

@extends('public.admin')

@section('title', $title)

@section('content')

<style>
    /* =========================================================
       GURU PAGE
    ========================================================= */

    .guru-page {
        width: 100%;
    }

    /* =========================================================
       PAGE HEADER
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
    }

    .guru-header-description {
        margin: 7px 0 0 50px;

        color: #64748b;

        font-size: 13px;
        line-height: 1.5;
    }

    .guru-add-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-height: 42px;

        padding: 9px 17px;

        background: #1e40af;
        border: 1px solid #1e40af;

        border-radius: 8px;

        color: #ffffff;

        font-size: 13px;
        font-weight: 600;

        white-space: nowrap;

        transition: all 0.2s ease;
    }

    .guru-add-button:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        color: #ffffff;

        transform: translateY(-1px);
    }

    /* =========================================================
       SUCCESS ALERT
    ========================================================= */

    .guru-success-alert {
        display: flex;
        align-items: center;

        padding: 12px 15px;

        margin-bottom: 20px;

        background: #f0fdf4;

        border: 1px solid #bbf7d0;
        border-radius: 9px;

        color: #166534;

        font-size: 13px;
    }

    .guru-success-icon {
        margin-right: 9px;

        font-size: 16px;
    }

    /* =========================================================
       MAIN CARD
    ========================================================= */

    .guru-card {
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
        justify-content: space-between;

        min-height: 70px;

        padding: 15px 20px;

        border-bottom: 1px solid #e2e8f0;

        background: #ffffff;
    }

    .guru-card-heading {
        display: flex;
        align-items: center;

        gap: 12px;
    }

    .guru-card-icon {
        width: 36px;
        height: 36px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

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
       TOTAL BADGE
    ========================================================= */

    .guru-total-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 6px 10px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
        border-radius: 7px;

        color: #475569;

        font-size: 11px;
        font-weight: 600;
    }

    .guru-total-badge i {
        color: #2563eb;
    }

    /* =========================================================
       TABLE WRAPPER
    ========================================================= */

    .guru-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    /* =========================================================
       TABLE
    ========================================================= */

    .guru-table {
        width: 100%;
        min-width: 850px;

        margin: 0 !important;

        border-collapse: collapse !important;
        border-spacing: 0 !important;
    }

    /* TABLE HEADER */

    .guru-table thead th {
        height: 50px;

        padding: 0 16px;

        background: #f8fafc !important;

        color: #475569;

        border: 1px solid #e2e8f0 !important;

        font-size: 11px;
        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: 0.3px;

        vertical-align: middle !important;

        white-space: nowrap;
    }

    /* TABLE BODY */

    .guru-table tbody td {
        height: 72px;

        padding: 10px 16px;

        background: #ffffff;

        color: #475569;

        border: 1px solid #e2e8f0 !important;

        font-size: 13px;

        vertical-align: middle !important;
    }

    .guru-table tbody tr {
        transition: background 0.15s ease;
    }

    .guru-table tbody tr:hover td {
        background: #f8fbff;
    }

    /* =========================================================
       COLUMN WIDTH
    ========================================================= */

    .col-no {
        width: 60px;

        text-align: center !important;
    }

    .col-foto {
        width: 90px;

        text-align: center !important;
    }

    .col-nama {
        width: 25%;
        min-width: 210px;
    }

    .col-nip {
        width: 20%;
        min-width: 150px;
    }

    .col-mapel {
        width: 25%;
        min-width: 180px;
    }

    .col-aksi {
        width: 150px;

        text-align: center !important;
    }

    /* =========================================================
       NUMBER
    ========================================================= */

    .guru-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        width: 27px;
        height: 27px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
        border-radius: 6px;

        color: #64748b;

        font-size: 11px;
        font-weight: 700;
    }

    /* =========================================================
       FOTO
    ========================================================= */

    .guru-photo-box {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .guru-photo {
        width: 46px;
        height: 46px;

        object-fit: cover;
        object-position: center;

        border-radius: 50%;

        border: 2px solid #e2e8f0;

        background: #f8fafc;
    }

    .guru-photo-placeholder {
        width: 46px;
        height: 46px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
    }

    .guru-photo-placeholder i {
        color: #94a3b8;

        font-size: 19px;
    }

    /* =========================================================
       NAMA
    ========================================================= */

    .guru-name {
        color: #1e293b;

        font-size: 13px;
        font-weight: 600;

        line-height: 1.4;
    }

    /* =========================================================
       DATA
    ========================================================= */

    .guru-data {
        color: #475569;

        font-size: 13px;
    }

    .guru-data-empty {
        color: #94a3b8;
    }

    /* =========================================================
       AKSI
    ========================================================= */

    .guru-action-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 6px;
    }

    .guru-action {
        width: 32px;
        height: 32px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0;

        border-radius: 7px;

        font-size: 13px;

        transition: all 0.15s ease;
    }

    .guru-action:hover {
        transform: translateY(-1px);
    }

    /* =========================================================
       EMPTY DATA
    ========================================================= */

    .guru-empty-row {
        text-align: center !important;

        padding: 45px 20px !important;

        color: #94a3b8 !important;
    }

    .guru-empty-row i {
        display: block;

        margin-bottom: 8px;

        font-size: 30px;
    }

    .guru-empty-row span {
        font-size: 13px;
    }

    /* =========================================================
       DATATABLES
    ========================================================= */

    .dataTables_wrapper {
        padding: 0;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        padding: 15px 18px;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        color: #64748b;

        font-size: 12px;
        font-weight: 500;
    }

    .dataTables_wrapper .dataTables_filter input {
        height: 34px;

        margin-left: 7px;

        padding: 5px 10px;

        border: 1px solid #cbd5e1;
        border-radius: 7px;

        color: #334155;

        font-size: 12px;

        outline: none;

        transition: border 0.15s ease, box-shadow 0.15s ease;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #93c5fd;

        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.08);
    }

    .dataTables_wrapper .dataTables_length select {
        height: 34px;

        margin: 0 5px;

        padding: 4px 25px 4px 8px;

        border: 1px solid #cbd5e1;
        border-radius: 7px;

        color: #334155;

        font-size: 12px;

        outline: none;
    }

    .dataTables_wrapper .dataTables_info {
        padding: 14px 18px;

        color: #94a3b8;

        font-size: 11px;
    }

    .dataTables_wrapper .dataTables_paginate {
        padding: 10px 18px 14px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        min-width: 32px;

        padding: 5px 9px !important;

        margin-left: 3px;

        border-radius: 6px !important;

        border: 1px solid transparent !important;

        color: #64748b !important;

        font-size: 11px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #eff6ff !important;

        border-color: #bfdbfe !important;

        color: #2563eb !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #1e40af !important;

        border-color: #1e40af !important;

        color: #ffffff !important;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .guru-page-header {
            align-items: flex-start;

            flex-direction: column;

            gap: 14px;
        }

        .guru-header-title {
            font-size: 21px;
        }

        .guru-header-description {
            margin-left: 50px;
        }

        .guru-add-button {
            width: 100%;
        }

        .guru-card-header {
            padding: 14px 15px;
        }

        .guru-total-badge {
            display: none;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            float: none !important;

            width: 100%;

            text-align: left !important;

            padding: 10px 15px;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: calc(100% - 55px);
        }
    }
</style>


<div class="container-fluid px-0 guru-page">


    {{-- =====================================================
         SUCCESS MESSAGE
    ====================================================== --}}
    @if(session('success'))

        <div class="guru-success-alert">

            <i class="bi bi-check-circle-fill guru-success-icon"></i>

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}
    <div class="guru-page-header">

        <div class="guru-header-left">

            <h3 class="guru-header-title">

                <span class="guru-title-icon">
                    <i class="bi bi-people-fill"></i>
                </span>

                Kelola Guru

            </h3>

            <p class="guru-header-description">
                Kelola dan pantau seluruh data guru sekolah.
            </p>

        </div>


        <a href="{{ route('admin.guru.create') }}"
           class="btn guru-add-button">

            <i class="bi bi-plus-lg me-2"></i>

            Tambah Guru

        </a>

    </div>


    {{-- =====================================================
         DATA CARD
    ====================================================== --}}
    <div class="guru-card">


        {{-- Card Header --}}
        <div class="guru-card-header">

            <div class="guru-card-heading">

                <div class="guru-card-icon">

                    <i class="bi bi-table"></i>

                </div>

                <div>

                    <h5 class="guru-card-title">
                        Data Guru
                    </h5>

                    <p class="guru-card-description">
                        Daftar guru yang terdaftar di sekolah.
                    </p>

                </div>

            </div>


            <div class="guru-total-badge">

                <i class="bi bi-people"></i>

                <span>
                    {{ $totalGuru }} Guru
                </span>

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}
        <div class="guru-table-wrapper">

            <table class="table guru-table">

                <thead>

                    <tr>

                        <th class="col-no">
                            No
                        </th>

                        <th class="col-foto">
                            Foto
                        </th>

                        <th class="col-nama">
                            Nama Guru
                        </th>

                        <th class="col-nip">
                            NIP
                        </th>

                        <th class="col-mapel">
                            Mata Pelajaran
                        </th>

                        <th class="col-aksi">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($gurus as $i => $guru)

                        <tr>

                            {{-- NO --}}
                            <td class="col-no">

                                <span class="guru-number">
                                    {{ $i + 1 }}
                                </span>

                            </td>


                            {{-- FOTO --}}
                            <td class="col-foto">

                                <div class="guru-photo-box">

                                    @if($guru->foto)

                                        <img
                                            src="{{ asset('storage/'.$guru->foto) }}"
                                            alt="{{ $guru->nama_guru }}"
                                            class="guru-photo">

                                    @else

                                        <div class="guru-photo-placeholder">

                                            <i class="bi bi-person"></i>

                                        </div>

                                    @endif

                                </div>

                            </td>


                            {{-- NAMA --}}
                            <td class="col-nama">

                                <span class="guru-name">
                                    {{ $guru->nama_guru }}
                                </span>

                            </td>


                            {{-- NIP --}}
                            <td class="col-nip">

                                @if($guru->nip)

                                    <span class="guru-data">
                                        {{ $guru->nip }}
                                    </span>

                                @else

                                    <span class="guru-data guru-data-empty">
                                        Belum diisi
                                    </span>

                                @endif

                            </td>


                            {{-- MAPEL --}}
                            <td class="col-mapel">

                                <span class="guru-data">
                                    {{ $guru->mapel }}
                                </span>

                            </td>


                            {{-- AKSI --}}
                            <td class="col-aksi">

                                <div class="guru-action-wrapper">


                                    {{-- DETAIL --}}
                                    <a
                                        href="{{ route('admin.guru.detail', $guru->id_guru) }}"
                                        class="btn btn-outline-primary guru-action"
                                        title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('admin.guru.edit', Crypt::encrypt($guru->id_guru)) }}"
                                        class="btn btn-outline-secondary guru-action"
                                        title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    {{-- HAPUS --}}
                                    <form
                                        action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus guru ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger guru-action"
                                            title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>


                                </div>

                            </td>

                        </tr>

                    @endforeach


                    {{-- JIKA DATA KOSONG --}}
                    @if($gurus->count() == 0)

                        <tr>

                            <td colspan="6" class="guru-empty-row">

                                <i class="bi bi-people"></i>

                                <span>
                                    Belum ada data guru.
                                </span>

                            </td>

                        </tr>

                    @endif

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection