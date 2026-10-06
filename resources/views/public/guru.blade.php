<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/satap.png') }}">

    <title>
        Guru & Staf -
        {{ $profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja' }}
    </title>

    <link rel="stylesheet"
        href="{{ asset('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
        href="{{ asset('assets/school-template/css/navbar.css') }}">

    <link rel="stylesheet"
        href="{{ asset('assets/school-template/css/footer.css') }}">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f8fafc;
        }

        .page-header {
            padding: 150px 0 80px;
            background:
                linear-gradient(rgba(0, 0, 0, .55), rgba(0, 0, 0, .55)),
                url("{{ asset('assets/school-template/img/background.jpg') }}") center/cover;
        }

        .section-title {
            font-weight: 700;
            color: #1e3a8a;
        }

        .guru-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .guru-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
            transition: .3s;
            height: 100%;
        }

        .guru-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .15) !important;
        }

        .guru-photo {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
        }

        .guru-empty {
            width: 100%;
            height: 280px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .guru-empty i {
            font-size: 70px;
            color: #94a3b8;
        }

        .guru-card .card-body {
            padding: 25px;
        }

        .guru-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
        }

        .guru-name {
            font-weight: 700;
            color: #1e293b;
        }

        .guru-mapel {
            color: #2563eb;
            font-weight: 600;
        }

        .detail-button {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 18px;
            border-radius: 9px;
            background: #2563eb;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .guru-card:hover .detail-button {
            background: #1d4ed8;
        }

        footer {
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center"
                href="{{ route('public.dashboard') }}">

                @if($profile?->logo)

                    <img src="{{ asset('storage/' . $profile->logo) }}"
                        alt="Logo Sekolah"
                        style="height:50px;">

                @else

                    <img src="{{ asset('assets/school-template/img/logo-sekolah-tut-wuri-handayani.avif') }}"
                        alt="Logo Sekolah"
                        style="height:50px;">

                @endif

                <span class="ms-2 fw-bold">
                    {{ $profile->nama_sekolah ?? 'SMP NEGERI SATU ATAP 1 MANGUNREJA' }}
                </span>

            </a>


            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

                <span class="navbar-toggler-icon"></span>

            </button>


            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('public.dashboard') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('public.profil') }}">
                            Profil Sekolah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active"
                            href="{{ route('public.guru') }}">
                            Guru & Staf
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


    <!-- HEADER -->
    <section class="page-header text-white text-center">

        <div class="container">

            <h1 class="fw-bold">
                Guru & Staf
            </h1>

            <p class="mb-0">
                Mengenal guru dan tenaga pendidik di sekolah kami
            </p>

        </div>

    </section>


    <!-- DATA GURU -->
    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="section-title">
                    Guru & Staf Sekolah
                </h2>

                <p class="text-muted">
                    Tenaga pendidik dan staf yang mendukung kegiatan sekolah
                </p>

            </div>


            <div class="row g-4">

                @if($guru->isEmpty())

                    <div class="col-12">

                        <div class="text-center py-5">

                            <i class="bi bi-person-x fs-1 text-secondary"></i>

                            <p class="text-muted mt-3 mb-0">
                                Belum ada data guru.
                            </p>

                        </div>

                    </div>

                @else

                    @foreach($guru as $item)

                        <div class="col-md-6 col-lg-4">

                            <!-- CARD GURU KLIKABLE -->
                            <a href="{{ route('public.guru.detail', $item->id_guru) }}"
                                class="guru-link">

                                <div class="card guru-card shadow-sm">

                                    <!-- FOTO -->
                                    @if($item->foto)

                                        <img src="{{ asset('storage/' . $item->foto) }}"
                                            class="guru-photo"
                                            alt="{{ $item->nama_guru }}">

                                    @else

                                        <div class="guru-empty">

                                            <i class="bi bi-person-circle"></i>

                                        </div>

                                    @endif


                                    <!-- INFORMASI -->
                                    <div class="card-body text-center">

                                        <div class="guru-icon">

                                            <i class="bi bi-person-badge"></i>

                                        </div>


                                        <h5 class="guru-name mb-2">

                                            {{ $item->nama_guru }}

                                        </h5>


                                        <p class="guru-mapel mb-2">

                                            {{ $item->mapel ?? 'Guru' }}

                                        </p>


                                        <p class="text-muted mb-0">

                                            @if($item->nip)

                                                NIP: {{ $item->nip }}

                                            @else

                                                Tenaga Pendidik

                                            @endif

                                        </p>


                                        <span class="detail-button">

                                            Lihat Detail
                                            <i class="bi bi-arrow-right ms-1"></i>

                                        </span>

                                    </div>

                                </div>

                            </a>

                        </div>

                    @endforeach

                @endif

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="bg-dark text-white py-5">

        <div class="container">

            <div class="row">

                <div class="col-md-6 mb-4">

                    <h5 class="fw-bold">

                        {{ $profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja' }}

                    </h5>

                    <p class="text-white-50">

                        {{ $profile->deskripsi ?? 'Website resmi profil sekolah.' }}

                    </p>

                </div>


                <div class="col-md-3 mb-4">

                    <h6 class="fw-bold">
                        Menu
                    </h6>

                    <a href="{{ route('public.dashboard') }}"
                        class="d-block text-white-50 text-decoration-none mb-2">
                        Beranda
                    </a>

                    <a href="{{ route('public.profil') }}"
                        class="d-block text-white-50 text-decoration-none mb-2">
                        Profil Sekolah
                    </a>

                    <a href="{{ route('public.guru') }}"
                        class="d-block text-white-50 text-decoration-none mb-2">
                        Guru & Staf
                    </a>

                    <a href="{{ route('public.ekstrakurikuler') }}"
                        class="d-block text-white-50 text-decoration-none mb-2">
                        Ekstrakurikuler
                    </a>

                    <a href="{{ route('public.berita') }}"
                        class="d-block text-white-50 text-decoration-none mb-2">
                        Berita
                    </a>

                    <a href="{{ route('public.galeri') }}"
                        class="d-block text-white-50 text-decoration-none">
                        Galeri
                    </a>

                </div>


                <div class="col-md-3">

                    <h6 class="fw-bold">
                        Kontak
                    </h6>

                    <p class="text-white-50 mb-2">

                        <i class="bi bi-geo-alt me-2"></i>

                        {{ $profile->alamat ?? '-' }}

                    </p>


                    <p class="text-white-50">

                        <i class="bi bi-telephone me-2"></i>

                        {{ $profile->kontak ?? '-' }}

                    </p>

                </div>

            </div>


            <hr class="border-secondary">


            <div class="text-center text-white-50">

                <small>

                    © {{ date('Y') }}

                    {{ $profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja' }}

                </small>

            </div>

        </div>

    </footer>


    <script src="{{ asset('assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>