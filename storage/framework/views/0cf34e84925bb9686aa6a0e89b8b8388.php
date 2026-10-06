

<?php $__env->startSection('title', 'Profil Sekolah - ' . ($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja')); ?>

<?php $__env->startPush('styles'); ?>
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .page-header {
        padding: 150px 0 80px;
        background:
            linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)),
            url("<?php echo e(asset('assets/school-template/img/background.jpg')); ?>") center/cover;
    }

    .section-title {
        font-weight: 700;
    }

    .profile-image {
        width: 100%;
        height: 380px;
        object-fit: cover;
    }

    .info-card {
        transition: .3s;
    }

    .info-card:hover {
        transform: translateY(-4px);
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>


<section class="page-header text-white text-center">

    <div class="container">

        <h1 class="fw-bold">
            Profil Sekolah
        </h1>

        <p class="mb-0">
            Mengenal lebih dekat sekolah kami
        </p>

    </div>

</section>



<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                <?php echo e($profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja'); ?>

            </h2>

            <p class="text-muted">
                Profil dan informasi sekolah
            </p>

        </div>


        <div class="row align-items-center">

            <div class="col-lg-6 mb-4 mb-lg-0">

                <?php if($profile?->foto): ?>

                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($profile->foto)); ?>"
                         class="img-fluid rounded shadow-sm profile-image"
                         alt="<?php echo e($profile->nama_sekolah); ?>">

                <?php else: ?>

                    <div class="bg-light rounded shadow-sm d-flex align-items-center justify-content-center"
                         style="height:380px;">

                        <i class="bi bi-building fs-1 text-secondary"></i>

                    </div>

                <?php endif; ?>

            </div>


            <div class="col-lg-6">

                <h3 class="fw-bold">
                    <?php echo e($profile->nama_sekolah ?? '-'); ?>

                </h3>

                <p class="text-muted">
                    <?php echo e($profile->deskripsi ?? 'Informasi sekolah belum tersedia.'); ?>

                </p>

            </div>

        </div>

    </div>

</section>



<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Informasi Sekolah
            </h2>

        </div>


        <div class="row g-4">

            
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100 info-card">

                    <div class="card-body p-4">

                        <i class="bi bi-person-badge fs-2 text-primary"></i>

                        <h6 class="fw-bold mt-3">
                            Kepala Sekolah
                        </h6>

                        <p class="text-muted mb-0">
                            <?php echo e($profile->kepala_sekolah ?? '-'); ?>

                        </p>

                    </div>

                </div>

            </div>


            
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100 info-card">

                    <div class="card-body p-4">

                        <i class="bi bi-card-text fs-2 text-primary"></i>

                        <h6 class="fw-bold mt-3">
                            NPSN
                        </h6>

                        <p class="text-muted mb-0">
                            <?php echo e($profile->npsn ?? '-'); ?>

                        </p>

                    </div>

                </div>

            </div>


            
            <div class="col-md-6 col-lg-4">

                <div class="card border-0 shadow-sm h-100 info-card">

                    <div class="card-body p-4">

                        <i class="bi bi-calendar-event fs-2 text-primary"></i>

                        <h6 class="fw-bold mt-3">
                            Tahun Berdiri
                        </h6>

                        <p class="text-muted mb-0">
                            <?php echo e($profile->tahun_berdiri ?? '-'); ?>

                        </p>

                    </div>

                </div>

            </div>


            
            <div class="col-md-6 col-lg-6">

                <div class="card border-0 shadow-sm h-100 info-card">

                    <div class="card-body p-4">

                        <i class="bi bi-geo-alt fs-2 text-primary"></i>

                        <h6 class="fw-bold mt-3">
                            Alamat
                        </h6>

                        <p class="text-muted mb-0">
                            <?php echo e($profile->alamat ?? '-'); ?>

                        </p>

                    </div>

                </div>

            </div>


            
            <div class="col-md-6 col-lg-6">

                <div class="card border-0 shadow-sm h-100 info-card">

                    <div class="card-body p-4">

                        <i class="bi bi-telephone fs-2 text-primary"></i>

                        <h6 class="fw-bold mt-3">
                            Kontak
                        </h6>

                        <p class="text-muted mb-0">
                            <?php echo e($profile->kontak ?? '-'); ?>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Visi & Misi
            </h2>

        </div>


        <div class="card border-0 shadow-sm">

            <div class="card-body p-5 text-center">

                <i class="bi bi-bullseye fs-1 text-primary"></i>

                <p class="text-muted mt-4 mb-0"
                   style="white-space: pre-line; line-height: 1.8;">

                    <?php echo e($profile->visi_misi ?? 'Visi dan misi sekolah belum tersedia.'); ?>


                </p>

            </div>

        </div>

    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/public/profil.blade.php ENDPATH**/ ?>