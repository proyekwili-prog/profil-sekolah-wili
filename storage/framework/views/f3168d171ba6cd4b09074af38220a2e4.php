<?php $__env->startSection('title', 'Profil Sekolah'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Profil Sekolah</h3>
            <p class="text-muted mb-0">Informasi identitas sekolah.</p>
        </div>
        <a href="<?php echo e(route('admin.edit_profile')); ?>" class="btn btn-secondary">
            <i class="bi bi-pencil-square me-1"></i> Edit Profil
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <?php if($profile?->logo): ?>
                        <img src="<?php echo e(asset('storage/'.$profile->logo)); ?>"
                             class="img-fluid rounded mb-3"
                             style="max-height:180px;object-fit:contain">
                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/images/satap.png')); ?>"
                             class="img-fluid"
                             style="max-height:180px;object-fit:contain">
                    <?php endif; ?>

                    <h4 class="fw-bold"><?php echo e($profile->nama_sekolah ?? 'Belum diisi'); ?></h4>
                </div>

                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">NPSN</small>
                                <div class="fw-semibold"><?php echo e($profile->npsn ?? '-'); ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">Kepala Sekolah</small>
                                <div class="fw-semibold"><?php echo e($profile->kepala_sekolah ?? '-'); ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="border rounded p-3">
                             <small class="text-muted d-block mb-1">Tahun Berdiri</small>
                             <div class="fw-semibold"><?php echo e($profile->tahun_berdiri ?? '-'); ?>

                         </div>
                     </div>
                    </div>
                        <div class="col-md-6">
                            <div class="border rounded p-3">
                                <small class="text-muted">Kontak</small>
                                <div class="fw-semibold"><?php echo e($profile->kontak ?? '-'); ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="border rounded p-3 mt-3">
                        <small class="text-muted d-block mb-1">Alamat</small>
                        <div><?php echo e($profile->alamat ?? '-'); ?></div>
                    </div>

                    <div class="border rounded p-3 mt-3">
                        <small class="text-muted d-block mb-1">Visi & Misi</small>
                        <div style="white-space:pre-line"><?php echo e($profile->visi_misi ?? '-'); ?></div>
                    </div>

                    <div class="border rounded p-3 mt-3">
                        <small class="text-muted d-block mb-1">Deskripsi</small>
                        <div style="white-space:pre-line"><?php echo e($profile->deskripsi ?? '-'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/admin/profil.blade.php ENDPATH**/ ?>