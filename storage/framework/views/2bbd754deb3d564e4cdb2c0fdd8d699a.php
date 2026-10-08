<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Galeri -
        <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

    </title>

    <link rel="icon"
        href="<?php echo e(asset('assets/images/satap.png')); ?>">

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

        .school-name {
            color: #0f3d91;
            font-size: 14px;
            font-weight: 800;
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
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #0f3d91;
            background: #eff6ff;
        }


        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
             margin-top: 72px;
            min-height: 360px;

            display: flex;
            align-items: center;

            position: relative;

            background: linear-gradient(
                135deg,
                #0f3d91,
                #082c6b
            );
            color: #fff;
        }

        .page-header .small-title {
            margin-bottom: 10px;
            color: #bfdbfe;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .page-header h1 {
            margin-bottom: 14px;
            font-size: 40px;
            font-weight: 800;
        }

        .page-header p {
            max-width: 700px;
            margin: auto;
            color: rgba(255, 255, 255, .85);
            font-size: 14px;
            line-height: 1.8;
        }


        /* =========================
           GALERI SECTION
        ========================= */

        .gallery-section {
            padding: 85px 0;
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
           GALLERY CARD
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
            transition: .3s;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .12);
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
            padding: 65px 20px 20px;
            color: #fff;
            background: linear-gradient(
                transparent,
                rgba(0, 0, 0, .88)
            );
        }

        .gallery-overlay h5 {
            margin-bottom: 6px;
            color: #fff;
            font-size: 16px;
            font-weight: 800;
        }

        .gallery-overlay p {
            margin: 0;
            color: rgba(255, 255, 255, .85);
            font-size: 11px;
            line-height: 1.6;
        }

        .gallery-date {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 7px;
            color: #dbeafe;
            font-size: 10px;
            font-weight: 700;
        }


        /* =========================
           EMPTY DATA
        ========================= */

        .empty-gallery {
            padding: 70px 20px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #fff;
            text-align: center;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
        }

        .empty-gallery i {
            color: #94a3b8;
            font-size: 55px;
        }

        .empty-gallery p {
            margin-top: 15px;
            color: #64748b;
            font-size: 14px;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-primary-school {
            padding: 12px 22px;
            border: 1px solid #0f3d91;
            border-radius: 8px;
            background: #0f3d91 !important;
            color: #fff !important;
            font-size: 12px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary-school:hover {
            border-color: #082c6b;
            background: #082c6b !important;
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
                padding: 70px 0;
            }

        }

        @media (max-width: 767px) {

            .page-header h1 {
                font-size: 30px;
            }

            .gallery-section {
                padding: 65px 0;
            }

            .gallery-card {
                height: 250px;
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

                        <?php echo e($profile?->nama_sekolah
                            ?? 'SMPN Satu Atap 1 Mangunreja'); ?>


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
                        <a class="nav-link"
                            href="<?php echo e(route('public.berita')); ?>">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active"
                            href="<?php echo e(route('public.galeri')); ?>">
                            Galeri
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    

    <section class="page-header text-center">

        <div class="container">

            <div class="small-title">
                Dokumentasi Sekolah
            </div>

            <h1>
                Galeri Sekolah
            </h1>

            <p>
                Lihat berbagai dokumentasi kegiatan dan
                momen yang berlangsung di lingkungan sekolah.
            </p>

        </div>

    </section>


    

    <section class="gallery-section">

        <div class="container">

            <div class="section-title">

                <div class="small-title">
                    Galeri
                </div>

                <h2>
                    Dokumentasi Kegiatan Sekolah
                </h2>

                <p>
                    Kumpulan foto dan dokumentasi kegiatan
                    <?php echo e($profile?->nama_sekolah
                        ?? 'SMPN Satu Atap 1 Mangunreja'); ?>.
                </p>

            </div>


            <div class="row g-4">

                <?php if($galeri->isEmpty()): ?>

                    <div class="col-12">

                        <div class="empty-gallery">

                            <i class="bi bi-images"></i>

                            <p>
                                Belum ada dokumentasi galeri.
                            </p>

                        </div>

                    </div>

                <?php else: ?>

                    <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-6 col-lg-4">

                            <div class="gallery-card">

                                <?php if($item->file): ?>

                                    <img src="<?php echo e(asset('storage/' . $item->file)); ?>"
                                        class="gallery-image"
                                        alt="<?php echo e($item->judul); ?>"
                                        loading="lazy">

                                <?php else: ?>

                                    <img src="<?php echo e(asset('assets/school-template/img/acara.webp')); ?>"
                                        class="gallery-image"
                                        alt="<?php echo e($item->judul); ?>">

                                <?php endif; ?>


                                <div class="gallery-overlay">

                                    <?php if($item->tanggal): ?>

                                        <div class="gallery-date">

                                            <i class="bi bi-calendar3"></i>

                                            <?php echo e(\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')); ?>


                                        </div>

                                    <?php endif; ?>


                                    <h5>
                                        <?php echo e($item->judul); ?>

                                    </h5>


                                    <?php if($item->keterangan): ?>

                                        <p>
                                            <?php echo e($item->keterangan); ?>

                                        </p>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

            </div>


            

            <div class="text-center mt-5">

                <a href="<?php echo e(route('public.dashboard')); ?>"
                    class="btn btn-primary-school">

                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Beranda

                </a>

            </div>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/galeri.blade.php ENDPATH**/ ?>