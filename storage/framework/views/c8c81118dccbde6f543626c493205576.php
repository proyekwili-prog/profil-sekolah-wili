<!DOCTYPE html>
<html lang="id">

<?php
    use App\Models\ProfileSekolah;
    use Illuminate\Support\Facades\Storage;

    $profile = ProfileSekolah::first();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <?php if($profile?->logo): ?>
        <link rel="icon"
              type="image/png"
              href="<?php echo e(asset('storage/' . $profile->logo)); ?>">
    <?php endif; ?>

    
    <title>
        <?php echo $__env->yieldContent('title', 'Admin'); ?> - <?php echo e($profile?->nama_sekolah ?? 'Sekolah'); ?>

    </title>

    
    <meta name="description"
          content="<?php echo e($profile?->nama_sekolah ?? 'Sekolah'); ?> - Admin Dashboard">

    <meta name="author"
          content="<?php echo e($profile?->nama_sekolah ?? 'Sekolah'); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('datatables/datatables.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('datatables/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/apexcharts/apexcharts.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
</head>

<body class="bg-light">

<div class="sidebar-wrapper bg-secondary text-white border-end border-dark" id="sidebar">

    <a href="<?php echo e(route('admin.dashboard')); ?>"
       class="sidebar-brand d-flex align-items-center gap-3 text-decoration-none p-3">

        
        <?php if(!empty($profile?->logo) && Storage::disk('public')->exists($profile->logo)): ?>
            <img src="<?php echo e(asset('storage/' . $profile->logo)); ?>"
                 alt="Logo <?php echo e($profile->nama_sekolah ?? 'Sekolah'); ?>"
                 style="width:45px;height:45px;object-fit:contain;">
        <?php endif; ?>

        
        <span class="fs-6 fw-bold text-white lh-sm">
            <?php echo e($profile?->nama_sekolah ?? '-'); ?>

        </span>

    </a>

    <div class="flex-grow-1 overflow-y-auto">
        <div class="sidebar-menu-section">

            <div class="sidebar-menu-title text-uppercase text-white-50 px-3 small fw-semibold">
                Menu
            </div>

            <ul class="sidebar-menu-list list-unstyled m-0 p-0">

                
                <li class="sidebar-menu-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"
                       class="sidebar-menu-link text-white">
                        <i class="bi bi-houses-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                <?php if(auth()->user() && strtolower(auth()->user()->role) === 'admin'): ?>

                    <li class="sidebar-menu-item">
                        <a href="<?php echo e(route('admin.profile')); ?>"
                           class="sidebar-menu-link text-white">
                            <i class="bi bi-person-workspace"></i>
                            <span>Profil Sekolah</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="<?php echo e(route('admin.guru.index')); ?>"
                           class="sidebar-menu-link text-white">
                            <i class="bi bi-person-badge fs-9"></i>
                            <span>Guru</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="<?php echo e(route('admin.siswa.index')); ?>"
                           class="sidebar-menu-link text-white">
                            <i class="bi bi-people fs-9"></i>
                            <span>Siswa</span>
                        </a>
                    </li>

                <?php endif; ?>

                
                <li class="sidebar-menu-item">
                    <a href="<?php echo e(route('admin.berita.index')); ?>"
                       class="sidebar-menu-link text-white">
                        <i class="bi bi-journal-text fs-9"></i>
                        <span>Berita</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>"
                       class="sidebar-menu-link text-white">
                        <i class="bi bi-trophy fs-9"></i>
                        <span>Ekstrakurikuler</span>
                    </a>
                </li>

                <li class="sidebar-menu-item">
                    <a href="<?php echo e(route('admin.galeri.index')); ?>"
                       class="sidebar-menu-link text-white">
                        <i class="bi bi-images fs-9"></i>
                        <span>Galeri</span>
                    </a>
                </li>

                
                <div class="sidebar-menu-title text-uppercase text-white-50 px-3 small fw-semibold mt-3">
                    Pengguna
                </div>

                <li class="sidebar-menu-item">
                    <a href="<?php echo e(route('admin.user.index')); ?>"
                       class="sidebar-menu-link text-white">
                        <i class="bi bi-people fs-9"></i>
                        <span>Data User</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>


<div class="main-wrapper">

    <header class="navbar-custom bg-white border-bottom px-3 d-flex align-items-center justify-content-between">

        <div class="navbar-left d-flex align-items-center">

            <button
                class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3 btn btn-light border-0"
                id="desktop-sidebar-toggle"
                aria-label="Minimize Sidebar">
            </button>

            <button
                class="sidebar-toggle-btn me-2 btn btn-light border-0"
                id="sidebar-toggle"
                aria-label="Toggle Navigation">
                <i class="bi bi-list"></i>
            </button>

        </div>

        <div class="navbar-search-wrapper d-flex align-items-center">
        </div>

        <div class="navbar-actions d-flex align-items-center">

            <div class="dropdown ms-2">

                <button
                    class="navbar-profile-btn dropdown-toggle btn d-flex align-items-center gap-2 border-0 bg-transparent"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="profile-dropdown">

                    
                    <?php if(!empty($profile?->logo) && Storage::disk('public')->exists($profile->logo)): ?>
                        <img src="<?php echo e(asset('storage/' . $profile->logo)); ?>"
                             alt="Logo <?php echo e($profile->nama_sekolah ?? 'Sekolah'); ?>"
                             class="rounded-circle"
                             style="width:32px;height:32px;object-fit:contain;">
                    <?php endif; ?>

                    <span class="navbar-profile-name d-none d-md-inline fw-medium text-dark">
                        <?php echo e(auth()->user()->username); ?>

                    </span>

                    <i class="bi bi-chevron-down navbar-profile-caret small text-muted"></i>

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow-sm"
                    aria-labelledby="profile-dropdown">

                    <li>
                        <form action="<?php echo e(route('admin.logout')); ?>"
                              method="POST"
                              class="m-0">

                            <?php echo csrf_field(); ?>

                            <button type="submit"
                                    name="logout"
                                    value="1"
                                    class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Keluar
                            </button>

                        </form>
                    </li>

                </ul>

            </div>

        </div>

    </header>


    <div class="container-fluid p-4">

        <?php if(session('error')): ?>

            <div class="alert alert-warning alert-dismissible fade show shadow-sm mb-4"
                 role="alert">

                <div class="d-flex align-items-center">

                    <i class="bi bi-shield-lock-fill fs-4 me-3"></i>

                    <div>
                        <strong>Akses Terbatas</strong>
                        <div class="small">
                            <?php echo e(session('error')); ?>

                        </div>
                    </div>

                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>

            </div>

        <?php endif; ?>

        <div class="row g-4">

            <?php echo $__env->yieldContent('content'); ?>

        </div>

    </div>

</div>


<script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/flatpickr/flatpickr.min.js')); ?>"></script>

<script src="<?php echo e(asset('datatables/jquery-4.0.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('datatables/datatables.js')); ?>"></script>
<script src="<?php echo e(asset('datatables/datatables.min.js')); ?>"></script>

<script>
    $(document).ready(function () {

        $('.table').DataTable({

            language: {
                emptyTable: 'Belum ada data.',
                zeroRecords: 'Data tidak ditemukan.',
                search: 'Cari:',
                lengthMenu: 'Tampilkan _MENU_ data',
                info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                infoEmpty: 'Tidak ada data',

                paginate: {
                    previous: 'Sebelumnya',
                    next: 'Berikutnya'
                }
            }

        });

    });
</script>

</body>
</html><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/layout/admin.blade.php ENDPATH**/ ?>