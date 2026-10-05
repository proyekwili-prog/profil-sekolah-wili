<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> - SMPN Satu Atap 1 Mangunreja</title>

    <!-- SEO Optimization -->
    <meta name="description" content="Spark Admin - Premium Bootstrap 5 Admin Dashboard Template">
    <meta name="author" content="Spark Admin Team">

    <link rel="stylesheet" href="<?php echo e(asset('datatables/datatables.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('datatables/datatables.min.css')); ?>">

    <!-- Local Third-Party Libraries (100% Offline Compatible) -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/apexcharts/apexcharts.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.css')); ?>">

    <!-- Main Design System & Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
</head>

<body class="bg-light">

    <!-- ==========================================
         START: Sidebar Component (Menggunakan bg-secondary agar warnanya kalem/tidak terlalu terang)
         ========================================== -->
    <div class="sidebar-wrapper bg-secondary text-white border-end border-dark" id="sidebar">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-brand d-flex align-items-center gap-3 text-decoration-none p-3">
            <img src="<?php echo e(asset('assets/images/satap.png')); ?>" alt="Logo" class="flex-shrink-0" style="width: 45px; height: 45px; object-fit: contain;">
            <span class="fs-6 fw-bold text-white lh-sm">SMPN SATU ATAP<br>1 MANGUNREJA</span>
        </a>

        <!-- Navigation Menu -->
        <div class="flex-grow-1 overflow-y-auto">
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title text-uppercase text-white-50 px-3 small fw-semibold">Menu</div>
                <ul class="sidebar-menu-list list-unstyled m-0 p-0">
                    <li class="sidebar-menu-item">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-menu-link text-white">
                            <i class="bi bi-houses-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if(auth()->user() && strtolower(auth()->user()->role) === 'admin'): ?>
                    <li class="sidebar-menu-item">
                        <a href="<?php echo e(route('admin.profile')); ?>" class="sidebar-menu-link text-white">
                            <i class="bi bi-person-workspace"></i>
                            <span>Profil Sekolah</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="sidebar-menu-item">
                         <a href="<?php echo e(route('admin.guru.index')); ?>" class="sidebar-menu-link text-white">
                            <i class="bi bi-person-badge fs-9"></i>
                            <span>Guru</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                         <a href="<?php echo e(route('admin.siswa.index')); ?>" class="sidebar-menu-link text-white">
                           <i class="bi bi-people fs-9"></i>
                            <span>Siswa</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="<?php echo e(route('admin.berita.index')); ?>" class="sidebar-menu-link text-white">
                           <i class="bi bi-journal-text fs-9"></i>
                            <span>Berita</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                         <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>" class="sidebar-menu-link text-white">
                           <i class="bi bi-trophy fs-9"></i>
                            <span>Ekstrakulikuler</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                         <a href="<?php echo e(route('admin.galeri.index')); ?>" class="sidebar-menu-link text-white">
                          <i class="bi bi-images fs-9"></i>
                            <span>Galeri</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- ==========================================
         START: Main Wrapper Component
         ========================================== -->
    <div class="main-wrapper">

        <!-- START: Top Navbar Component -->
        <header class="navbar-custom bg-white border-bottom px-3 d-flex align-items-center justify-content-between">
            <div class="navbar-left d-flex align-items-center">
                <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3 btn btn-light border-0"
                    id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">

                </button>
                <button class="sidebar-toggle-btn me-2 btn btn-light border-0" id="sidebar-toggle" aria-label="Toggle Navigation">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <div class="navbar-search-wrapper d-flex align-items-center">
                 <input type="text" class="navbar-search-input form-control" placeholder="Cari menu atau data..." id="main-search">
                 <button class="navbar-search-btn btn" aria-label="Search">
                     <i class="bi bi-search"></i>
                </button>
            </div>

            <div class="navbar-actions d-flex align-items-center">
                <div class="dropdown ms-2">
                    <button class="navbar-profile-btn dropdown-toggle btn d-flex align-items-center gap-2 border-0 bg-transparent" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" id="profile-dropdown">
                        <img src="<?php echo e(asset('assets/images/satap.png')); ?>" alt="Logo" class="rounded-circle" style="width: 32px; height: 32px; object-fit: contain;">
                        <span class="navbar-profile-name d-none d-md-inline fw-medium text-dark"><?php echo e(auth()->user()->username); ?></span>
                        <i class="bi bi-chevron-down navbar-profile-caret small text-muted"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="profile-dropdown">
                        <li>
                            <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="m-0">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item text-danger">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <div class="container-fluid p-4">
            <div class="row g-4">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

    </div>

    <!-- Local Third-Party Libraries Script dependencies -->
    <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/jquery-4.0.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/datatables.min.js')); ?>"></script>

    <script>
        $(document).ready(function (){
            $('.table').DataTable();
        });
    </script>
</body>

</html>
<?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/admin.blade.php ENDPATH**/ ?>