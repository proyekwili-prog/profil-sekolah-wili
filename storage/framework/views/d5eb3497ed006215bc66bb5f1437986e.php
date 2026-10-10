<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Berita - <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

    </title>

     <?php if($profile?->logo): ?>
        <link rel="icon" href="<?php echo e(asset('storage/' . $profile->logo)); ?>">
    <?php endif; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

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
            position: relative;
            min-height: 360px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(
                    90deg,
                    rgba(5, 25, 70, .88) 0%,
                    rgba(5, 25, 70, .65) 40%,
                    rgba(5, 25, 70, .25) 100%
                ),
                url("<?php echo e(asset('assets/school-template/img/background.jpg')); ?>")
                center/cover;
        }

        .page-header-content {
            max-width: 750px;
        }

        .page-header-badge {
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

        .page-header h1 {
            margin-bottom: 15px;
            color: #fff;
            font-size: clamp(32px, 5vw, 52px);
            font-weight: 800;
            line-height: 1.15;
        }

        .page-header h1 span {
            color: #60a5fa;
        }

        .page-header p {
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
           NEWS CARD
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
            transition: transform .4s ease;
        }

        .school-card:hover .school-card-image {
            transform: scale(1.04);
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

        .news-description {
            min-height: 45px;
            margin-top: 10px !important;
        }

        /* =========================
           EMPTY DATA
        ========================= */

        .empty-news {
            padding: 70px 20px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #fff;
            text-align: center;
        }

        .empty-news i {
            color: #94a3b8;
            font-size: 55px;
        }

        .empty-news p {
            margin-top: 15px;
            color: #64748b;
            font-size: 13px;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn-primary {
            background: #0f3d91 !important;
            border-color: #0f3d91 !important;
            color: #fff !important;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary:hover {
            background: #082c6b !important;
            border-color: #082c6b !important;
            color: #fff !important;
            transform: translateY(-2px);
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

            .section {
                padding: 65px 0;
            }
        }

        @media (max-width: 767px) {

            .page-header {
                min-height: 320px;
            }

            .page-header h1 {
                font-size: 32px;
            }

            .page-header p {
                font-size: 13px;
            }

            .school-card-image {
                height: 210px;
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

            .page-header h1 {
                font-size: 29px;
            }

            .section-title h2 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

    

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container">

            <a class="navbar-brand"
                href="<?php echo e(route('public.dashboard')); ?>">

                <?php if($profile?->logo): ?>

                    <img src="<?php echo e(asset('storage/' . $profile->logo)); ?>"
                        alt="Logo Sekolah">

                <?php else: ?>

                    <img src="<?php echo e(asset('assets/images/satap.png')); ?>"
                        alt="Logo Sekolah">

                <?php endif; ?>

                <div class="brand-text">

                    <div class="school-name">
                        <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

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
                            href="<?php echo e(route('public.dashboard')); ?>">

                            Beranda

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="<?php echo e(route('public.profil')); ?>">

                            Profil

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="<?php echo e(route('public.guru')); ?>">

                            Guru

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="<?php echo e(route('public.ekstrakurikuler')); ?>">

                            Ekstrakurikuler

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link active"
                            href="<?php echo e(route('public.berita')); ?>">

                            Berita

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="<?php echo e(route('public.galeri')); ?>">

                            Galeri

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>


    

    <section class="page-header">

        <div class="container">

            <div class="page-header-content">

                <div class="page-header-badge">

                    <i class="bi bi-newspaper me-1"></i>

                    INFORMASI SEKOLAH

                </div>

                <h1>
                    Berita Sekolah
                </h1>

                <p>
                    Informasi dan kegiatan terbaru dari
                    <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>.
                </p>

            </div>

        </div>

    </section>


    

    <section class="section section-light">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Informasi Sekolah
                </div>

                <h2>
                    Berita Terbaru
                </h2>

                <p>
                    Informasi terbaru seputar kegiatan,
                    prestasi, dan perkembangan sekolah.
                </p>

            </div>


            <?php if($beritaTerbaru->isEmpty()): ?>

                <div class="empty-news">

                    <i class="bi bi-newspaper"></i>

                    <p>
                        Belum ada berita sekolah.
                    </p>

                </div>

            <?php else: ?>

                <div class="row g-4">

                    <?php $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-6 col-lg-4">

                            <div class="school-card">

                                

                                <?php if($berita->gambar): ?>

                                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($berita->gambar)); ?>"
                                        class="school-card-image"
                                        alt="<?php echo e($berita->judul); ?>"
                                        loading="lazy">

                                <?php else: ?>

                                    <img src="<?php echo e(asset('assets/school-template/img/acara.webp')); ?>"
                                        class="school-card-image"
                                        alt="<?php echo e($berita->judul); ?>">

                                <?php endif; ?>


                                

                                <div class="school-card-body">

                                    <div class="news-date">

                                        <i class="bi bi-calendar3 me-1"></i>

                                        <?php echo e($berita->tanggal
                                            ? \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y')
                                            : '-'); ?>


                                    </div>

                                    <div class="news-title">

                                        <?php echo e($berita->judul); ?>


                                    </div>
<p class="news-description">
    <?php echo e(\Illuminate\Support\Str::limit(
        strip_tags($berita->isi ?? ''),
        120
    )); ?>

</p>


<div class="mt-3">
    <a href="<?php echo e(route('public.berita.detail', [
        'id' => \Illuminate\Support\Facades\Crypt::encryptString((string) $berita->id_berita)
    ])); ?>"
       class="btn btn-primary btn-sm">
        <i class="bi bi-book-half me-1"></i>
        Baca Selengkapnya
    </a>
</div>



                                </div>

                            </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            <?php endif; ?>

        </div>

    </section>


    

    <footer>

        <div class="container">

            <div class="row g-5">

                

                <div class="col-lg-5">

                    <div class="footer-title">

                        <?php echo e($profile?->nama_sekolah
                            ?? 'SMPN Satu Atap 1 Mangunreja'); ?>


                    </div>

                    <p class="footer-text">

                        <?php echo e($profile?->deskripsi
                            ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.'); ?>


                    </p>

                </div>


                

                <div class="col-lg-3">

                    <div class="footer-title">
                        Navigasi
                    </div>

                    <ul class="footer-links">

                        <li>
                            <a href="<?php echo e(route('public.dashboard')); ?>">
                                Beranda
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('public.profil')); ?>">
                                Profil
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('public.guru')); ?>">
                                Guru
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('public.ekstrakurikuler')); ?>">
                                Ekstrakurikuler
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('public.berita')); ?>">
                                Berita
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('public.galeri')); ?>">
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

                        <?php echo e($profile?->alamat ?? '-'); ?>


                    </p>

                    <p class="footer-text mb-2">

                        <i class="bi bi-telephone me-2"></i>

                        <?php echo e($profile?->kontak ?? '-'); ?>


                    </p>

                    <p class="footer-text">

                        <i class="bi bi-building me-2"></i>

                        NPSN: <?php echo e($profile?->npsn ?? '-'); ?>


                    </p>

                </div>

            </div>


            <div class="footer-bottom text-center">

                &copy; <?php echo e(date('Y')); ?>


                <?php echo e($profile?->nama_sekolah
                    ?? 'SMPN Satu Atap 1 Mangunreja'); ?>.

                Semua Hak Dilindungi.

            </div>

        </div>

    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>

 <?php if($profile?->logo): ?>
        <link rel="icon" href="<?php echo e(asset('storage/' . $profile->logo)); ?>">
    <?php endif; ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/berita.blade.php ENDPATH**/ ?>