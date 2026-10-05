<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo e($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja'); ?></title>

    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css')); ?>">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 76px;
        }

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            color: #1f2937;
            background: #fff;
        }

        /* =========================
           NAVBAR
        ========================= */
        .main-navbar {
            height: 76px;
            background: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, .08);
            z-index: 9999;
        }

        .navbar-brand {
            font-size: 15px;
            color: #1e293b;
        }

        .navbar-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .nav-link {
            color: #334155 !important;
            font-size: 14px;
            font-weight: 600;
            padding: 27px 12px !important;
            transition: .2s;
        }

        .nav-link:hover {
            color: #2563eb !important;
        }

        /* =========================
           HERO
        ========================= */
        .hero {
            margin-top: 76px;
        }

        .hero .carousel-item {
            height: calc(100vh - 76px);
            min-height: 500px;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(.5);
        }

        .hero-caption {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        .hero-caption > div {
            max-width: 850px;
            padding: 20px;
        }

        .hero h1 {
            font-size: clamp(32px, 5vw, 58px);
            font-weight: 800;
            line-height: 1.2;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.8;
            color: #f1f5f9;
        }

        .btn-main {
            background: #2563eb;
            color: #fff;
            border: 0;
            padding: 13px 28px;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-main:hover {
            background: #1d4ed8;
            color: #fff;
        }

        /* =========================
           SECTION
        ========================= */
        .section {
            padding: 80px 0;
        }

        .section-light {
            background: #f8fafc;
        }

        .section-title {
            font-size: 32px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #64748b;
            margin-bottom: 40px;
        }

        /* =========================
           STATISTIK
        ========================= */
        .statistik-section {
            padding: 50px 0;
            background: #fff;
        }

        .statistik-card {
            height: 100%;
            padding: 30px 20px;
            text-align: center;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .08);
            transition: .25s;
        }

        .statistik-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, .12);
        }

        .statistik-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            font-size: 26px;
        }

        .statistik-card h2 {
            margin: 0;
            font-size: 32px;
            font-weight: 800;
            color: #0f172a;
        }

        .statistik-card p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 14px;
            font-weight: 600;
        }

        /* =========================
           PROFIL
        ========================= */
        .school-photo,
        .empty-photo {
            width: 100%;
            height: 380px;
            object-fit: cover;
            border-radius: 15px;
        }

        .school-photo {
            box-shadow: 0 10px 30px rgba(15, 23, 42, .12);
        }

        .empty-photo {
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-box {
            padding: 18px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-label {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .info-value {
            font-weight: 600;
            color: #1e293b;
        }

        /* =========================
           CARD
        ========================= */
        .custom-card {
            height: 100%;
            border: 0;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .08);
        }

        .custom-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .custom-card .empty-photo {
            height: 280px;
        }

        .icon-circle {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        /* =========================
           CAROUSEL
        ========================= */
        .carousel-card {
            padding: 10px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 6%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            padding: 20px;
            border-radius: 50%;
            background-color: #2563eb;
            background-size: 50%;
        }

        /* =========================
           FOOTER
        ========================= */
        .footer {
            padding: 60px 0 20px;
            background: #0f172a;
            color: #fff;
        }

        .footer h5,
        .footer h6 {
            font-weight: 700;
        }

        .footer p,
        .footer a {
            color: #94a3b8;
        }

        .footer a:hover {
            color: #fff;
        }

        .footer-bottom {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #334155;
            text-align: center;
            color: #64748b;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 991px) {
            .main-navbar {
                height: auto;
            }

            .nav-link {
                padding: 10px 0 !important;
            }

            .hero {
                margin-top: 68px;
            }

            .hero .carousel-item {
                height: 600px;
            }
        }

        @media (max-width: 767px) {
            .section {
                padding: 60px 0;
            }

            .hero .carousel-item {
                height: 550px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 15px;
            }

            .section-title {
                font-size: 27px;
            }

            .school-photo,
            .empty-photo {
                height: 280px;
            }

            .custom-card img,
            .custom-card .empty-photo {
                height: 230px;
            }

            .statistik-card {
                padding: 25px 15px;
            }

            .statistik-card h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

    
    <nav class="navbar navbar-expand-lg fixed-top main-navbar">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center" href="#beranda">

                <?php if($profile?->logo): ?>
                    <img src="<?php echo e(asset('storage/' . $profile->logo)); ?>"
                        alt="Logo Sekolah">
                <?php else: ?>
                    <img src="<?php echo e(asset('assets/school-template/img/sataplogo.jpg')); ?>"
                        alt="Logo Sekolah">
                <?php endif; ?>

                <span class="ms-2 fw-bold">
                    <?php echo e($profile->nama_sekolah ?? 'SMP NEGERI SATU ATAP 1 MANGUNREJA'); ?>

                </span>

            </a>

            <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

                <i class="bi bi-list fs-2"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#profil">
                            Profil Sekolah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#guru">
                            Guru & Staf
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#ekstrakurikuler">
                            Ekstrakurikuler
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#berita">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">
                            Galeri
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>


    
    <section id="beranda" class="hero">

        <div id="heroCarousel"
            class="carousel slide carousel-fade"
            data-bs-ride="carousel">

            <div class="carousel-indicators">

                <button type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide-to="0"
                    class="active">
                </button>

                <button type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide-to="1">
                </button>

                <button type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide-to="2">
                </button>

            </div>

            <div class="carousel-inner">

                
                <div class="carousel-item active">

                    <img src="<?php echo e(asset('assets/school-template/img/acara.webp')); ?>"
                        alt="Sekolah">

                    <div class="hero-caption">

                        <div>

                            <h1>
                                <?php echo e($profile->nama_sekolah ?? 'SMP NEGERI SATU ATAP 1 MANGUNREJA'); ?>

                            </h1>

                            <p>
                                <?php echo e($profile->deskripsi ?? 'Membangun Generasi Cerdas, Berkarakter, dan Berprestasi'); ?>

                            </p>

                            <a href="#profil" class="btn btn-main mt-3">
                                Selengkapnya
                                <i class="bi bi-arrow-down ms-2"></i>
                            </a>

                        </div>

                    </div>

                </div>


                
                <div class="carousel-item">

                    <img src="<?php echo e($profile?->foto
                        ? asset('storage/' . $profile->foto)
                        : asset('assets/school-template/img/murid.webp')); ?>"
                        alt="Profil Sekolah">

                    <div class="hero-caption">

                        <div>

                            <h1>
                                Profil Sekolah
                            </h1>

                            <p>
                                Mengenal lebih dekat sekolah kami
                            </p>

                            <a href="#profil" class="btn btn-main mt-3">
                                Lihat Profil
                            </a>

                        </div>

                    </div>

                </div>


                
                <div class="carousel-item">

                    <img src="<?php echo e(asset('assets/school-template/img/gurustap.webp')); ?>"
                        alt="Guru dan Staf">

                    <div class="hero-caption">

                        <div>

                            <h1>
                                Guru & Staf
                            </h1>

                            <p>
                                Tenaga pendidik dan kependidikan sekolah
                            </p>

                            <a href="#guru" class="btn btn-main mt-3">
                                Lihat Guru
                            </a>

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


    
    <section class="statistik-section">

        <div class="container">

            <div class="row g-4">

                
                <div class="col-6 col-lg-3">

                    <div class="statistik-card">

                        <div class="statistik-icon">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                        <h2>
                            <?php echo e($totalSiswa); ?>

                        </h2>

                        <p>
                            Total Siswa
                        </p>

                    </div>

                </div>


                
                <div class="col-6 col-lg-3">

                    <div class="statistik-card">

                        <div class="statistik-icon">
                            <i class="bi bi-person-workspace"></i>
                        </div>

                        <h2>
                            <?php echo e($totalGuru); ?>

                        </h2>

                        <p>
                            Total Guru
                        </p>

                    </div>

                </div>


                
                <div class="col-6 col-lg-3">

                    <div class="statistik-card">

                        <div class="statistik-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>

                        <h2>
                            <?php echo e($totalBerita); ?>

                        </h2>

                        <p>
                            Total Berita
                        </p>

                    </div>

                </div>


                
                <div class="col-6 col-lg-3">

                    <div class="statistik-card">

                        <div class="statistik-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>

                        <h2>
                            <?php echo e($totalEkstrakurikuler); ?>

                        </h2>

                        <p>
                            Ekstrakurikuler
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    
    <section id="profil" class="section">

        <div class="container">

            <div class="text-center">

                <h2 class="section-title">
                    Tentang Sekolah
                </h2>

                <p class="section-subtitle">
                    Mengenal lebih dekat
                    <?php echo e($profile->nama_sekolah ?? 'sekolah kami'); ?>

                </p>

            </div>


            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <?php if($profile?->foto): ?>

                        <img src="<?php echo e(asset('storage/' . $profile->foto)); ?>"
                            class="school-photo"
                            alt="<?php echo e($profile->nama_sekolah); ?>">

                    <?php else: ?>

                        <div class="empty-photo">

                            <i class="bi bi-building fs-1 text-secondary"></i>

                        </div>

                    <?php endif; ?>

                </div>


                <div class="col-lg-6">

                    <h3 class="fw-bold">
                        <?php echo e($profile->nama_sekolah ?? '-'); ?>

                    </h3>

                    <p class="text-muted lh-lg">
                        <?php echo e($profile->deskripsi ?? 'Informasi sekolah belum tersedia.'); ?>

                    </p>


                    <div class="row mt-3">

                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Kepala Sekolah
                                </div>

                                <div class="info-value">
                                    <?php echo e($profile->kepala_sekolah ?? '-'); ?>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    NPSN
                                </div>

                                <div class="info-value">
                                    <?php echo e($profile->npsn ?? '-'); ?>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Tahun Berdiri
                                </div>

                                <div class="info-value">
                                    <?php echo e($profile->tahun_berdiri ?? '-'); ?>

                                </div>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Kontak
                                </div>

                                <div class="info-value">
                                    <?php echo e($profile->kontak ?? '-'); ?>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="mt-4">

                        <div class="info-label">
                            Alamat
                        </div>

                        <div class="info-value">
                            <?php echo e($profile->alamat ?? '-'); ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    
    <section class="section section-light">

        <div class="container">

            <div class="text-center">

                <h2 class="section-title">
                    Visi & Misi
                </h2>

                <p class="section-subtitle">
                    Landasan dan tujuan sekolah
                </p>

            </div>


            <div class="card custom-card">

                <div class="card-body p-5 text-center">

                    <div class="icon-circle">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <p class="text-muted lh-lg mb-0">
                        <?php echo e($profile->visi_misi ?? 'Visi dan misi sekolah belum tersedia.'); ?>

                    </p>

                </div>

            </div>

        </div>

    </section>


    
    <section id="guru" class="section">

        <div class="container">

            <div class="text-center">

                <h2 class="section-title">
                    Guru & Staf
                </h2>

                <p class="section-subtitle">
                    Tenaga pendidik dan kependidikan
                </p>

            </div>


            <div id="guruCarousel" class="carousel slide">

                <div class="carousel-inner">

                    <?php $__currentLoopData = $guru->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">

                            <div class="row g-4">

                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-md-4 carousel-card">

                                        <div class="card custom-card">

                                            <?php if($item->foto): ?>

                                                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>"
                                                    alt="<?php echo e($item->nama_guru); ?>">

                                            <?php else: ?>

                                                <div class="empty-photo">

                                                    <i class="bi bi-person fs-1 text-secondary"></i>

                                                </div>

                                            <?php endif; ?>


                                            <div class="card-body text-center">

                                                <h5 class="fw-bold">
                                                    <?php echo e($item->nama_guru); ?>

                                                </h5>

                                                <p class="text-muted mb-1">
                                                    <?php echo e($item->mapel ?? '-'); ?>

                                                </p>

                                                <small class="text-secondary">
                                                    NIP: <?php echo e($item->nip ?? '-'); ?>

                                                </small>

                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <?php if($guru->count() > 3): ?>

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

                <?php endif; ?>

            </div>

        </div>

    </section>


    
    <section id="ekstrakurikuler" class="section section-light">

        <div class="container">

            <div class="text-center">

                <h2 class="section-title">
                    Ekstrakurikuler
                </h2>

                <p class="section-subtitle">
                    Mengembangkan bakat, minat, dan kreativitas siswa
                </p>

            </div>


            <div id="eskulCarousel" class="carousel slide">

                <div class="carousel-inner">

                    <?php $__currentLoopData = $ekstrakurikuler->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">

                            <div class="row g-4">

                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-md-4 carousel-card">

                                        <div class="card custom-card">

                                            <?php if($item->gambar): ?>

                                                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>"
                                                    alt="<?php echo e($item->nama_eskul); ?>">

                                            <?php else: ?>

                                                <div class="empty-photo">

                                                    <i class="bi bi-trophy fs-1 text-secondary"></i>

                                                </div>

                                            <?php endif; ?>


                                            <div class="card-body text-center">

                                                <h5 class="fw-bold">
                                                    <?php echo e($item->nama_eskul); ?>

                                                </h5>

                                                <p class="text-muted mb-2">
                                                    <?php echo e($item->jadwal_latihan ?? '-'); ?>

                                                </p>

                                                <p class="text-muted small mb-0">
                                                    <?php echo e($item->deskripsi ?? '-'); ?>

                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <?php if($ekstrakurikuler->count() > 3): ?>

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

                <?php endif; ?>

            </div>

        </div>

    </section>


    
    <section id="berita" class="section">

        <div class="container">

            <div class="text-center">

                <h2 class="section-title">
                    Berita Terbaru
                </h2>

                <p class="section-subtitle">
                    Informasi dan kegiatan terbaru sekolah
                </p>

            </div>


            <div id="beritaCarousel" class="carousel slide">

                <div class="carousel-inner">

                    <?php $__currentLoopData = $beritaTerbaru->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">

                            <div class="row g-4">

                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-md-4 carousel-card">

                                        <div class="card custom-card">

                                            <?php if($item->gambar): ?>

                                                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>"
                                                    alt="<?php echo e($item->judul); ?>">

                                            <?php else: ?>

                                                <div class="empty-photo">

                                                    <i class="bi bi-newspaper fs-1 text-secondary"></i>

                                                </div>

                                            <?php endif; ?>


                                            <div class="card-body">

                                                <small class="text-primary">
                                                    <?php echo e($item->tanggal); ?>

                                                </small>

                                                <h5 class="fw-bold mt-2">
                                                    <?php echo e($item->judul); ?>

                                                </h5>

                                                <p class="text-muted small mb-0">
                                                    <?php echo e(\Illuminate\Support\Str::limit(strip_tags($item->isi), 120)); ?>

                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <?php if($beritaTerbaru->count() > 3): ?>

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

                <?php endif; ?>

            </div>

        </div>

    </section>


    
    <section id="galeri" class="section section-light">

        <div class="container">

            <div class="text-center">

                <h2 class="section-title">
                    Galeri
                </h2>

                <p class="section-subtitle">
                    Dokumentasi kegiatan sekolah
                </p>

            </div>


            <div id="galeriCarousel" class="carousel slide">

                <div class="carousel-inner">

                    <?php $__currentLoopData = $galeri->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>">

                            <div class="row g-4">

                                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="col-md-4 carousel-card">

                                        <div class="card custom-card">

                                            <?php if($item->file): ?>

                                                <img src="<?php echo e(asset('storage/' . $item->file)); ?>"
                                                    alt="<?php echo e($item->judul); ?>">

                                            <?php else: ?>

                                                <div class="empty-photo">

                                                    <i class="bi bi-images fs-1 text-secondary"></i>

                                                </div>

                                            <?php endif; ?>


                                            <div class="card-body text-center">

                                                <h5 class="fw-bold">
                                                    <?php echo e($item->judul); ?>

                                                </h5>

                                                <p class="text-muted small mb-0">
                                                    <?php echo e($item->keterangan ?? '-'); ?>

                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <?php if($galeri->count() > 3): ?>

                    <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#galeriCarousel"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>


                    <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#galeriCarousel"
                        data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                <?php endif; ?>

            </div>

        </div>

    </section>


    
    <footer class="footer">

        <div class="container">

            <div class="row g-4">

                <div class="col-md-6">

                    <h5>
                        <?php echo e($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja'); ?>

                    </h5>

                    <p class="mt-3 lh-lg">
                        <?php echo e($profile->deskripsi ?? 'Website resmi profil sekolah.'); ?>

                    </p>

                </div>


                <div class="col-md-3">

                    <h6>
                        Menu
                    </h6>

                    <div class="mt-3">

                        <a href="#beranda"
                            class="d-block text-decoration-none mb-2">
                            Beranda
                        </a>

                        <a href="#profil"
                            class="d-block text-decoration-none mb-2">
                            Profil Sekolah
                        </a>

                        <a href="#guru"
                            class="d-block text-decoration-none mb-2">
                            Guru & Staf
                        </a>

                        <a href="#ekstrakurikuler"
                            class="d-block text-decoration-none mb-2">
                            Ekstrakurikuler
                        </a>

                        <a href="#berita"
                            class="d-block text-decoration-none mb-2">
                            Berita
                        </a>

                        <a href="#galeri"
                            class="d-block text-decoration-none">
                            Galeri
                        </a>

                    </div>

                </div>


                <div class="col-md-3">

                    <h6>
                        Kontak
                    </h6>

                    <p class="mt-3 mb-2">

                        <i class="bi bi-geo-alt me-2"></i>

                        <?php echo e($profile->alamat ?? '-'); ?>


                    </p>

                    <p>

                        <i class="bi bi-telephone me-2"></i>

                        <?php echo e($profile->kontak ?? '-'); ?>


                    </p>

                </div>

            </div>


            <div class="footer-bottom">

                <small>

                    © <?php echo e(date('Y')); ?>


                    <?php echo e($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja'); ?>


                </small>

            </div>

        </div>

    </footer>


    <script src="<?php echo e(asset('assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js')); ?>"></script>

</body>

</html><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/dashboard.blade.php ENDPATH**/ ?>