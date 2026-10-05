<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Dashboard</h3>
        <p class="text-muted mb-0">Ringkasan data administrasi sekolah.</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="text-muted small fw-semibold">TOTAL SISWA</div>
                    <div class="fs-2 fw-bold"><?php echo e($totalSiswa); ?></div>
                    <i class="bi bi-people fs-3 text-secondary"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="text-muted small fw-semibold">TOTAL GURU</div>
                    <div class="fs-2 fw-bold"><?php echo e($totalGuru); ?></div>
                    <i class="bi bi-person-badge fs-3 text-secondary"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="text-muted small fw-semibold">TOTAL BERITA</div>
                    <div class="fs-2 fw-bold"><?php echo e($totalBerita); ?></div>
                    <i class="bi bi-newspaper fs-3 text-secondary"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="text-muted small fw-semibold">EKSTRAKURIKULER</div>
                    <div class="fs-2 fw-bold"><?php echo e($totalEkstrakurikuler); ?></div>
                    <i class="bi bi-trophy fs-3 text-secondary"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 py-3 d-flex justify-content-between">
            <div>
                <h5 class="fw-bold mb-1">Berita Terbaru</h5>
                <small class="text-muted">Informasi terbaru sekolah.</small>
            </div>
            <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn btn-sm btn-secondary">
                Lihat Semua
            </a>
        </div>

        <div class="card-body">
            <?php $__empty_1 = true; $__currentLoopData = $beritaTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="d-flex gap-3 py-3 border-bottom">
                    <?php if($berita->gambar): ?>
                        <img src="<?php echo e(asset('storage/'.$berita->gambar)); ?>"
                             style="width:90px;height:70px;object-fit:cover"
                             class="rounded border">
                    <?php else: ?>
                        <div class="bg-light rounded border d-flex align-items-center justify-content-center"
                             style="width:90px;height:70px">
                            <i class="bi bi-newspaper fs-4 text-muted"></i>
                        </div>
                    <?php endif; ?>

                    <div>
                        <h6 class="fw-bold mb-1"><?php echo e($berita->judul); ?></h6>
                        <small class="text-muted">
                            <?php echo e(\Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y')); ?>

                        </small>
                        <p class="small text-muted mb-0 mt-1">
                            <?php echo e(\Illuminate\Support\Str::limit(strip_tags($berita->isi), 120)); ?>

                        </p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center text-muted py-5">
                    Belum ada berita.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>