```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Guru & Staf -
        {{ $profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja' }}
    </title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        /* =========================
           GLOBAL
        ========================== */

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


        /* =========================
           NAVBAR
        ========================== */

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


        /* =========================
           HEADER
        ========================== */

        .page-header {
            margin-top: 72px;

            min-height: 280px;

            background:
                linear-gradient(
                    rgba(15, 61, 145, 0.82),
                    rgba(15, 61, 145, 0.82)
                ),
                url("{{ asset('assets/images/school.jpg') }}");

            background-size: cover;
            background-position: center;

            display: flex;
            align-items: center;
            justify-content: center;

            text-align: center;

            color: white;

            padding: 50px 20px;
        }

        .page-header h1 {
            font-size: 34px;
            font-weight: 800;

            margin-bottom: 10px;
        }

        .page-header p {
            font-size: 15px;

            margin-bottom: 0;

            opacity: 0.95;
        }


        /* =========================
           GURU SECTION
        ========================== */

        .guru-section {
            padding: 75px 0;

            background: #f8fafc;
        }

        .section-title {
            text-align: center;

            margin-bottom: 45px;
        }

        .section-title h2 {
            color: #0f3d91;

            font-size: 28px;

            font-weight: 800;

            margin-bottom: 10px;
        }

        .section-title p {
            color: #64748b;

            font-size: 14px;

            margin-bottom: 0;
        }


        /* =========================
           GURU CARD
        ========================== */

        .guru-card {
            height: 100%;

            background: #ffffff;

            border-radius: 15px;

            overflow: hidden;

            border: 1px solid #e2e8f0;

            box-shadow:
                0 5px 20px rgba(15, 23, 42, 0.06);

            transition: all 0.3s ease;
        }

        .guru-card:hover {
            transform: translateY(-7px);

            box-shadow:
                0 12px 30px rgba(15, 23, 42, 0.12);
        }


        /* =========================
           FOTO GURU
        ========================== */

        .guru-photo-wrapper {
            width: 100%;

            height: 300px;

            background: #f1f5f9;

            overflow: hidden;

            display: flex;

            align-items: center;

            justify-content: center;
        }

        .guru-photo {
            width: 100%;

            height: 100%;

            /*
             * contain = foto ditampilkan utuh
             * sehingga kepala/badan tidak terpotong.
             */
            object-fit: contain;

            object-position: center;

            transition: transform 0.4s ease;
        }

        .guru-card:hover .guru-photo {
            transform: scale(1.02);
        }

        .guru-photo-empty {
            width: 100%;

            height: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #94a3b8;

            font-size: 60px;
        }


        /* =========================
           GURU INFO
        ========================== */

        .guru-card-body {
            padding: 25px 22px;

            text-align: center;
        }

        .guru-name {
            color: #0f3d91;

            font-size: 18px;

            font-weight: 800;

            margin-bottom: 15px;
        }

        .guru-info {
            color: #64748b;

            font-size: 13px;

            line-height: 1.9;

            margin-bottom: 20px;
        }

        .guru-info div {
            margin-bottom: 3px;
        }

        .guru-info i {
            color: #0f3d91;
        }


        /* =========================
           BUTTON DETAIL
        ========================== */

        .btn-detail {
            background: #0f3d91;

            border: none;

            color: white;

            font-size: 13px;

            font-weight: 600;

            padding: 10px 18px;

            border-radius: 8px;

            transition: 0.3s;
        }

        .btn-detail:hover {
            background: #082c6b;

            color: white;

            transform: translateY(-2px);
        }


        /* =========================
           EMPTY DATA
        ========================== */

        .empty-data {
            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 15px;

            padding: 60px 20px;

            text-align: center;
        }

        .empty-data i {
            font-size: 55px;

            color: #94a3b8;

            margin-bottom: 15px;
        }

        .empty-data h5 {
            color: #475569;

            font-weight: 700;
        }

        .empty-data p {
            color: #94a3b8;

            font-size: 14px;

            margin-bottom: 0;
        }


        /* =========================
           FOOTER
        ========================== */

        footer {
            background: #0f172a;

            color: #cbd5e1;

            padding: 65px 0 25px;
        }

        .footer-title {
            color: #ffffff;

            font-size: 16px;

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

            padding-left: 4px;
        }

        .footer-bottom {
            border-top:
                1px solid rgba(255,255,255,0.08);

            margin-top: 45px;

            padding-top: 20px;

            color: #64748b;

            font-size: 12px;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 991px) {

            .navbar-nav {
                padding-top: 15px;
            }

            .page-header {
                min-height: 250px;
            }

            .guru-section {
                padding: 60px 0;
            }
        }


        @media (max-width: 767px) {

            .navbar-brand img {
                width: 42px;

                height: 42px;
            }

            .brand-text .school-name {
                font-size: 12px;
            }

            .page-header {
                min-height: 230px;

                padding: 40px 20px;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .page-header p {
                font-size: 13px;
            }

            .guru-section {
                padding: 50px 0;
            }

            .section-title h2 {
                font-size: 24px;
            }

            .guru-photo-wrapper {
                height: 300px;
            }
        }

    </style>
</head>

<body>


<!-- =========================
     NAVBAR
========================== -->

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">

        <a class="navbar-brand"
           href="{{ route('public.dashboard') }}">

            @if($profile?->logo)

                <img
                    src="{{ asset('storage/' . $profile->logo) }}"
                    alt="Logo Sekolah">

            @else

                <img
                    src="{{ asset('assets/images/satap.png') }}"
                    alt="Logo Sekolah">

            @endif


            <div class="brand-text">

                <div class="school-name">

                    {{ $profile?->nama_sekolah
                        ?? 'SMPN Satu Atap 1 Mangunreja' }}

                </div>

            </div>

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
            aria-controls="navbarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('public.dashboard') }}">

                        Beranda

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('public.profil') }}">

                        Profil

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link active"
                        href="{{ route('public.guru') }}">

                        Guru

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('public.ekstrakurikuler') }}">

                        Ekstrakurikuler

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('public.berita') }}">

                        Berita

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('public.galeri') }}">

                        Galeri

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- =========================
     HEADER
========================== -->

<section class="page-header">

    <div>

        <h1>
            Guru & Tenaga Kependidikan
        </h1>

        <p>

            Mengenal guru dan tenaga pendidik
            {{ $profile?->nama_sekolah
                ?? 'SMPN Satu Atap 1 Mangunreja' }}

        </p>

    </div>

</section>


<!-- =========================
     DATA GURU
========================== -->

<section class="guru-section">

    <div class="container">


        <div class="section-title">

            <h2>
                Guru & Staf
            </h2>

            <p>
                Berikut adalah daftar guru yang mengajar
                di sekolah kami.
            </p>

        </div>


        @if($guru->isEmpty())

            <div class="empty-data">

                <i class="bi bi-people"></i>

                <h5>
                    Data guru belum tersedia
                </h5>

                <p>
                    Belum ada data guru yang ditambahkan.
                </p>

            </div>

        @else

            <div class="row g-4">

                @foreach($guru as $item)

                    <div class="col-lg-4 col-md-6">

                        <div class="guru-card">


                            <!-- FOTO -->

                            <div class="guru-photo-wrapper">

                                @if($item->foto)

                                    <img
                                        src="{{ asset('storage/' . $item->foto) }}"
                                        class="guru-photo"
                                        alt="{{ $item->nama_guru }}">

                                @else

                                    <div class="guru-photo-empty">

                                        <i class="bi bi-person-circle"></i>

                                    </div>

                                @endif

                            </div>


                            <!-- INFORMASI -->

                            <div class="guru-card-body">

                                <div class="guru-name">

                                    {{ $item->nama_guru }}

                                </div>


                                <div class="guru-info">

                                    <div>

                                        <i class="bi bi-book me-1"></i>

                                        {{ $item->mapel ?? '-' }}

                                    </div>


                                    <div>

                                        <i class="bi bi-person-vcard me-1"></i>

                                        NIP:
                                        {{ $item->nip ?? '-' }}

                                    </div>

                                </div>


                                <a
                                    href="{{ route('public.guru.detail', ['id' => $item->id_guru]) }}"
                                    class="btn btn-detail">

                                    <i class="bi bi-eye me-1"></i>

                                    Lihat Detail

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</section>


<!-- =========================
     FOOTER
========================== -->

<footer>

    <div class="container">

        <div class="row g-5">


            <!-- SEKOLAH -->

            <div class="col-lg-5">

                <div class="footer-title">

                    {{ $profile?->nama_sekolah
                        ?? 'SMPN Satu Atap 1 Mangunreja' }}

                </div>


                <p class="footer-text">

                    {{ $profile?->deskripsi
                        ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.' }}

                </p>

            </div>


            <!-- NAVIGASI -->

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


            <!-- KONTAK -->

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

                    NPSN:
                    {{ $profile?->npsn ?? '-' }}

                </p>

            </div>

        </div>


        <div class="footer-bottom text-center">

            &copy; {{ date('Y') }}

            {{ $profile?->nama_sekolah
                ?? 'SMPN Satu Atap 1 Mangunreja' }}.

            Semua Hak Dilindungi.

        </div>

    </div>

</footer>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
