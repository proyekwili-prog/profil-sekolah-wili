<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/satap.png') }}">

    <title>
        Profil Sekolah -
        {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
    </title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
            scroll-padding-top: 90px;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #1e293b;
            background: #ffffff;
        }

        a {
            text-decoration: none;
        }

        section[id] {
            scroll-margin-top: 90px;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

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

        .brand-text small {
            font-size: 10px;
            color: #64748b;
            font-weight: 600;
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
            cursor: pointer;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #0f3d91;
            background: #eff6ff;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {
              margin-top: 72px;
            min-height: 360px;

            display: flex;
            align-items: center;

            position: relative;

            background:
                linear-gradient(
                    90deg,
                    rgba(5, 25, 70, .88) 0%,
                    rgba(5, 25, 70, .65) 45%,
                    rgba(5, 25, 70, .35) 100%
                ),
                url('{{ asset('assets/school-template/img/background.jpg') }}');

            background-size: cover;
            background-position: center;
        }

        .page-header h1 {
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 12px;
            color: #60a5fa;
        }

        .page-header p {
            font-size: 15px;
            font-weight: 500;
            opacity: 0.95;
        }


        /* =====================================================
           GENERAL
        ===================================================== */

        .section-title {
            font-weight: 800;
            color: #0f172a;
        }

        .section-subtitle {
            color: #64748b;
            font-size: 14px;
        }


        /* =====================================================
           PROFIL SEKOLAH
        ===================================================== */

        .profile-section {
            padding: 80px 0;
        }

        .profile-image-wrapper {
            width: 100%;
            height: 380px;
            background: #f1f5f9;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .profile-image-empty {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            color: #94a3b8;
        }

        .profile-description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.9;
        }


        /* =====================================================
           INFORMASI SEKOLAH
        ===================================================== */

        .info-section {
            padding: 80px 0;
            background: #f8fafc;
        }

        .info-card {
            height: 100%;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            transition: 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(15, 61, 145, 0.08);
        }

        .info-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #eff6ff;
            color: #0f3d91;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .info-card h6 {
            color: #0f172a;
        }

        .info-card p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
        }


        /* =====================================================
           VISI MISI
        ===================================================== */

        .vision-section {
            padding: 80px 0;
        }

        .vision-card {
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.05);
        }

        .vision-icon {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: #eff6ff;
            color: #0f3d91;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 28px;
        }

        .vision-text {
            color: #64748b;
            font-size: 14px;
            line-height: 1.9;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            background: #0f172a;
            color: #ffffff;
            padding: 60px 0 25px;
        }

        .footer-title {
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .footer-text {
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.8;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #94a3b8;
            font-size: 13px;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: #ffffff;
        }

        .footer-bottom {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #64748b;
            font-size: 12px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991px) {

            .navbar-nav {
                margin-top: 12px;
                padding-bottom: 10px;
            }

            .page-header {
                padding: 70px 0;
            }

            .page-header h1 {
                font-size: 34px;
            }

        }

        @media (max-width: 767px) {

            .profile-section,
            .info-section,
            .vision-section {
                padding: 60px 0;
            }

            .profile-image-wrapper {
                height: 300px;
            }

            .page-header h1 {
                font-size: 30px;
            }

        }

    </style>
</head>

<body>


{{-- =========================================================
     NAVBAR
========================================================= --}}

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
                    <a class="nav-link active"
                       href="{{ route('public.profil') }}">
                        Profil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
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


{{-- =========================================================
     HEADER
========================================================= --}}
 <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h1 class="text-white">
                       Profil Sekolah
                </h1>
                <p class="text-white">
            {{ $profile->nama_sekolah }}
        </p>
            </div>
        </div>
    </section>
{{-- =========================================================
     PROFIL SEKOLAH
========================================================= --}}

<section class="profile-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
            </h2>

            <p class="section-subtitle">
                Profil dan informasi sekolah
            </p>

        </div>


        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                @if($profile?->foto)

                    <div class="profile-image-wrapper">

                        <img src="{{ asset('storage/' . $profile->foto) }}"
                             class="profile-image"
                             alt="{{ $profile->nama_sekolah }}">

                    </div>

                @else

                    <div class="profile-image-wrapper">

                        <div class="profile-image-empty">

                            <i class="bi bi-building"
                               style="font-size: 80px;">
                            </i>

                        </div>

                    </div>

                @endif

            </div>


            <div class="col-lg-6">

                <h3 class="fw-bold mb-3">

                    {{ $profile?->nama_sekolah ?? '-' }}

                </h3>

                <p class="profile-description mb-0">

                    {{ $profile?->deskripsi ?? 'Informasi sekolah belum tersedia.' }}

                </p>
                <a href="{{ route('public.dashboard') }}"
   class="btn btn-primary mt-4"
   style="background:#0f3d91; border-color:#0f3d91;">

    <i class="bi bi-arrow-left me-1"></i>
    Kembali ke Halaman Landing Page

</a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     INFORMASI SEKOLAH
========================================================= --}}

<section id="detail-profil" class="info-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Detail Profil Sekolah
            </h2>

            <p class="section-subtitle">
                Informasi umum mengenai sekolah
            </p>

        </div>


        <div class="row g-4">

            {{-- Kepala Sekolah --}}
            <div class="col-md-6 col-lg-4">

                <div class="info-card">

                    <div class="card-body p-4">

                        <div class="info-icon">

                            <i class="bi bi-person-badge"></i>

                        </div>

                        <h6 class="fw-bold mt-3">
                            Kepala Sekolah
                        </h6>

                        <p class="mb-0">
                            {{ $profile?->kepala_sekolah ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- NPSN --}}
            <div class="col-md-6 col-lg-4">

                <div class="info-card">

                    <div class="card-body p-4">

                        <div class="info-icon">

                            <i class="bi bi-card-text"></i>

                        </div>

                        <h6 class="fw-bold mt-3">
                            NPSN
                        </h6>

                        <p class="mb-0">
                            {{ $profile?->npsn ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Tahun Berdiri --}}
            <div class="col-md-6 col-lg-4">

                <div class="info-card">

                    <div class="card-body p-4">

                        <div class="info-icon">

                            <i class="bi bi-calendar-event"></i>

                        </div>

                        <h6 class="fw-bold mt-3">
                            Tahun Berdiri
                        </h6>

                        <p class="mb-0">
                            {{ $profile?->tahun_berdiri ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Alamat --}}
            <div class="col-md-6 col-lg-6">

                <div class="info-card">

                    <div class="card-body p-4">

                        <div class="info-icon">

                            <i class="bi bi-geo-alt"></i>

                        </div>

                        <h6 class="fw-bold mt-3">
                            Alamat
                        </h6>

                        <p class="mb-0">
                            {{ $profile?->alamat ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Kontak --}}
            <div class="col-md-6 col-lg-6">

                <div class="info-card">

                    <div class="card-body p-4">

                        <div class="info-icon">

                            <i class="bi bi-telephone"></i>

                        </div>

                        <h6 class="fw-bold mt-3">
                            Kontak
                        </h6>

                        <p class="mb-0">
                            {{ $profile?->kontak ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     VISI MISI
========================================================= --}}

<section class="vision-section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Visi & Misi
            </h2>

            <p class="section-subtitle">
                Landasan dan arah pendidikan sekolah
            </p>

        </div>


        <div class="vision-card">

            <div class="card-body p-5 text-center">

                <div class="vision-icon">

                    <i class="bi bi-bullseye"></i>

                </div>

                <p class="vision-text mt-4 mb-0">

                    {{ $profile?->visi_misi ?? 'Visi dan misi sekolah belum tersedia.' }}

                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     FOOTER
========================================================= --}}

<footer>

    <div class="container">

        <div class="row g-5">

            {{-- Sekolah --}}
            <div class="col-lg-5">

                <div class="footer-title">

                    {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}

                </div>

                <p class="footer-text">

                    {{ $profile?->deskripsi
                        ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.' }}

                </p>

            </div>


            {{-- Navigasi --}}
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


            {{-- Kontak --}}
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

</body>
</html>
