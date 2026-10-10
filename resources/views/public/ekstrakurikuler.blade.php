<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Ekstrakurikuler -
        {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
    </title>

    @if($profile?->logo)
        <link rel="icon" href="{{ asset('storage/' . $profile->logo) }}">
    @endif

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
            background: #fff;
        }

        a {
            text-decoration: none;
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
           HEADER
        ========================= */

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

        .page-header-content {
            color: #fff;
        }

        .page-header-content .badge-header {
            display: inline-block;

            padding: 8px 16px;
            margin-bottom: 18px;

            border: 1px solid rgba(255, 255, 255, .3);
            border-radius: 30px;

            background: rgba(255, 255, 255, .15);

            color: #fff;

            font-size: 12px;
            font-weight: 600;
        }

        .page-header-content h1 {
            margin-bottom: 16px;

            color: #fff;

            font-size: clamp(32px, 5vw, 48px);
            font-weight: 800;
            line-height: 1.15;
        }

        .page-header-content p {
            max-width: 650px;

            color: rgba(255, 255, 255, .88);

            font-size: 14px;
            line-height: 1.8;
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
           EKSTRAKURIKULER CARD
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

            box-shadow:
                0 15px 35px rgba(15, 23, 42, .10);
        }

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

        .school-card-body {
            display: flex;
            flex: 1;
            flex-direction: column;

            padding: 20px;
        }

        .school-card-body h5 {
            min-height: 23px;

            margin-bottom: 10px;

            color: #0f172a;

            font-size: 16px;
            font-weight: 800;
        }

        .card-meta {
            margin-bottom: 8px;

            color: #2563eb;

            font-size: 11px;
            font-weight: 700;
        }

        .eskul-icon {
            margin-right: 6px;
            color: #2563eb;
        }

        .eskul-description {
            min-height: 45px;

            margin-top: 4px !important;

            margin-bottom: 15px;

            color: #64748b;

            font-size: 12px;
            line-height: 1.8;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-primary,
        .eskul-detail-btn {
            background: #0f3d91 !important;
            border-color: #0f3d91 !important;

            color: #fff !important;

            font-weight: 700;

            transition: .3s;
        }

        .btn-primary:hover,
        .eskul-detail-btn:hover {
            background: #082c6b !important;
            border-color: #082c6b !important;

            color: #fff !important;

            transform: translateY(-2px);
        }

        .eskul-detail-btn {
            padding: 8px 15px;

            border-radius: 7px;

            font-size: 11px;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-button-wrapper {
            margin-top: 45px;

            text-align: center;
        }

        .back-button {
            display: inline-flex;

            align-items: center;
            gap: 8px;

            padding: 11px 20px;

            border: 1px solid #0f3d91;
            border-radius: 8px;

            background: #fff;

            color: #0f3d91;

            font-size: 12px;
            font-weight: 700;

            transition: .3s;
        }

        .back-button:hover {
            background: #0f3d91;
            color: #fff;
        }


        /* =========================
           EMPTY DATA
        ========================= */

        .empty-state {
            padding: 60px 20px;

            border: 1px solid #e2e8f0;
            border-radius: 14px;

            background: #fff;

            text-align: center;
        }

        .empty-state i {
            color: #94a3b8;
            font-size: 55px;
        }

        .empty-state h4 {
            margin-top: 15px;

            color: #0f172a;

            font-size: 18px;
            font-weight: 800;
        }

        .empty-state p {
            margin-top: 8px;

            color: #64748b;

            font-size: 13px;
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

            .page-header {
                min-height: 330px;
            }

        }

        @media (max-width: 767px) {

            .page-header {
                min-height: 300px;
            }

            .page-header-content h1 {
                font-size: 32px;
            }

            .section {
                padding: 65px 0;
            }

        }

        @media (max-width: 576px) {

            .navbar-brand img {
                width: 42px;
                height: 42px;
            }

            .brand-text .school-name {
                font-size: 12px;
            }

            .page-header {
                margin-top: 66px;
                min-height: 280px;
            }

            .page-header-content h1 {
                font-size: 28px;
            }

            .page-header-content p {
                font-size: 12px;
            }

        }

    </style>

</head>


<body>


    {{-- =====================================================
         NAVBAR - SAMA DENGAN LANDING PAGE
    ====================================================== --}}

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container">


            {{-- LOGO --}}

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


            {{-- TOGGLE MOBILE --}}

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>


            {{-- MENU --}}

            <div class="collapse navbar-collapse"
                id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-lg-center">


                    {{-- BERANDA --}}

                    <li class="nav-item">

                        <a class="nav-link"
                            href="{{ route('public.dashboard') }}">

                            Beranda

                        </a>

                    </li>


                    {{-- PROFIL --}}

                    <li class="nav-item">

                        <a class="nav-link"
                            href="{{ route('public.profil') }}">

                            Profil

                        </a>

                    </li>


                    {{-- GURU --}}

                    <li class="nav-item">

                        <a class="nav-link"
                            href="{{ route('public.guru') }}">

                            Guru

                        </a>

                    </li>


                    {{-- EKSTRAKURIKULER --}}

                    <li class="nav-item">

                        <a class="nav-link active"
                            href="{{ route('public.ekstrakurikuler') }}">

                            Ekstrakurikuler

                        </a>

                    </li>


                    {{-- BERITA --}}

                    <li class="nav-item">

                        <a class="nav-link"
                            href="{{ route('public.berita') }}">

                            Berita

                        </a>

                    </li>


                    {{-- GALERI --}}

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



    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <section class="page-header">

        <div class="container">

            <div class="page-header-content">

                <div class="badge-header">

                    <i class="bi bi-trophy-fill me-2"></i>

                    KEGIATAN SISWA

                </div>


                <h1>
                    Ekstrakurikuler
                </h1>


                <p>

                    Berbagai kegiatan untuk mengembangkan minat,
                    bakat, kreativitas, dan karakter siswa.

                </p>

            </div>

        </div>

    </section>



    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <section class="section section-light">

        <div class="container">


            {{-- TITLE --}}

            <div class="section-title">

                <div class="small-title">
                    Kegiatan Siswa
                </div>

                <h2>
                    Ekstrakurikuler Sekolah
                </h2>

                <p>

                    Berbagai pilihan kegiatan yang dapat diikuti
                    siswa sesuai minat dan bakatnya.

                </p>

            </div>



            {{-- DATA --}}

            @if($ekstrakurikuler->isEmpty())


                <div class="empty-state">

                    <i class="bi bi-trophy"></i>

                    <h4>
                        Belum Ada Data Ekstrakurikuler
                    </h4>

                    <p>
                        Data ekstrakurikuler belum tersedia.
                    </p>

                </div>


            @else


                <div class="row g-4">


                    @foreach($ekstrakurikuler as $item)


                        <div class="col-md-6 col-lg-4">


                            <div class="school-card eskul-card">


                                {{-- GAMBAR --}}

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



                                {{-- BODY --}}

                                <div class="school-card-body">


                                    <h5>
                                        {{ $item->nama_eskul }}
                                    </h5>


                                    {{-- PEMBINA --}}

                                    <div class="card-meta">

                                        <i class="bi bi-person-fill eskul-icon"></i>

                                        {{ $item->pembina ?? '-' }}

                                    </div>


                                    {{-- JADWAL --}}

                                    <div class="card-meta">

                                        <i class="bi bi-calendar-event eskul-icon"></i>

                                        {{ $item->jadwal_latihan ?? '-' }}

                                    </div>


                                    {{-- DESKRIPSI --}}

<p class="eskul-description">
    {{ \Illuminate\Support\Str::limit(
        strip_tags($item->deskripsi ?? ''),
        105
    ) }}
</p>

<div class="mt-3">
    <a href="{{ route('public.ekstrakurikuler.detail', ['id' => $item->id_eskul]) }}"
       class="btn btn-primary btn-sm">
        <i class="bi bi-eye me-1"></i>
        Lihat Detail
    </a>
</div>

                                    </p>
                                    {{-- DETAIL --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- KEMBALI --}}
            <div class="back-button-wrapper">
                <a href="{{ route('public.dashboard') }}"
                    class="back-button">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <footer>
        <div class="container">
            <div class="row g-5">
                {{-- SEKOLAH --}}
                <div class="col-lg-5">
                    <div class="footer-title">
                        {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
                    </div>
                    <p class="footer-text">
                        {{ $profile?->deskripsi
                            ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.' }}
                    </p>
                </div>

                {{-- NAVIGASI --}}

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



                {{-- KONTAK --}}

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



            {{-- COPYRIGHT --}}

            <div class="footer-bottom text-center">

                &copy; {{ date('Y') }}

                {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}.

                Semua Hak Dilindungi.

            </div>


        </div>

    </footer>



    {{-- JAVASCRIPT --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>