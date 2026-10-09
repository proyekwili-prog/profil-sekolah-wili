<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-0">

    <!-- =========================================
         HEADER
    ========================================== -->

    <div class="dashboard-header mb-4">

        <div class="d-flex align-items-center gap-3">

            <div class="dashboard-title-icon">
                <i class="bi bi-grid-1x2-fill"></i>
            </div>

            <div>
                <h3 class="fw-bold mb-1">
                    Dashboard
                </h3>

                <p class="text-muted mb-0">
                    Ringkasan data administrasi sekolah.
                </p>
            </div>

        </div>

    </div>


    <!-- =========================================
         STATISTIK
    ========================================== -->

    <div class="row g-4 mb-4">

        <!-- SISWA -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-stat-card h-100">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <div class="stat-label">
                            TOTAL SISWA
                        </div>

                        <div class="stat-number">
                            <?php echo e($totalSiswa); ?>

                        </div>

                        <div class="stat-description">
                            Data siswa terdaftar
                        </div>

                    </div>

                    <div class="stat-icon stat-blue">
                        <i class="bi bi-people-fill"></i>
                    </div>

                </div>

            </div>

        </div>


        <!-- GURU -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-stat-card h-100">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <div class="stat-label">
                            TOTAL GURU
                        </div>

                        <div class="stat-number">
                            <?php echo e($totalGuru); ?>

                        </div>

                        <div class="stat-description">
                            Data guru sekolah
                        </div>

                    </div>

                    <div class="stat-icon stat-green">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>

                </div>

            </div>

        </div>


        <!-- BERITA -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-stat-card h-100">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <div class="stat-label">
                            TOTAL BERITA
                        </div>

                        <div class="stat-number">
                            <?php echo e($totalBerita); ?>

                        </div>

                        <div class="stat-description">
                            Informasi sekolah
                        </div>

                    </div>

                    <div class="stat-icon stat-orange">
                        <i class="bi bi-newspaper"></i>
                    </div>

                </div>

            </div>

        </div>


        <!-- EKSTRAKURIKULER -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-stat-card h-100">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <div class="stat-label">
                            EKSTRAKURIKULER
                        </div>

                        <div class="stat-number">
                            <?php echo e($totalEkstrakurikuler); ?>

                        </div>

                        <div class="stat-description">
                            Kegiatan sekolah
                        </div>

                    </div>

                    <div class="stat-icon stat-purple">
                        <i class="bi bi-trophy-fill"></i>
                    </div>

                </div>

            </div>

        </div>


        <!-- GALERI -->
        <div class="col-xl-3 col-md-6">

            <div class="dashboard-stat-card h-100">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <div class="stat-label">
                            TOTAL GALERI
                        </div>

                        <div class="stat-number">
                            <?php echo e($totalGaleri); ?>

                        </div>

                        <div class="stat-description">
                            Dokumentasi sekolah
                        </div>

                    </div>

                    <div class="stat-icon stat-pink">
                        <i class="bi bi-images"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================================
         BERITA TERBARU
    ========================================== -->

    <div class="dashboard-card mb-4">

        <div class="dashboard-card-header">

            <div class="d-flex align-items-center gap-3">

                <div class="section-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Berita Terbaru
                    </h5>

                    <small class="text-muted">
                        Informasi terbaru sekolah.
                    </small>

                </div>

            </div>

            <a href="<?php echo e(route('admin.berita.index')); ?>"
               class="btn btn-outline-primary btn-sm px-3">

                <i class="bi bi-arrow-right me-1"></i>
                Lihat Semua

            </a>

        </div>


        <div class="dashboard-card-body">

            <?php $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="news-item">

                    <!-- Gambar -->
                    <div class="news-image-wrapper">

                        <?php if($berita->gambar): ?>

                            <img
                                src="<?php echo e(asset('storage/'.$berita->gambar)); ?>"
                                alt="<?php echo e($berita->judul); ?>"
                                class="news-image">

                        <?php else: ?>

                            <div class="news-placeholder">

                                <i class="bi bi-newspaper"></i>

                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- Isi -->
                    <div class="news-content">

                        <h6 class="news-title">
                            <?php echo e($berita->judul); ?>

                        </h6>

                        <div class="news-date">

                            <i class="bi bi-calendar3 me-1"></i>

                            <?php echo e(\Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y')); ?>


                        </div>

                        <p class="news-description mb-0">

                            <?php echo e(\Illuminate\Support\Str::limit(strip_tags($berita->isi), 120)); ?>


                        </p>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <?php if($beritaTerbaru->count() === 0): ?>

                <div class="empty-state">

                    <div class="empty-state-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>

                    <h6 class="fw-semibold mb-1">
                        Belum ada berita
                    </h6>

                    <small class="text-muted">
                        Belum terdapat berita yang tersedia.
                    </small>

                </div>

            <?php endif; ?>

        </div>

    </div>


    <!-- =========================================
         EKSTRAKURIKULER + GALERI
    ========================================== -->

    <div class="row g-4 mb-4">

        <!-- EKSTRAKURIKULER -->
        <div class="col-xl-6">

            <div class="dashboard-card h-100">

                <div class="dashboard-card-header">

                    <div class="d-flex align-items-center gap-3">

                        <div class="section-icon section-icon-purple">
                            <i class="bi bi-trophy-fill"></i>
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Ekstrakurikuler
                            </h5>

                            <small class="text-muted">
                                Kegiatan ekstrakurikuler sekolah.
                            </small>

                        </div>

                    </div>

                    <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>"
                       class="btn btn-outline-primary btn-sm">

                        Lihat Semua

                    </a>

                </div>


                <div class="dashboard-card-body">

                    <?php $__currentLoopData = $ekstrakurikulerTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ekstrakurikuler): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="eskul-item">

                            <div class="eskul-image-wrapper">

                                <?php if($ekstrakurikuler->gambar): ?>

                                    <img
                                        src="<?php echo e(\Illuminate\Support\Facades\Storage::url($ekstrakurikuler->gambar)); ?>"
                                        alt="<?php echo e($ekstrakurikuler->nama_eskul); ?>"
                                        class="eskul-image">

                                <?php else: ?>

                                    <div class="eskul-placeholder">

                                        <i class="bi bi-trophy"></i>

                                    </div>

                                <?php endif; ?>

                            </div>


                            <div class="eskul-content">

                                <h6 class="fw-semibold mb-1">
                                    <?php echo e($ekstrakurikuler->nama_eskul); ?>

                                </h6>

                                <div class="small text-muted mb-1">

                                    <i class="bi bi-person me-1"></i>

                                    <?php echo e($ekstrakurikuler->pembina); ?>


                                </div>

                                <div class="small text-muted">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    <?php echo e($ekstrakurikuler->jadwal_latihan); ?>


                                </div>

                            </div>

                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <?php if($ekstrakurikulerTerbaru->count() === 0): ?>

                        <div class="empty-state">

                            <div class="empty-state-icon">
                                <i class="bi bi-trophy"></i>
                            </div>

                            <h6 class="fw-semibold mb-1">
                                Belum ada ekstrakurikuler
                            </h6>

                            <small class="text-muted">
                                Data ekstrakurikuler belum tersedia.
                            </small>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>


        <!-- GALERI -->
        <div class="col-xl-6">

            <div class="dashboard-card h-100">

                <div class="dashboard-card-header">

                    <div class="d-flex align-items-center gap-3">

                        <div class="section-icon section-icon-pink">
                            <i class="bi bi-images"></i>
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Galeri Terbaru
                            </h5>

                            <small class="text-muted">
                                Dokumentasi kegiatan sekolah.
                            </small>

                        </div>

                    </div>

                    <a href="<?php echo e(route('admin.galeri.index')); ?>"
                       class="btn btn-outline-primary btn-sm">

                        Lihat Semua

                    </a>

                </div>


                <div class="dashboard-card-body">

                    <div class="gallery-grid">

                        <?php $__currentLoopData = $galeriTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="gallery-item">

                                <?php if($item->file): ?>

                                    <img
                                        src="<?php echo e(\Illuminate\Support\Facades\Storage::url($item->file)); ?>"
                                        alt="<?php echo e($item->judul); ?>"
                                        class="gallery-image">

                                <?php else: ?>

                                    <div class="gallery-placeholder">

                                        <i class="bi bi-image"></i>

                                    </div>

                                <?php endif; ?>

                                <div class="gallery-overlay">

                                    <div class="gallery-title">
                                        <?php echo e($item->judul); ?>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>


                    <?php if($galeriTerbaru->count() === 0): ?>

                        <div class="empty-state">

                            <div class="empty-state-icon">
                                <i class="bi bi-images"></i>
                            </div>

                            <h6 class="fw-semibold mb-1">
                                Belum ada galeri
                            </h6>

                            <small class="text-muted">
                                Dokumentasi sekolah belum tersedia.
                            </small>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- =========================================
     STYLE
========================================== -->

<style>

    /* ==============================
       HEADER
    ============================== */

    .dashboard-title-icon {
        width: 46px;
        height: 46px;

        border-radius: 12px;

        background: rgba(13, 110, 253, 0.10);
        color: #0d6efd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 20px;

        flex-shrink: 0;
    }


    /* ==============================
       STAT CARD
    ============================== */

    .dashboard-stat-card {
        background: #ffffff;

        border: 1px solid #e9ecef;

        border-radius: 14px;

        padding: 22px;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }


    .dashboard-stat-card:hover {
        transform: translateY(-2px);

        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
    }


    .stat-label {
        font-size: 12px;

        font-weight: 700;

        color: #6c757d;

        letter-spacing: 0.5px;

        margin-bottom: 7px;
    }


    .stat-number {
        font-size: 32px;

        line-height: 1;

        font-weight: 700;

        color: #212529;

        margin-bottom: 8px;
    }


    .stat-description {
        font-size: 13px;

        color: #8a9299;
    }


    .stat-icon {
        width: 48px;
        height: 48px;

        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 21px;

        flex-shrink: 0;
    }


    .stat-blue {
        background: rgba(13, 110, 253, 0.10);
        color: #0d6efd;
    }


    .stat-green {
        background: rgba(25, 135, 84, 0.10);
        color: #198754;
    }


    .stat-orange {
        background: rgba(253, 126, 20, 0.10);
        color: #fd7e14;
    }


    .stat-purple {
        background: rgba(111, 66, 193, 0.10);
        color: #6f42c1;
    }


    .stat-pink {
        background: rgba(214, 51, 132, 0.10);
        color: #d63384;
    }


    /* ==============================
       MAIN CARD
    ============================== */

    .dashboard-card {
        background: #ffffff;

        border: 1px solid #e9ecef;

        border-radius: 14px;

        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);

        overflow: hidden;
    }


    .dashboard-card-header {
        padding: 18px 22px;

        border-bottom: 1px solid #e9ecef;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;
    }


    .dashboard-card-body {
        padding: 0 22px;
    }


    /* ==============================
       SECTION ICON
    ============================== */

    .section-icon {
        width: 42px;
        height: 42px;

        border-radius: 10px;

        background: rgba(13, 110, 253, 0.10);

        color: #0d6efd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;

        flex-shrink: 0;
    }


    .section-icon-purple {
        background: rgba(111, 66, 193, 0.10);
        color: #6f42c1;
    }


    .section-icon-pink {
        background: rgba(214, 51, 132, 0.10);
        color: #d63384;
    }


    /* ==============================
       NEWS
    ============================== */

    .news-item {
        display: flex;

        gap: 16px;

        padding: 18px 0;

        border-bottom: 1px solid #edf0f2;
    }


    .news-item:last-child {
        border-bottom: 0;
    }


    .news-image-wrapper {
        width: 100px;
        height: 72px;

        flex-shrink: 0;
    }


    .news-image {
        width: 100%;
        height: 100%;

        object-fit: cover;

        border-radius: 10px;

        border: 1px solid #dee2e6;
    }


    .news-placeholder {
        width: 100%;
        height: 100%;

        border-radius: 10px;

        border: 1px solid #dee2e6;

        background: #f8f9fa;

        color: #adb5bd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 25px;
    }


    .news-content {
        flex: 1;

        min-width: 0;
    }


    .news-title {
        font-size: 15px;

        font-weight: 600;

        color: #212529;

        line-height: 1.4;

        margin-bottom: 4px;
    }


    .news-date {
        font-size: 12px;

        color: #8a9299;

        margin-bottom: 7px;
    }


    .news-description {
        font-size: 13px;

        line-height: 1.6;

        color: #6c757d;
    }


    /* ==============================
       EKSTRAKURIKULER
    ============================== */

    .eskul-item {
        display: flex;

        align-items: center;

        gap: 14px;

        padding: 16px 0;

        border-bottom: 1px solid #edf0f2;
    }


    .eskul-item:last-child {
        border-bottom: 0;
    }


    .eskul-image-wrapper {
        width: 70px;
        height: 60px;

        flex-shrink: 0;
    }


    .eskul-image {
        width: 100%;
        height: 100%;

        object-fit: cover;

        border-radius: 9px;

        border: 1px solid #dee2e6;
    }


    .eskul-placeholder {
        width: 100%;
        height: 100%;

        border-radius: 9px;

        background: #f8f9fa;

        border: 1px solid #dee2e6;

        color: #adb5bd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
    }


    .eskul-content {
        min-width: 0;
        flex: 1;
    }


    /* ==============================
       GALLERY
    ============================== */

    .gallery-grid {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 12px;

        padding: 20px 0;
    }


    .gallery-item {
        position: relative;

        height: 105px;

        overflow: hidden;

        border-radius: 10px;

        background: #f8f9fa;

        border: 1px solid #dee2e6;
    }


    .gallery-image {
        width: 100%;
        height: 100%;

        object-fit: cover;

        display: block;

        transition: transform 0.25s ease;
    }


    .gallery-item:hover .gallery-image {
        transform: scale(1.05);
    }


    .gallery-placeholder {
        width: 100%;
        height: 100%;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #adb5bd;

        font-size: 25px;
    }


    .gallery-overlay {
        position: absolute;

        left: 0;
        right: 0;
        bottom: 0;

        padding: 25px 8px 8px;

        background: linear-gradient(
            to top,
            rgba(0, 0, 0, 0.65),
            transparent
        );
    }


    .gallery-title {
        color: #ffffff;

        font-size: 12px;

        font-weight: 600;

        white-space: nowrap;

        overflow: hidden;

        text-overflow: ellipsis;
    }


    /* ==============================
       EMPTY STATE
    ============================== */

    .empty-state {
        text-align: center;

        padding: 45px 20px;

        color: #6c757d;
    }


    .empty-state-icon {
        width: 56px;
        height: 56px;

        margin: 0 auto 12px;

        border-radius: 50%;

        background: #f8f9fa;

        color: #adb5bd;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 23px;
    }


    /* ==============================
       RESPONSIVE
    ============================== */

    @media (max-width: 767.98px) {

        .dashboard-card-header {
            flex-direction: column;

            align-items: flex-start;
        }


        .dashboard-card-header .btn {
            width: 100%;
        }


        .dashboard-card-body {
            padding: 0 16px;
        }


        .stat-number {
            font-size: 28px;
        }


        .news-image-wrapper {
            width: 82px;
            height: 64px;
        }


        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }


        .gallery-item {
            height: 100px;
        }

    }

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>