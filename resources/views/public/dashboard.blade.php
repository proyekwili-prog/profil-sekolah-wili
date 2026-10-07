<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}</title>

    {{-- Logo favicon dari database --}}
    @if($profile?->logo)
        <link rel="icon" href="{{ asset('storage/' . $profile->logo) }}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            background: #fff;
        }

        a {
            text-decoration: none;
        }

        section[id] {
            scroll-margin-top: 90px;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar-custom {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1050;
            padding: 12px 0;
            background: rgba(255, 255, 255, .98);
            box-shadow: 0 2px 15px rgba(0, 0, 0, .08);
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
            color: #0f3d91;
            font-size: 14px;
            font-weight: 800;
        }

        .brand-text small {
            color: #64748b;
            font-size: 10px;
            font-weight: 600;
        }

        .navbar-nav {
            gap: 5px;
        }

        .navbar-nav .nav-link {
            padding: 9px 13px !important;
            border-radius: 7px;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            transition: .3s;
            cursor: pointer;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #0f3d91;
            background: #eff6ff;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-primary,
        .btn-primary-school,
        .eskul-detail-btn,
        .eskul-all-btn,
        .berita-all-btn,
        .galeri-all-btn {
            background: #0f3d91 !important;
            border-color: #0f3d91 !important;
            color: #fff !important;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary:hover,
        .btn-primary-school:hover,
        .eskul-detail-btn:hover,
        .eskul-all-btn:hover,
        .berita-all-btn:hover,
        .galeri-all-btn:hover {
            background: #082c6b !important;
            border-color: #082c6b !important;
            color: #fff !important;
            transform: translateY(-2px);
        }

        .btn-login {
            padding: 10px 18px !important;
            border-radius: 8px !important;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            margin-top: 72px;
        }

        .hero-slide {
            position: relative;
            height: 600px;
            overflow: hidden;
        }

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(5, 25, 70, .88) 0%,
                rgba(5, 25, 70, .65) 40%,
                rgba(5, 25, 70, .12) 100%
            );
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            transform: translateY(-50%);
        }

        .hero-content-inner {
            max-width: 700px;
        }

        .hero-badge {
            display: inline-block;
            padding: 8px 16px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, .3);
            border-radius: 30px;
            background: rgba(255, 255, 255, .15);
            color: #fff;
            font-size: 12px;
            font-weight: 600;
        }

        .hero-title {
            margin-bottom: 18px;
            color: #fff;
            font-size: clamp(32px, 5vw, 58px);
            font-weight: 800;
            line-height: 1.15;
        }

        .hero-title span {
            color: #60a5fa;
        }

        .hero-description {
            max-width: 650px;
            margin-bottom: 28px;
            color: rgba(255, 255, 255, .88);
            font-size: 15px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-primary-school,
        .btn-outline-school {
            padding: 13px 22px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary-school {
            border: none;
        }

        .btn-outline-school {
            border: 1px solid rgba(255, 255, 255, .7);
            background: transparent;
            color: #fff;
        }

        .btn-outline-school:hover {
            background: #fff;
            color: #0f3d91;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 7%;
        }

        /* =========================
           GENERAL
        ========================= */

        .section {
            padding: 85px 0;
        }

        .section-light {
            background: #f8fafc;
        }

        .section-title {
            margin-bottom: 45px;
            text-align: center;
        }

        .section-title .small-title {
            margin-bottom: 8px;
            color: #2563eb;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-title h2 {
            margin-bottom: 12px;
            color: #0f172a;
            font-size: 30px;
            font-weight: 800;
        }

        .section-title p {
            max-width: 700px;
            margin: auto;
            color: #64748b;
            font-size: 14px;
            line-height: 1.8;
        }

        /* =========================
           STATISTICS
        ========================= */

        .statistics {
            position: relative;
            z-index: 10;
            margin-top: -45px;
        }

        .stat-card {
            height: 100%;
            padding: 25px 20px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
            text-align: center;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .08);
            transition: .3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .12);
        }

        .stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 55px;
            height: 55px;
            margin: 0 auto 15px;
            border-radius: 12px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 24px;
        }

        .stat-number {
            color: #0f3d91;
            font-size: 27px;
            font-weight: 800;
        }

        .stat-label {
            margin-top: 4px;
            color: #64748b;
            font-size: 12px;
            font-weight: 600;
        }

        /* =========================
           PROFILE
        ========================= */

        .profile-image-wrapper {
            padding: 12px;
            border-radius: 16px;
            background: #f1f5f9;
        }

        .profile-image {
            width: 100%;
            height: 430px;
            border-radius: 12px;
            object-fit: cover;
        }

        .profile-content h2 {
            margin-bottom: 18px;
            color: #0f172a;
            font-size: 31px;
            font-weight: 800;
        }

        .profile-content > p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .profile-info {
            margin-top: 25px;
        }

        .profile-info-item {
            display: flex;
            gap: 14px;
            margin-bottom: 17px;
        }

        .profile-info-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            border-radius: 8px;
            background: #eff6ff;
            color: #2563eb;
        }

        .profile-info-text small {
            display: block;
            margin-bottom: 3px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .profile-info-text span {
            color: #334155;
            font-size: 13px;
            font-weight: 600;
        }

        /* =========================
           VISI MISI
        ========================= */

        .vision-box,
        .mission-box {
            height: 100%;
            padding: 40px;
            border-radius: 16px;
        }

        .vision-box {
            background: #0f3d91;
            color: #fff;
            text-align: center;
        }

        .mission-box {
            border: 1px solid #e2e8f0;
            background: #fff;
        }

        .vision-box h3,
        .mission-box h3 {
            margin-bottom: 18px;
            font-size: 22px;
            font-weight: 800;
        }

        .vision-box h3 i {
            display: inline-block;
            margin-right: 8px;
            vertical-align: middle;
        }

        .vision-box p,
        .mission-box p {
            font-size: 14px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .vision-box p {
            color: rgba(255, 255, 255, .88);
        }

        .mission-box p {
            color: #64748b;
        }

        /* =========================
           CARD
        ========================= */

        .school-card {
            height: 100%;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #fff;
            transition: .3s;
        }

        .school-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .10);
        }

        .school-card-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .school-card-body {
            padding: 20px;
        }

        .school-card-body h5 {
            margin-bottom: 10px;
            color: #0f172a;
            font-size: 16px;
            font-weight: 800;
        }

        .school-card-body p {
            margin-bottom: 0;
            color: #64748b;
            font-size: 12px;
            line-height: 1.8;
        }

        .card-meta {
            margin-bottom: 8px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 700;
        }

        /* =========================
           GURU
        ========================= */

        .guru-photo-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 300px;
            padding: 12px;
            overflow: hidden;
            background: #f8fafc;
        }

        .guru-photo {
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background: #fff;
            object-fit: contain !important;
            object-position: center;
        }

        .guru-name {
            margin-bottom: 7px;
            color: #0f172a;
            font-size: 15px;
            font-weight: 800;
        }

        .guru-info {
            color: #64748b;
            font-size: 11px;
            line-height: 1.8;
        }

        /* =========================
           EKSTRAKURIKULER
        ========================= */

        .eskul-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .eskul-image-wrapper {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #f8fafc;
        }

        .eskul-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .eskul-card:hover .eskul-image {
            transform: scale(1.05);
        }

        .eskul-card .school-card-body {
            display: flex;
            flex: 1;
            flex-direction: column;
        }

        .eskul-card .school-card-body h5 {
            min-height: 23px;
        }

        .eskul-description {
            min-height: 45px;
            margin-top: 4px !important;
        }

        .eskul-icon {
            margin-right: 6px;
            color: #2563eb;
        }

        .eskul-detail-btn {
            padding: 8px 15px;
            border-radius: 7px;
            font-size: 11px;
        }

        .eskul-all-btn,
        .berita-all-btn,
        .galeri-all-btn {
            padding: 12px 22px;
            border-radius: 8px;
            font-size: 12px;
        }

        /* =========================
           BERITA
        ========================= */

        .news-date {
            margin-bottom: 8px;
            color: #2563eb;
            font-size: 10px;
            font-weight: 700;
        }

        .news-title {
            color: #0f172a;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.4;
        }

        /* =========================
           GALERI
        ========================= */

        .gallery-card {
            position: relative;
            width: 100%;
            height: 280px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #e2e8f0;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .08);
        }

        .gallery-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .gallery-card:hover .gallery-image {
            transform: scale(1.06);
        }

        .gallery-overlay {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 55px 20px 20px;
            color: #fff;
            background: linear-gradient(
                transparent,
                rgba(0, 0, 0, .88)
            );
        }

        .gallery-overlay h5 {
            margin: 0 0 5px;
            font-size: 16px;
            font-weight: 800;
        }

        .gallery-overlay p {
            margin: 0;
            color: rgba(255, 255, 255, .85);
            font-size: 11px;
            line-height: 1.6;
        }

        /* =========================
           CAROUSEL
        ========================= */

        .section-carousel {
            position: relative;
        }

        .section-carousel .carousel-control-prev,
        .section-carousel .carousel-control-next {
            top: -62px;
            width: 42px;
            height: 42px;
            opacity: 1;
            border-radius: 8px;
            background: #0f3d91;
        }

        .section-carousel .carousel-control-prev {
            right: 52px;
            left: auto;
        }

        .section-carousel .carousel-control-next {
            right: 0;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            padding-top: 55px;
            background: #071b3d;
            color: #fff;
        }

        .footer-title {
            margin-bottom: 18px;
            font-size: 16px;
            font-weight: 800;
        }

        .footer-text {
            color: #cbd5e1;
            font-size: 12px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .footer-links {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 9px;
        }

        .footer-links a {
            color: #cbd5e1;
            font-size: 12px;
            transition: .3s;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .footer-bottom {
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, .1);
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

            .hero-slide {
                height: 530px;
            }

            .statistics {
                margin-top: 25px;
            }

            .section {
                padding: 65px 0;
            }
        }

        @media (max-width: 767px) {

            .hero-slide {
                height: 560px;
            }

            .hero-content {
                padding: 0 20px;
            }

            .hero-title {
                font-size: 32px;
            }

            .hero-description {
                font-size: 13px;
            }

            .profile-image {
                height: 300px;
            }

            .vision-box,
            .mission-box {
                padding: 25px;
            }

            .gallery-card {
                height: 250px;
            }

            .section-carousel .carousel-control-prev,
            .section-carousel .carousel-control-next {
                top: -55px;
            }
        }
    </style>
</head>

<body>

    {{-- =========================
       NAVBAR
    ========================= --}}

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container">

            <a class="navbar-brand menu-link" href="#beranda">

                {{-- LOGO DARI DATABASE --}}
                @if($profile?->logo)

                    <img src="{{ asset('storage/' . $profile->logo) }}"
                        alt="Logo {{ $profile->nama_sekolah ?? 'Sekolah' }}">

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

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#beranda">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#profil">
                            Profil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#guru">
                            Guru
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#ekstrakurikuler">
                            Ekstrakurikuler
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#berita">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#galeri">
                            Galeri
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    {{-- =========================
       HERO
    ========================= --}}

    <section id="beranda" class="hero">

        <div id="heroCarousel"
            class="carousel slide carousel-fade"
            data-bs-ride="carousel">

            <div class="carousel-inner">

                <div class="carousel-item active">

                    <div class="hero-slide">

                      @if($profile && $profile->foto)
    <img src="{{ asset('storage/' . $profile->foto) }}"
         alt="{{ $profile->nama_sekolah }}">
@endif

                        <div class="hero-overlay"></div>

                        <div class="hero-content">

                            <div class="container">

                                <div class="hero-content-inner">

                                    <div class="hero-badge">
                                        <i class="bi bi-mortarboard-fill"></i>
                                        SELAMAT DATANG
                                    </div>

                                    <h1 class="hero-title">
                                        {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
                                    </h1>

                                    <p class="hero-description">
                                        {!! nl2br(e($profile?->deskripsi ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas dan membentuk generasi berkarakter.')) !!}
                                    </p>

                                    <div class="hero-buttons">

                                        <a href="#profil"
                                            class="btn-primary-school menu-link">

                                            <i class="bi bi-building"></i>
                                            Tentang Sekolah

                                        </a>

                                        <a href="#berita"
                                            class="btn-outline-school menu-link">

                                            Lihat Berita

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="carousel-item">

                    <div class="hero-slide">

                        <img src="{{ $profile?->foto
                            ? asset('storage/' . $profile->foto)
                            : asset('assets/school-template/img/murid.webp') }}"
                            alt="Sekolah">

                        <div class="hero-overlay"></div>

                        <div class="hero-content">

                            <div class="container">

                                <div class="hero-content-inner">

                                    <div class="hero-badge">
                                        <i class="bi bi-stars"></i>
                                        PENDIDIKAN BERKARAKTER
                                    </div>

                                    <h1 class="hero-title">
                                        Membangun Generasi
                                        <span>Berprestasi</span>
                                    </h1>

                                    <p class="hero-description">
                                        Bersama menciptakan lingkungan pendidikan
                                        yang nyaman, aktif, kreatif, dan berkarakter.
                                    </p>

                                    <div class="hero-buttons">

                                        <a href="#guru"
                                            class="btn-primary-school menu-link">

                                            Kenali Guru Kami

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="carousel-item">

                    <div class="hero-slide">

                        <img src="{{ asset('assets/school-template/img/gurustap.webp') }}"
                            alt="Guru dan Staf">

                        <div class="hero-overlay"></div>

                        <div class="hero-content">

                            <div class="container">

                                <div class="hero-content-inner">

                                    <div class="hero-badge">
                                        <i class="bi bi-people-fill"></i>
                                        GURU & TENAGA KEPENDIDIKAN
                                    </div>

                                    <h1 class="hero-title">
                                        Bersama Mendidik
                                        <span>Generasi Bangsa</span>
                                    </h1>

                                    <p class="hero-description">
                                        Tenaga pendidik yang berdedikasi dalam
                                        mendampingi siswa untuk berkembang dan berprestasi.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>

            </button>

            <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>

            </button>

        </div>

    </section>


    {{-- =========================
       STATISTICS
    ========================= --}}

    <section class="statistics">

        <div class="container">

            <div class="row g-3">

                <div class="col-6 col-lg-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <div class="stat-number">
                            {{ $totalSiswa }}
                        </div>

                        <div class="stat-label">
                            Siswa
                        </div>

                    </div>

                </div>

                <div class="col-6 col-lg-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <div class="stat-number">
                            {{ $totalGuru }}
                        </div>

                        <div class="stat-label">
                            Guru & Staf
                        </div>

                    </div>

                </div>

                <div class="col-6 col-lg-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>

                        <div class="stat-number">
                            {{ $totalBerita }}
                        </div>

                        <div class="stat-label">
                            Berita
                        </div>

                    </div>

                </div>

                <div class="col-6 col-lg-3">

                    <div class="stat-card">

                        <div class="stat-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>

                        <div class="stat-number">
                            {{ $totalEkstrakurikuler }}
                        </div>

                        <div class="stat-label">
                            Ekstrakurikuler
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
       PROFIL
    ========================= --}}

    <section id="profil" class="section">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Profil Sekolah
                </div>

                <h2>
                    Mengenal Sekolah Kami
                </h2>

                <p>
                    Informasi mengenai profil dan identitas
                    sekolah {{ $profile?->nama_sekolah ?? '' }}.
                </p>

            </div>

            <div class="row g-5 align-items-center">

                <div class="col-lg-5">

                    <div class="profile-image-wrapper">

                        @if($profile?->foto)

                            <img src="{{ asset('storage/' . $profile->foto) }}"
                                class="profile-image"
                                alt="Foto {{ $profile->nama_sekolah ?? 'Sekolah' }}">

                        @else

                            <div class="d-flex align-items-center justify-content-center bg-light profile-image">

                                <i class="bi bi-building text-secondary"
                                    style="font-size:80px;"></i>

                            </div>

                        @endif

                    </div>

                </div>

                <div class="col-lg-7">

                    <div class="profile-content">

                        <h2>
                            {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
                        </h2>

                        <p>
                            @if(!empty($profile?->deskripsi))

                                {!! nl2br(e($profile->deskripsi)) !!}

                            @else

                                Deskripsi sekolah belum diisi.

                            @endif
                        </p>

                        <a href="{{ route('public.profil') }}"
                            class="btn btn-primary mt-4">

                            <i class="bi bi-eye me-1"></i>
                            Lihat Detail Profil

                        </a>

                        <div class="profile-info">

                            <div class="profile-info-item">

                                <div class="profile-info-icon">
                                    <i class="bi bi-person-badge"></i>
                                </div>

                                <div class="profile-info-text">

                                    <small>
                                        Kepala Sekolah
                                    </small>

                                    <span>
                                        {{ $profile?->kepala_sekolah ?? '-' }}
                                    </span>

                                </div>

                            </div>

                            <div class="profile-info-item">

                                <div class="profile-info-icon">
                                    <i class="bi bi-building"></i>
                                </div>

                                <div class="profile-info-text">

                                    <small>
                                        NPSN
                                    </small>

                                    <span>
                                        {{ $profile?->npsn ?? '-' }}
                                    </span>

                                </div>

                            </div>

                            <div class="profile-info-item">

                                <div class="profile-info-icon">
                                    <i class="bi bi-calendar-event"></i>
                                </div>

                                <div class="profile-info-text">

                                    <small>
                                        Tahun Berdiri
                                    </small>

                                    <span>
                                        {{ $profile?->tahun_berdiri ?? '-' }}
                                    </span>

                                </div>

                            </div>

                            <div class="profile-info-item">

                                <div class="profile-info-icon">
                                    <i class="bi bi-geo-alt"></i>
                                </div>

                                <div class="profile-info-text">

                                    <small>
                                        Alamat
                                    </small>

                                    <span>
                                        {{ $profile?->alamat ?? '-' }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
       VISI MISI
    ========================= --}}

    <section class="section section-light">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Visi & Misi
                </div>

                <h2>
                    Arah dan Tujuan Sekolah
                </h2>

                <p>
                    Landasan sekolah dalam membentuk peserta didik
                    yang berprestasi dan berkarakter.
                </p>

            </div>

            <div class="row g-4 justify-content-center">

                <div class="col-lg-8 col-md-10">

                    <div class="vision-box">

                        <h3>
                            <i class="bi bi-eye-fill me-2"></i>
                            Visi & Misi
                        </h3>

                        <p>
                            {{ $profile?->visi_misi ?? 'Visi dan misi sekolah belum tersedia.' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
       GURU
    ========================= --}}

    <section id="guru" class="section">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Guru & Tenaga Kependidikan
                </div>

                <h2>
                    Guru Kami
                </h2>

                <p>
                    Tenaga pendidik yang mendampingi siswa
                    dalam proses pembelajaran.
                </p>

            </div>

            <div id="guruCarousel"
                class="carousel slide section-carousel"
                data-bs-interval="false">

                <div class="carousel-inner">

                    @if($guru->isEmpty())

                        <div class="carousel-item active">

                            <div class="text-center py-5">

                                <i class="bi bi-people fs-1 text-secondary"></i>

                                <p class="mt-3 text-secondary">
                                    Belum ada data guru.
                                </p>

                            </div>

                        </div>

                    @else

                        @foreach($guru->chunk(3) as $index => $group)

                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                                <div class="row g-4">

                                    @foreach($group as $item)

                                        <div class="col-md-4">

                                            <div class="school-card">

                                                <div class="guru-photo-wrapper">

                                                    @if($item->foto)

                                                        <img src="{{ asset('storage/' . $item->foto) }}"
                                                            class="guru-photo"
                                                            alt="{{ $item->nama_guru }}">

                                                    @else

                                                        <div class="d-flex align-items-center justify-content-center bg-light"
                                                            style="width:100%;height:100%;">

                                                            <i class="bi bi-person-circle text-secondary"
                                                                style="font-size:80px;"></i>

                                                        </div>

                                                    @endif

                                                </div>

                                                <div class="school-card-body text-center">

                                                    <div class="guru-name">
                                                        {{ $item->nama_guru }}
                                                    </div>

                                                    <div class="guru-info mb-3">

                                                        <div>
                                                            <i class="bi bi-book me-1"></i>
                                                            {{ $item->mapel ?? '-' }}
                                                        </div>

                                                        <div>
                                                            <i class="bi bi-person-vcard me-1"></i>
                                                            NIP: {{ $item->nip ?? '-' }}
                                                        </div>

                                                    </div>

                                                    <a href="{{ route('public.guru.detail', ['id' => $item->id_guru]) }}"
                                                        class="btn btn-primary btn-sm">

                                                        <i class="bi bi-eye me-1"></i>
                                                        Lihat Detail

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    @endif

                </div>

                @if($guru->count() > 3)

                    <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#guruCarousel"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#guruCarousel"
                        data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                @endif

            </div>

            <div class="text-center mt-5">

                <a href="{{ route('public.guru') }}"
                    class="btn btn-primary px-4 py-2">

                    <i class="bi bi-people-fill me-2"></i>
                    Lihat Semua Guru

                </a>

            </div>

        </div>

    </section>


    {{-- =========================
       EKSTRAKURIKULER
    ========================= --}}

    <section id="ekstrakurikuler" class="section section-light">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Kegiatan Siswa
                </div>

                <h2>
                    Ekstrakurikuler
                </h2>

                <p>
                    Berbagai kegiatan untuk mengembangkan minat,
                    bakat, kreativitas, dan karakter siswa.
                </p>

            </div>

            <div id="eskulCarousel"
                class="carousel slide section-carousel"
                data-bs-interval="false">

                <div class="carousel-inner">

                    @if($ekstrakurikuler->isEmpty())

                        <div class="carousel-item active">

                            <div class="text-center py-5">

                                <i class="bi bi-trophy fs-1 text-secondary"></i>

                                <p class="mt-3 text-secondary">
                                    Belum ada data ekstrakurikuler.
                                </p>

                            </div>

                        </div>

                    @else

                        @foreach($ekstrakurikuler->chunk(3) as $index => $group)

                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                                <div class="row g-4">

                                    @foreach($group as $item)

                                        <div class="col-md-4">

                                            <div class="school-card eskul-card">

                                                <div class="eskul-image-wrapper">

                                                    @if($item->gambar)

                                                        <img src="{{ asset('storage/' . $item->gambar) }}"
                                                            class="eskul-image"
                                                            alt="{{ $item->nama_eskul }}">

                                                    @else

                                                        <img src="{{ asset('assets/school-template/img/murid.webp') }}"
                                                            class="eskul-image"
                                                            alt="{{ $item->nama_eskul }}">

                                                    @endif

                                                </div>

                                                <div class="school-card-body">

                                                    <h5>
                                                        {{ $item->nama_eskul }}
                                                    </h5>

                                                    <div class="card-meta">
                                                        <i class="bi bi-person-fill eskul-icon"></i>
                                                        {{ $item->pembina ?? '-' }}
                                                    </div>

                                                    <div class="card-meta">
                                                        <i class="bi bi-calendar-event eskul-icon"></i>
                                                        {{ $item->jadwal_latihan ?? '-' }}
                                                    </div>

                                                    <p class="eskul-description">
                                                        {{ \Illuminate\Support\Str::limit(
                                                            strip_tags($item->deskripsi ?? ''),
                                                            105
                                                        ) }}
                                                    </p>

                                                    <div class="mt-auto">

                                                        <a href="{{ route('public.ekstrakurikuler.detail', ['id' => $item->id_eskul]) }}"
                                                            class="btn btn-primary btn-sm eskul-detail-btn">

                                                            <i class="bi bi-eye me-1"></i>
                                                            Lihat Detail

                                                        </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    @endif

                </div>

                @if($ekstrakurikuler->count() > 3)

                    <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#eskulCarousel"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#eskulCarousel"
                        data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                @endif

            </div>

            @if($ekstrakurikuler->count() > 0)

                <div class="text-center mt-5">

                    <a href="{{ route('public.ekstrakurikuler') }}"
                        class="btn btn-primary eskul-all-btn">

                        <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                        Lihat Semua Ekstrakurikuler
                        <i class="bi bi-arrow-right ms-2"></i>

                    </a>

                </div>

            @endif

        </div>

    </section>


    {{-- =========================
       BERITA
    ========================= --}}

    <section id="berita" class="section">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Informasi Sekolah
                </div>

                <h2>
                    Berita Terbaru
                </h2>

                <p>
                    Informasi dan kegiatan terbaru dari sekolah.
                </p>

            </div>

            <div id="beritaCarousel"
                class="carousel slide section-carousel"
                data-bs-interval="false">

                <div class="carousel-inner">

                    @if($beritaTerbaru->isEmpty())

                        <div class="carousel-item active">

                            <div class="text-center py-5">

                                <i class="bi bi-newspaper fs-1 text-secondary"></i>

                                <p class="mt-3 text-secondary">
                                    Belum ada berita.
                                </p>

                            </div>

                        </div>

                    @else

                        @foreach($beritaTerbaru->chunk(3) as $index => $group)

                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                                <div class="row g-4">

                                    @foreach($group as $item)

                                        <div class="col-md-4">

                                            <div class="school-card">

                                                @if($item->gambar)

                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($item->gambar) }}"
                                                        class="school-card-image"
                                                        alt="{{ $item->judul }}">

                                                @else

                                                    <img src="{{ asset('assets/school-template/img/acara.webp') }}"
                                                        class="school-card-image"
                                                        alt="{{ $item->judul }}">

                                                @endif

                                                <div class="school-card-body">

                                                    <div class="news-date">

                                                        <i class="bi bi-calendar3"></i>

                                                        {{ $item->tanggal
                                                            ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')
                                                            : '-' }}

                                                    </div>

                                                    <div class="news-title">
                                                        {{ $item->judul }}
                                                    </div>

                                                    <p class="mt-2">
                                                        {{ \Illuminate\Support\Str::limit(
                                                            strip_tags($item->isi),
                                                            100
                                                        ) }}
                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    @endif

                </div>

                @if($beritaTerbaru->count() > 3)

                    <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#beritaCarousel"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>

                    <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#beritaCarousel"
                        data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                @endif

            </div>

            @if($beritaTerbaru->count() > 0)

                <div class="text-center mt-5">

                    <a href="{{ route('public.berita') }}"
                        class="btn btn-primary berita-all-btn">

                        <i class="bi bi-newspaper me-2"></i>
                        Lihat Semua Berita
                        <i class="bi bi-arrow-right ms-2"></i>

                    </a>

                </div>

            @endif

        </div>

    </section>


    {{-- =========================
       GALERI
    ========================= --}}

    <section id="galeri" class="section section-light">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Dokumentasi
                </div>

                <h2>
                    Galeri Sekolah
                </h2>

                <p>
                    Dokumentasi berbagai kegiatan yang berlangsung
                    di lingkungan sekolah.
                </p>

            </div>

            <div class="row g-4">

                @if($galeri->isEmpty())

                    <div class="col-12">

                        <div class="text-center py-5">

                            <i class="bi bi-images fs-1 text-secondary"></i>

                            <p class="mt-3 text-secondary">
                                Belum ada dokumentasi.
                            </p>

                        </div>

                    </div>

                @else

                    @foreach($galeri as $item)

                        <div class="col-md-6 col-lg-4">

                            <div class="gallery-card">

                                @if($item->file)

                                    <img src="{{ asset('storage/' . $item->file) }}"
                                        class="gallery-image"
                                        alt="{{ $item->judul }}"
                                        loading="lazy">

                                @else

                                    <img src="{{ asset('assets/school-template/img/acara.webp') }}"
                                        class="gallery-image"
                                        alt="{{ $item->judul }}">

                                @endif

                                <div class="gallery-overlay">

                                    <h5>
                                        {{ $item->judul }}
                                    </h5>

                                    @if($item->keterangan)

                                        <p>
                                            {{ $item->keterangan }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                @endif

            </div>

            @if($galeri->count() > 0)

                <div class="text-center mt-5">

                    <a href="{{ route('public.galeri') }}"
                        class="btn btn-primary galeri-all-btn">

                        <i class="bi bi-images me-2"></i>
                        Lihat Semua Galeri
                        <i class="bi bi-arrow-right ms-2"></i>

                    </a>

                </div>

            @endif

        </div>

    </section>


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
                        {!! nl2br(e($profile?->deskripsi
                            ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.')) !!}
                    </p>

                </div>

                <div class="col-lg-3">

                    <div class="footer-title">
                        Navigasi
                    </div>

                    <ul class="footer-links">

                        <li>
                            <a href="#beranda" class="menu-link">
                                Beranda
                            </a>
                        </li>

                        <li>
                            <a href="#profil" class="menu-link">
                                Profil
                            </a>
                        </li>

                        <li>
                            <a href="#guru" class="menu-link">
                                Guru
                            </a>
                        </li>

                        <li>
                            <a href="#ekstrakurikuler" class="menu-link">
                                Ekstrakurikuler
                            </a>
                        </li>

                        <li>
                            <a href="#berita" class="menu-link">
                                Berita
                            </a>
                        </li>

                        <li>
                            <a href="#galeri" class="menu-link">
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


    {{-- =========================
       JAVASCRIPT
    ========================= --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const menuLinks = document.querySelectorAll('.menu-link');

            menuLinks.forEach(function (link) {

                link.addEventListener('click', function (event) {

                    const targetId = this.getAttribute('href');

                    if (!targetId || !targetId.startsWith('#')) {
                        return;
                    }

                    const target = document.querySelector(targetId);

                    if (!target) {
                        return;
                    }

                    event.preventDefault();

                    const navbar = document.querySelector('.navbar-custom');

                    const navbarHeight = navbar
                        ? navbar.offsetHeight
                        : 0;

                    const targetPosition =
                        target.getBoundingClientRect().top +
                        window.pageYOffset -
                        navbarHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    const navbarMenu =
                        document.getElementById('navbarMenu');

                    if (
                        navbarMenu &&
                        navbarMenu.classList.contains('show')
                    ) {

                        const collapse =
                            bootstrap.Collapse.getInstance(navbarMenu);

                        if (collapse) {
                            collapse.hide();
                        }

                    }

                });

            });


            const sections =
                document.querySelectorAll('section[id]');

            const navLinks =
                document.querySelectorAll('.navbar-nav .menu-link');

            window.addEventListener('scroll', function () {

                let currentSection = '';

                sections.forEach(function (section) {

                    const sectionTop =
                        section.offsetTop - 120;

                    if (window.scrollY >= sectionTop) {

                        currentSection =
                            section.getAttribute('id');

                    }

                });

                navLinks.forEach(function (link) {

                    link.classList.toggle(
                        'active',
                        link.getAttribute('href') ===
                        '#' + currentSection
                    );

                });

            });

        });
    </script>

</body>

</html>