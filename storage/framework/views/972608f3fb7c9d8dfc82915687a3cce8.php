
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Ekstrakurikuler - <?php echo e($ekstrakurikuler->nama_eskul); ?></title>

    <link rel="icon" href="<?php echo e(asset('assets/images/satap.png')); ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #1e293b;
            background: #f8fafc;
        }

        a {
            text-decoration: none;
        }

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

        .detail-header {
            margin-top: 72px;
            min-height: 360px;
            display: flex;
            align-items: center;
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
            color: #fff;
        }

        .detail-header-content {
            max-width: 750px;
            padding: 35px 0;
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

        .detail-header h1 {
            margin-bottom: 16px;
            color: #fff;
            font-size: clamp(32px, 5vw, 48px);
            font-weight: 800;
            line-height: 1.2;
            overflow-wrap: anywhere;
        }

        .detail-header p {
            max-width: 650px;
            margin: 0;
            color: rgba(255, 255, 255, .88);
            font-size: 14px;
            line-height: 1.8;
        }

        .detail-section {
            padding: 75px 0;
            background: #f8fafc;
        }

        .detail-card {
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .08);
        }

        .detail-photo-wrapper {
            height: 100%;
            min-height: 430px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
        }

        .detail-photo {
            display: block;
            width: 100%;
            height: 390px;
            object-fit: contain;
            object-position: center;
            border-radius: 12px;
            background: #fff;
        }

        .detail-photo-empty {
            width: 100%;
            min-height: 390px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 90px;
        }

        .detail-content {
            height: 100%;
            padding: 40px;
        }

        .detail-label {
            margin-bottom: 8px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .detail-name {
            margin-bottom: 18px;
            color: #0f172a;
            font-size: 30px;
            font-weight: 800;
            line-height: 1.3;
            overflow-wrap: anywhere;
        }

        .detail-info {
            border-top: 1px solid #e2e8f0;
        }

        .detail-info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 18px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-info-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 19px;
        }

        .detail-info-text {
            min-width: 0;
        }

        .detail-info-text small {
            display: block;
            margin-bottom: 4px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .detail-info-text span {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .btn-primary-school,
        .btn-outline-school {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            transition: .3s;
        }

        .btn-primary-school {
            border: 1px solid #0f3d91;
            background: #0f3d91;
            color: #fff;
        }

        .btn-primary-school:hover {
            transform: translateY(-2px);
            border-color: #082c6b;
            background: #082c6b;
            color: #fff;
        }

        .btn-outline-school {
            border: 1px solid #cbd5e1;
            background: #fff;
            color: #334155;
        }

        .btn-outline-school:hover {
            border-color: #93c5fd;
            background: #eff6ff;
            color: #0f3d91;
        }

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

        @media (max-width: 991px) {
            .navbar-nav {
                padding-top: 15px;
            }

            .detail-header {
                min-height: 330px;
            }

            .detail-photo-wrapper {
                min-height: 350px;
            }

            .detail-photo {
                height: 310px;
            }

            .detail-photo-empty {
                min-height: 310px;
            }

            .detail-content {
                padding: 30px;
            }
        }

        @media (max-width: 767px) {
            .detail-header {
                min-height: 300px;
            }

            .detail-header h1 {
                font-size: 32px;
            }

            .detail-section {
                padding: 50px 0;
            }

            .detail-photo-wrapper {
                min-height: 300px;
            }

            .detail-photo {
                height: 280px;
            }

            .detail-photo-empty {
                min-height: 260px;
            }

            .detail-content {
                padding: 25px;
            }

            .detail-name {
                font-size: 25px;
            }
        }

        @media (max-width: 576px) {
            .navbar-custom {
                padding: 9px 0;
            }

            .navbar-brand img {
                width: 42px;
                height: 42px;
            }

            .school-name {
                max-width: 220px;
                font-size: 12px;
            }

            .detail-header {
                margin-top: 66px;
                min-height: 280px;
            }

            .detail-header h1 {
                font-size: 28px;
            }

            .detail-header p {
                font-size: 12px;
            }

            .badge-header {
                padding: 7px 13px;
                font-size: 10px;
            }

            .detail-section {
                padding: 40px 0;
            }

            .detail-content {
                padding: 22px;
            }

            .detail-info-item {
                gap: 12px;
            }

            .btn-primary-school,
            .btn-outline-school {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">

            <a class="navbar-brand" href="<?php echo e(route('public.dashboard')); ?>">
                <?php if($profile?->logo): ?>
                    <img src="<?php echo e(asset('storage/' . $profile->logo)); ?>" alt="Logo Sekolah">
                <?php else: ?>
                    <img src="<?php echo e(asset('assets/images/satap.png')); ?>" alt="Logo Sekolah">
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
                aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.dashboard')); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.profil')); ?>">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.guru')); ?>">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo e(route('public.ekstrakurikuler')); ?>">Ekstrakurikuler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.berita')); ?>">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('public.galeri')); ?>">Galeri</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <main>

        
        <section class="detail-header">
            <div class="container">
                <div class="detail-header-content">

                    <div class="badge-header">
                        <i class="bi bi-people-fill me-2"></i>
                        KEGIATAN EKSTRAKURIKULER
                    </div>

                    <h1><?php echo e($ekstrakurikuler->nama_eskul); ?></h1>

                    <p>
                        Kenali kegiatan, jadwal latihan, dan pembina ekstrakurikuler
                        <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>.
                    </p>

                </div>
            </div>
        </section>

        
        <section class="detail-section">
            <div class="container">

                <div class="mb-4">
                    <a href="<?php echo e(route('public.ekstrakurikuler')); ?>" class="btn-outline-school">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali ke Daftar Ekstrakurikuler
                    </a>
                </div>

                <article class="detail-card">
                    <div class="row g-0">

                        
                        <div class="col-lg-5">
                            <div class="detail-photo-wrapper">

                                <?php if($ekstrakurikuler->gambar): ?>
                                    <img
                                        src="<?php echo e(\Illuminate\Support\Facades\Storage::url($ekstrakurikuler->gambar)); ?>"
                                        class="detail-photo"
                                        alt="<?php echo e($ekstrakurikuler->nama_eskul); ?>">
                                <?php else: ?>
                                    <div class="detail-photo-empty">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        
                        <div class="col-lg-7">
                            <div class="detail-content">

                                <div class="detail-label">Informasi Ekstrakurikuler</div>

                                <h2 class="detail-name">
                                    <?php echo e($ekstrakurikuler->nama_eskul); ?>

                                </h2>

                                <div class="detail-info">

                                    <div class="detail-info-item">
                                        <div class="detail-info-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                        <div class="detail-info-text">
                                            <small>Pembina</small>
                                            <span><?php echo e($ekstrakurikuler->pembina ?: '-'); ?></span>
                                        </div>
                                    </div>

                                    <div class="detail-info-item">
                                        <div class="detail-info-icon">
                                            <i class="bi bi-calendar-week"></i>
                                        </div>
                                        <div class="detail-info-text">
                                            <small>Jadwal Latihan</small>
                                            <span><?php echo e($ekstrakurikuler->jadwal_latihan ?: '-'); ?></span>
                                        </div>
                                    </div>

                                    <div class="detail-info-item">
                                        <div class="detail-info-icon">
                                            <i class="bi bi-card-text"></i>
                                        </div>
                                        <div class="detail-info-text">
                                            <small>Deskripsi Kegiatan</small>
                                            <span><?php echo e($ekstrakurikuler->deskripsi ?: 'Deskripsi kegiatan belum tersedia.'); ?></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-4 d-flex gap-2 flex-wrap">
                                    <a href="<?php echo e(route('public.ekstrakurikuler')); ?>" class="btn-primary-school">
                                        <i class="bi bi-people-fill me-1"></i>
                                        Lihat Semua Ekstrakurikuler
                                    </a>

                                    <a href="<?php echo e(route('public.dashboard')); ?>#ekstrakurikuler" class="btn-outline-school">
                                        <i class="bi bi-house me-1"></i>
                                        Kembali ke Beranda
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </article>

            </div>
        </section>

    </main>

    
    <footer>
        <div class="container">

            <div class="row g-5">

                <div class="col-lg-5">
                    <div class="footer-title">
                        <?php echo e($profile?->nama_sekolah ?? 'SMPN Satu Atap 1 Mangunreja'); ?>

                    </div>

                    <p class="footer-text">
                        <?php echo e($profile?->deskripsi ?? 'Sekolah yang berkomitmen memberikan pendidikan berkualitas bagi generasi bangsa.'); ?>

                    </p>
                </div>

                <div class="col-lg-3">
                    <div class="footer-title">Navigasi</div>
                    <ul class="footer-links">
                        <li><a href="<?php echo e(route('public.dashboard')); ?>">Beranda</a></li>
                        <li><a href="<?php echo e(route('public.profil')); ?>">Profil</a></li>
                        <li><a href="<?php echo e(route('public.guru')); ?>">Guru</a></li>
                        <li><a href="<?php echo e(route('public.ekstrakurikuler')); ?>">Ekstrakurikuler</a></li>
                        <li><a href="<?php echo e(route('public.berita')); ?>">Berita</a></li>
                        <li><a href="<?php echo e(route('public.galeri')); ?>">Galeri</a></li>
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

</body>
</html>
<?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/ekstrakurikuler-detail.blade.php ENDPATH**/ ?>