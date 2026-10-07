<!DOCTYPE html>

<html lang="id">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
    Detail Guru - {{ $guru->nama_guru }}
</title>

<link rel="icon" href="{{ asset('assets/images/satap.png') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet">

<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="preconnect"
    href="https://fonts.googleapis.com">

<link rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        color: #1e293b;
        background: #f8fafc;
    }

    a {
        text-decoration: none;
    }


    /* =========================
       NAVBAR
    ========================= */

    .navbar-custom {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        padding: 12px 0;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1050;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .navbar-brand img {
        width: 48px;
        height: 48px;
        object-fit: contain;
    }

    .brand-text {
        line-height: 1.15;
    }

    .brand-text .school-name {
        font-size: 14px;
        font-weight: 800;
        color: #0f3d91;
    }

    .navbar-nav {
        gap: 5px;
    }

    .navbar-nav .nav-link {
        color: #334155;
        font-size: 13px;
        font-weight: 600;
        padding: 9px 13px !important;
        border-radius: 7px;
        transition: 0.3s;
    }

    .navbar-nav .nav-link:hover {
        color: #0f3d91;
        background: #eff6ff;
    }

    .btn-login {
        background: #0f3d91;
        color: white !important;
        padding: 10px 18px !important;
        border-radius: 8px !important;
    }

    .btn-login:hover {
        background: #082c6b !important;
        color: white !important;
    }


    /* =========================
       DETAIL HEADER
    ========================= */

    .detail-page {
        padding-top: 72px;
    }

    .detail-header {
        background: #0f3d91;
        padding: 55px 0;
        color: white;
    }

    .detail-header .small-title {
        color: #93c5fd;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .detail-header h1 {
        font-size: clamp(28px, 4vw, 42px);
        font-weight: 800;
        margin-bottom: 10px;
    }

    .detail-header p {
        color: rgba(255, 255, 255, 0.85);
        font-size: 14px;
        margin: 0;
    }


    /* =========================
       DETAIL SECTION
    ========================= */

    .detail-section {
        padding: 75px 0;
    }

    .detail-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(15, 23, 42, 0.08);
    }


    /* =========================
       FOTO GURU
    ========================= */

    .detail-photo-wrapper {
        height: 430px;
        padding: 20px;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .detail-photo {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
        background: white;
        border-radius: 12px;
    }

    .detail-photo-empty {
        width: 100%;
        height: 100%;
        border-radius: 12px;
        background: #eff6ff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #2563eb;
        font-size: 90px;
    }


    /* =========================
       INFORMASI GURU
    ========================= */

    .detail-content {
        padding: 40px;
    }

    .detail-label {
        color: #2563eb;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 8px;
    }

    .detail-name {
        color: #0f172a;
        font-size: 30px;
        font-weight: 800;
        line-height: 1.3;
        margin-bottom: 8px;
    }

    .detail-mapel {
        color: #64748b;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 30px;
    }

    .detail-info {
        border-top: 1px solid #e2e8f0;
    }

    .detail-info-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 18px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .detail-info-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 10px;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .detail-info-text small {
        display: block;
        color: #94a3b8;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .detail-info-text span {
        color: #334155;
        font-size: 13px;
        font-weight: 600;
    }


    /* =========================
       BUTTON
    ========================= */

    .btn-primary-school {
        background: #0f3d91;
        border: none;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        transition: 0.3s;
    }

    .btn-primary-school:hover {
        background: #082c6b;
        color: white;
        transform: translateY(-2px);
    }

    .btn-outline-school {
        background: white;
        border: 1px solid #cbd5e1;
        color: #334155;
        padding: 11px 20px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        transition: 0.3s;
    }

    .btn-outline-school:hover {
        background: #eff6ff;
        color: #0f3d91;
        border-color: #93c5fd;
    }


    /* =========================
       FOOTER
    ========================= */

    footer {
        background: #071b3d;
        color: white;
        padding-top: 55px;
    }

    .footer-title {
        font-size: 16px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .footer-text {
        color: #cbd5e1;
        font-size: 12px;
        line-height: 1.9;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 9px;
    }

    .footer-links a {
        color: #cbd5e1;
        font-size: 12px;
        transition: 0.3s;
    }

    .footer-links a:hover {
        color: white;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 40px;
        padding: 20px 0;
        color: #94a3b8;
        font-size: 11px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 991px) {

        .navbar-nav {
            padding-top: 15px;
        }

        .detail-photo-wrapper {
            height: 350px;
        }

        .detail-content {
            padding: 30px;
        }

    }


    @media (max-width: 767px) {

        .detail-header {
            padding: 40px 0;
        }

        .detail-section {
            padding: 50px 0;
        }

        .detail-photo-wrapper {
            height: 300px;
        }

        .detail-content {
            padding: 25px;
        }

        .detail-name {
            font-size: 25px;
        }

    }

</style>
```

</head>

<body>

```
{{-- =========================
     NAVBAR
========================= --}}

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">

        <a class="navbar-brand"
            href="{{ route('public.dashboard') }}">

            @if($profile?->logo)

                <img src="{{ asset('storage/' . $profile->logo) }}"
                    alt="Logo Sekolah">

            @else

                <img src="{{ asset('assets/images/satap.png') }}"
                    alt="Logo Sekolah">

            @endif

            <div class="brand-text">

                <div class="school-name">
                    {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
                </div>

            </div>

        </a>


        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
            aria-controls="navbarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse"
            id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('public.dashboard') }}">

                        Beranda

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('public.profil') }}">

                        Profil

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link active"
                        href="{{ route('public.guru') }}">

                        Guru

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('public.ekstrakurikuler') }}">

                        Ekstrakurikuler

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('public.berita') }}">

                        Berita

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                        href="{{ route('public.galeri') }}">

                        Galeri

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


<main class="detail-page">


    {{-- =========================
         HEADER
    ========================= --}}

    <section class="detail-header">

        <div class="container">

            <div class="small-title">
                Guru & Tenaga Kependidikan
            </div>

            <h1>
                Detail Guru
            </h1>

            <p>
                Informasi mengenai guru dan tenaga pendidik
                {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}.
            </p>

        </div>

    </section>


    {{-- =========================
         DETAIL GURU
    ========================= --}}

    <section class="detail-section">

        <div class="container">


            {{-- TOMBOL KEMBALI --}}

            <div class="mb-4">

                <a href="{{ route('public.guru') }}"
                    class="btn-outline-school d-inline-flex align-items-center">

                    <i class="bi bi-arrow-left me-2"></i>

                    Kembali ke Daftar Guru

                </a>

            </div>


            <div class="detail-card">

                <div class="row g-0">


                    {{-- FOTO --}}

                    <div class="col-lg-5">

                        <div class="detail-photo-wrapper">

                            @if($guru->foto)

                                <img src="{{ asset('storage/' . $guru->foto) }}"
                                    class="detail-photo"
                                    alt="{{ $guru->nama_guru }}">

                            @else

                                <div class="detail-photo-empty">

                                    <i class="bi bi-person-circle"></i>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- INFORMASI --}}

                    <div class="col-lg-7">

                        <div class="detail-content">

                            <div class="detail-label">
                                Data Guru
                            </div>

                            <h2 class="detail-name">
                                {{ $guru->nama_guru }}
                            </h2>

                            <div class="detail-mapel">

                                <i class="bi bi-book me-1"></i>

                                {{ $guru->mapel ?? '-' }}

                            </div>


                            <div class="detail-info">


                                {{-- NAMA --}}

                                <div class="detail-info-item">

                                    <div class="detail-info-icon">

                                        <i class="bi bi-person"></i>

                                    </div>

                                    <div class="detail-info-text">

                                        <small>
                                            Nama Guru
                                        </small>

                                        <span>
                                            {{ $guru->nama_guru }}
                                        </span>

                                    </div>

                                </div>


                                {{-- NIP --}}

                                <div class="detail-info-item">

                                    <div class="detail-info-icon">

                                        <i class="bi bi-person-vcard"></i>

                                    </div>

                                    <div class="detail-info-text">

                                        <small>
                                            NIP
                                        </small>

                                        <span>
                                            {{ $guru->nip ?? '-' }}
                                        </span>

                                    </div>

                                </div>


                                {{-- MATA PELAJARAN --}}

                                <div class="detail-info-item">

                                    <div class="detail-info-icon">

                                        <i class="bi bi-book"></i>

                                    </div>

                                    <div class="detail-info-text">

                                        <small>
                                            Mata Pelajaran
                                        </small>

                                        <span>
                                            {{ $guru->mapel ?? '-' }}
                                        </span>

                                    </div>

                                </div>


                            </div>


                            {{-- TOMBOL --}}

                            <div class="mt-4 d-flex gap-2 flex-wrap">

                                <a href="{{ route('public.guru') }}"
                                    class="btn-primary-school">

                                    <i class="bi bi-people-fill me-1"></i>

                                    Lihat Semua Guru

                                </a>

                                <a href="{{ route('public.dashboard') }}#guru"
                                    class="btn-outline-school">

                                    <i class="bi bi-house me-1"></i>

                                    Kembali ke Beranda

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


</main>


{{-- =========================
     FOOTER
========================= --}}

<footer>

    <div class="container">

        <div class="row g-5">


            <div class="col-lg-5">

                <div class="footer-title">

                    {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}

                </div>

                <p class="footer-text">

                    {{ $profile?->deskripsi
                        ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.' }}

                </p>

            </div>


            <div class="col-lg-3">

                <div class="footer-title">
                    Navigasi
                </div>

                <ul class="footer-links">

                    <li>

                        <a href="{{ route('public.dashboard') }}">
                            Beranda
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('public.profil') }}">
                            Profil
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('public.guru') }}">
                            Guru
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('public.ekstrakurikuler') }}">
                            Ekstrakurikuler
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('public.berita') }}">
                            Berita
                        </a>

                    </li>

                    <li>

                        <a href="{{ route('public.galeri') }}">
                            Galeri
                        </a>

                    </li>

                </ul>

            </div>


            <div class="col-lg-4">

                <div class="footer-title">
                    Kontak Sekolah
                </div>


                <p class="footer-text mb-2">

                    <i class="bi bi-geo-alt me-2"></i>

                    {{ $profile?->alamat ?? '-' }}

                </p>


                <p class="footer-text mb-2">

                    <i class="bi bi-telephone me-2"></i>

                    {{ $profile?->kontak ?? '-' }}

                </p>


                <p class="footer-text">

                    <i class="bi bi-building me-2"></i>

                    NPSN: {{ $profile?->npsn ?? '-' }}

                </p>

            </div>

        </div>


        <div class="footer-bottom text-center">

            &copy; {{ date('Y') }}

            {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}.

            Semua Hak Dilindungi.

        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>
```

</body>

</html>
