<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $__env->yieldContent('title', $profile->nama_sekolah ?? 'Profil Sekolah'); ?>
    </title>

    <link rel="icon"
          type="image/png"
          href="<?php echo e(asset('assets/images/satap.png')); ?>">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>

    
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center gap-2"
               href="<?php echo e(route('public.dashboard')); ?>">

                <?php if($profile && $profile->logo): ?>

                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($profile->logo)); ?>"
                         alt="Logo Sekolah"
                         style="height: 48px; width: 48px; object-fit: contain;">

                <?php else: ?>

                    <img src="<?php echo e(asset('assets/images/satap.png')); ?>"
                         alt="Logo Sekolah"
                         style="height: 48px; width: 48px; object-fit: contain;">

                <?php endif; ?>

                <span class="fw-bold text-primary">
                    <?php echo e($profile->nama_sekolah ?? 'Profil Sekolah'); ?>

                </span>

            </a>


            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu">

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

                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('public.ekstrakurikuler')); ?>">
                            Ekstrakurikuler
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    
    <?php echo $__env->yieldContent('content'); ?>


    
    <footer class="bg-dark text-white mt-5">

        <div class="container py-5">

            <div class="row g-4">

                <div class="col-md-5">

                    <h5 class="fw-bold">
                        <?php echo e($profile->nama_sekolah ?? 'Profil Sekolah'); ?>

                    </h5>

                    <p class="text-white-50 mb-0">
                        <?php echo e($profile->deskripsi ?? 'Website resmi sekolah.'); ?>

                    </p>

                </div>


                <div class="col-md-4">

                    <h5 class="fw-bold">
                        Kontak
                    </h5>

                    <p class="text-white-50 mb-2">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <?php echo e($profile->alamat ?? '-'); ?>

                    </p>

                    <p class="text-white-50 mb-0">
                        <i class="bi bi-telephone-fill me-2"></i>
                        <?php echo e($profile->kontak ?? '-'); ?>

                    </p>

                </div>


                <div class="col-md-3">

                    <h5 class="fw-bold">
                        Navigasi
                    </h5>

                    <ul class="list-unstyled">

                        <li class="mb-2">
                            <a href="<?php echo e(route('public.dashboard')); ?>"
                               class="text-white-50 text-decoration-none">
                                Beranda
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('public.profil')); ?>"
                               class="text-white-50 text-decoration-none">
                                Profil
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('public.guru')); ?>"
                               class="text-white-50 text-decoration-none">
                                Guru
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('public.berita')); ?>"
                               class="text-white-50 text-decoration-none">
                                Berita
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="<?php echo e(route('public.galeri')); ?>"
                               class="text-white-50 text-decoration-none">
                                Galeri
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('public.ekstrakurikuler')); ?>"
                               class="text-white-50 text-decoration-none">
                                Ekstrakurikuler
                            </a>
                        </li>

                    </ul>

                </div>

            </div>


            <hr class="border-secondary">


            <div class="text-center text-white-50">

                <small>
                    © <?php echo e(date('Y')); ?>

                    <?php echo e($profile->nama_sekolah ?? 'Sekolah'); ?>.
                    Semua hak dilindungi.
                </small>

            </div>

        </div>

    </footer>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/layout.blade.php ENDPATH**/ ?>