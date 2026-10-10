
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if($profile?->logo): ?>
        <link rel="icon" href="<?php echo e(asset('storage/' . $profile->logo)); ?>">
    <?php endif; ?>

    <title>
        Profil Sekolah - <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

    </title>

    
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

        .navbar-toggler {
            border-color: #e2e8f0;
            box-shadow: none !important;
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
            background:
                linear-gradient(
                    90deg,
                    rgba(5, 25, 70, .88) 0%,
                    rgba(5, 25, 70, .65) 45%,
                    rgba(5, 25, 70, .35) 100%
                ),
                url('<?php echo e(asset('assets/school-template/img/background.jpg')); ?>');
            background-size: cover;
            background-position: center;
        }

        .page-header-content {
            color: #fff;
        }

        .badge-header {
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
            margin-bottom: 0;
            color: rgba(255, 255, 255, .88);
            font-size: 14px;
            line-height: 1.8;
        }

        /* =========================
           GENERAL SECTION
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
            line-height: 1.35;
        }

        .section-title p {
            max-width: 700px;
            margin: auto;
            color: #64748b;
            font-size: 14px;
            line-height: 1.8;
        }

        /* =========================
           PROFIL SEKOLAH
        ========================= */

        .profile-section {
            padding: 85px 0;
            background: #fff;
        }

        .profile-image-wrapper {
            width: 100%;
            height: 380px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #f8fafc;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .06);
        }

        .profile-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform .4s ease;
        }

        .profile-image-wrapper:hover .profile-image {
            transform: scale(1.02);
        }

        .profile-image-empty {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            color: #94a3b8;
        }

        .profile-content {
            padding: 10px 0;
        }

        .profile-label {
            display: inline-block;
            margin-bottom: 12px;
            color: #2563eb;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .profile-content h3 {
            margin-bottom: 18px;
            color: #0f2f67;
            font-size: 27px;
            font-weight: 800;
            line-height: 1.4;
        }

        .profile-description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.9;
            white-space: pre-line;
        }

        .btn-primary-school {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 20px;
            border: 1px solid #0f3d91;
            border-radius: 8px;
            background: #0f3d91;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary-school:hover {
            transform: translateY(-2px);
            border-color: #082c6b;
            background: #082c6b;
            color: #fff;
        }

        /* =========================
           DETAIL INFORMASI
        ========================= */

        .info-card {
            height: 100%;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #fff;
            transition: .3s;
        }

        .info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .08);
        }

        .info-card-body {
            height: 100%;
            padding: 25px;
        }

        .info-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #eff6ff;
            color: #0f3d91;
            font-size: 22px;
        }

        .info-card h6 {
            margin-top: 18px;
            margin-bottom: 9px;
            color: #0f172a;
            font-size: 15px;
            font-weight: 800;
        }

        .info-card p {
            margin-bottom: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        /* =========================
           VISI DAN MISI
        ========================= */

        .vision-section {
            padding: 85px 0;
            background: #fff;
        }

        .vision-card {
            height: 100%;
            padding: 40px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
            transition: .3s;
        }

        .vision-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, .08);
        }

        .vision-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 65px;
            height: 65px;
            margin: 0 auto;
            border-radius: 50%;
            background: #eff6ff;
            color: #0f3d91;
            font-size: 28px;
        }

        .vision-text {
            margin-bottom: 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.9;
            white-space: pre-line;
        }

        /* =========================
           BACK BUTTON
        ========================= */

        .back-button-wrapper {
            margin-top: 40px;
            text-align: center;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
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
            transform: translateY(-2px);
            background: #0f3d91;
            color: #fff;
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
            color: #fff;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.5;
        }

        .footer-text {
            color: #cbd5e1;
            font-size: 12px;
            line-height: 1.9;
            overflow-wrap: anywhere;
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
            padding-left: 3px;
        }

        .footer-bottom {
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, .1);
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.8;
        }

        /* =========================
           SCROLL ANIMATION
        ========================= */

        .scroll-reveal {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity .55s ease, transform .55s ease;
        }

        .scroll-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {
            .navbar-nav {
                padding-top: 15px;
                padding-bottom: 10px;
            }

            .page-header {
                min-height: 330px;
            }

            .profile-content h3 {
                font-size: 24px;
            }
        }

        @media (max-width: 767px) {
            .page-header {
                min-height: 300px;
            }

            .page-header-content h1 {
                font-size: 32px;
            }

            .section,
            .profile-section,
            .vision-section {
                padding: 65px 0;
            }

            .section-title h2 {
                font-size: 25px;
            }

            .profile-image-wrapper {
                height: 300px;
            }

            .profile-content h3 {
                font-size: 23px;
            }

            .vision-card {
                padding: 28px 22px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand img {
                width: 42px;
                height: 42px;
            }

            .brand-text .school-name {
                max-width: 200px;
                font-size: 12px;
                line-height: 1.4;
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

            .profile-image-wrapper {
                height: 250px;
            }

            .info-card-body {
                padding: 22px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition-duration: .01ms !important;
            }

            .scroll-reveal {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body>

    

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">

            <a class="navbar-brand" href="<?php echo e(route('public.dashboard')); ?>">

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

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.dashboard')); ?>">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('public.profil')); ?>">
                            Profil
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.guru')); ?>">
                            Guru
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.ekstrakurikuler')); ?>">
                            Ekstrakurikuler
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.berita')); ?>">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.galeri')); ?>">
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

                <div class="badge-header">
                    <i class="bi bi-building me-2"></i>
                    PROFIL SEKOLAH
                </div>

                <h1>Profil Sekolah</h1>

                <p>
                    <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

                </p>

            </div>
        </div>
    </section>

    

    <section class="profile-section">
        <div class="container">

            <div class="section-title">
                <div class="small-title">Tentang Sekolah</div>

                <h2>
                    <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

                </h2>

                <p>
                    Mengenal lebih dekat profil dan informasi sekolah kami.
                </p>
            </div>

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <?php if($profile?->foto): ?>
                        <div class="profile-image-wrapper">
                            <img src="<?php echo e(asset('storage/' . $profile->foto)); ?>"
                                class="profile-image"
                                alt="<?php echo e($profile?->nama_sekolah ?? 'Foto Sekolah'); ?>">
                        </div>
                    <?php else: ?>
                        <div class="profile-image-wrapper">
                            <div class="profile-image-empty">
                                <i class="bi bi-building" style="font-size: 80px;"></i>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="col-lg-6">
                    <div class="profile-content">

                        <div class="profile-label">Sambutan Profil</div>

                        <h3>
                            <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

                        </h3>

                        <p class="profile-description">
                            <?php echo e($profile?->deskripsi ?? 'Informasi sekolah belum tersedia.'); ?>

                        </p>

                        <a href="<?php echo e(route('public.dashboard')); ?>"
                            class="btn-primary-school mt-4">

                            <i class="bi bi-arrow-left"></i>
                            Kembali ke Beranda

                        </a>

                    </div>
                </div>

            </div>

        </div>
    </section>

    

    <section id="detail-profil" class="section section-light">
        <div class="container">

            <div class="section-title">
                <div class="small-title">Informasi Sekolah</div>

                <h2>Detail Profil Sekolah</h2>

                <p>
                    Informasi umum mengenai identitas dan kontak sekolah.
                </p>
            </div>

            <div class="row g-4">

                
                <div class="col-md-6 col-lg-4">
                    <div class="info-card">
                        <div class="info-card-body">

                            <div class="info-icon">
                                <i class="bi bi-person-badge"></i>
                            </div>

                            <h6>Kepala Sekolah</h6>

                            <p><?php echo e($profile?->kepala_sekolah ?? '-'); ?></p>

                        </div>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-4">
                    <div class="info-card">
                        <div class="info-card-body">

                            <div class="info-icon">
                                <i class="bi bi-card-text"></i>
                            </div>

                            <h6>NPSN</h6>

                            <p><?php echo e($profile?->npsn ?? '-'); ?></p>

                        </div>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-4">
                    <div class="info-card">
                        <div class="info-card-body">

                            <div class="info-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>

                            <h6>Tahun Berdiri</h6>

                            <p><?php echo e($profile?->tahun_berdiri ?? '-'); ?></p>

                        </div>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-6">
                    <div class="info-card">
                        <div class="info-card-body">

                            <div class="info-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>

                            <h6>Alamat Sekolah</h6>

                            <p><?php echo e($profile?->alamat ?? '-'); ?></p>

                        </div>
                    </div>
                </div>

                
                <div class="col-md-6 col-lg-6">
                    <div class="info-card">
                        <div class="info-card-body">

                            <div class="info-icon">
                                <i class="bi bi-telephone"></i>
                            </div>

                            <h6>Kontak Sekolah</h6>

                            <p><?php echo e($profile?->kontak ?? '-'); ?></p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    

    <section class="vision-section">
        <div class="container">
            <div class="vision-card text-center">
                <div class="vision-icon">
                    <i class="bi bi-bullseye"></i>
                </div>
                <h4 class="fw-bold mt-4 mb-3" style="color:#0f2f67;">
                    Visi dan Misi Sekolah
                </h4>
                <p class="vision-text">
                    <?php echo e($profile?->visi_misi ?? 'Visi dan misi sekolah belum tersedia.'); ?>

                </p>
            </div>
            <div class="back-button-wrapper">
                <a href="<?php echo e(route('public.dashboard')); ?>" class="back-button">
                    <i class="bi bi-arrow-left"></i>
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
                        <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

                    </div>
                    <p class="footer-text">
                        <?php echo e($profile?->deskripsi
                            ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.'); ?>

                    </p>
                </div>
                
                <div class="col-lg-3">
                    <div class="footer-title">Navigasi</div>
                    <ul class="footer-links">
                        <li>
                            <a href="<?php echo e(route('public.dashboard')); ?>">Beranda</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('public.profil')); ?>">Profil</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('public.guru')); ?>">Guru</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('public.ekstrakurikuler')); ?>">Ekstrakurikuler</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('public.berita')); ?>">Berita</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('public.galeri')); ?>">Galeri</a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-4">
                    <div class="footer-title">Kontak Sekolah</div>
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

                <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>.
                Semua Hak Dilindungi.
            </div>
        </div>
    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const revealElements = document.querySelectorAll(
                '.section-title, .profile-image-wrapper, .profile-content, .info-card, .vision-card'
            );

            if (!('IntersectionObserver' in window)) {
                revealElements.forEach(function (element) {
                    element.classList.add('is-visible');
                });
                return;
            }

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12
            });

            revealElements.forEach(function (element) {
                element.classList.add('scroll-reveal');
                observer.observe(element);
            });
        });
    </script>

</body>
</html><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/profil.blade.php ENDPATH**/ ?>