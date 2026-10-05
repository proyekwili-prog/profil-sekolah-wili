<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - <?php echo e($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/school-template/css/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/school-template/css/footer.css')); ?>">
    <style>
        body{font-family:'Montserrat',sans-serif}.page-header{padding:150px 0 80px;background:linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),url("<?php echo e(asset('assets/school-template/img/background.jpg')); ?>") center/cover}.section-title{font-weight:700}.berita-card{transition:.3s}.berita-card:hover{transform:translateY(-5px)}.berita-image{width:100%;height:230px;object-fit:cover}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('public.dashboard')); ?>">
            <?php if($profile?->logo): ?>
                <img src="<?php echo e(asset('storage/'.$profile->logo)); ?>" alt="Logo Sekolah" style="height:50px">
            <?php else: ?>
                <img src="<?php echo e(asset('assets/school-template/img/logo-sekolah-tut-wuri-handayani.avif')); ?>" alt="Logo Sekolah" style="height:50px">
            <?php endif; ?>
            <span class="ms-2 fw-bold"><?php echo e($profile->nama_sekolah ?? 'SMP NEGERI SATU ATAP 1 MANGUNREJA'); ?></span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('public.dashboard')); ?>">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('public.profil')); ?>">Profil Sekolah</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('public.guru')); ?>">Guru & Staf</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('public.ekstrakurikuler')); ?>">Ekstrakurikuler</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('public.berita')); ?>">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('public.galeri')); ?>">Galeri</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="page-header text-white text-center">
    <div class="container">
        <h1 class="fw-bold">Berita Sekolah</h1>
        <p class="mb-0">Informasi dan kegiatan terbaru sekolah</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Berita Terbaru</h2>
            <p class="text-muted">Informasi terbaru seputar kegiatan sekolah</p>
        </div>

        <div class="row g-4">
            <?php $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 berita-card overflow-hidden">
                        <?php if($berita->gambar): ?>
                            <img src="<?php echo e(asset('storage/'.$berita->gambar)); ?>" class="berita-image" alt="<?php echo e($berita->judul); ?>">
                        <?php else: ?>
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:230px">
                                <i class="bi bi-newspaper fs-1 text-secondary"></i>
                            </div>
                        <?php endif; ?>

                        <div class="card-body p-4">
                            <small class="text-primary fw-semibold">
                                <i class="bi bi-calendar-event me-1"></i><?php echo e($berita->tanggal); ?>

                            </small>
                            <h5 class="fw-bold mt-3"><?php echo e($berita->judul); ?></h5>
                            <p class="text-muted mb-0">
                                <?php echo e(\Illuminate\Support\Str::limit(strip_tags($berita->isi),120)); ?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <h5 class="fw-bold"><?php echo e($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja'); ?></h5>
                <p class="text-white-50"><?php echo e($profile->deskripsi ?? 'Website resmi profil sekolah.'); ?></p>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Menu</h6>
                <a href="<?php echo e(route('public.dashboard')); ?>" class="d-block text-white-50 text-decoration-none mb-2">Beranda</a>
                <a href="<?php echo e(route('public.profil')); ?>" class="d-block text-white-50 text-decoration-none mb-2">Profil Sekolah</a>
                <a href="<?php echo e(route('public.guru')); ?>" class="d-block text-white-50 text-decoration-none mb-2">Guru & Staf</a>
                <a href="<?php echo e(route('public.ekstrakurikuler')); ?>" class="d-block text-white-50 text-decoration-none mb-2">Ekstrakurikuler</a>
                <a href="<?php echo e(route('public.berita')); ?>" class="d-block text-white-50 text-decoration-none mb-2">Berita</a>
                <a href="<?php echo e(route('public.galeri')); ?>" class="d-block text-white-50 text-decoration-none">Galeri</a>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold">Kontak</h6>
                <p class="text-white-50 mb-2"><i class="bi bi-geo-alt me-2"></i><?php echo e($profile->alamat ?? '-'); ?></p>
                <p class="text-white-50"><i class="bi bi-telephone me-2"></i><?php echo e($profile->kontak ?? '-'); ?></p>
            </div>
        </div>

        <hr class="border-secondary">

        <div class="text-center text-white-50">
            <small>© <?php echo e(date('Y')); ?> <?php echo e($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja'); ?></small>
        </div>
    </div>
</footer>

<script src="<?php echo e(asset('assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/berita.blade.php ENDPATH**/ ?>