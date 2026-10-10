    

    <?php $__env->startSection('title', 'Edit Profil Sekolah'); ?>

    <?php $__env->startSection('content'); ?>
    <div class="container-fluid px-0">
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Edit Profil Sekolah</h3>
            <p class="text-muted mb-0">Perbarui informasi sekolah.</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control"
                                value="<?php echo e(old('nama_sekolah', $profile?->nama_sekolah)); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">NPSN</label>
                            <input type="text" name="npsn" class="form-control"
                                value="<?php echo e(old('npsn', $profile?->npsn)); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kepala Sekolah</label>
                            <input type="text" name="kepala_sekolah" class="form-control"
                                value="<?php echo e(old('kepala_sekolah', $profile?->kepala_sekolah)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" class="form-control"
                                value="<?php echo e(old('tahun_berdiri', $profile?->tahun_berdiri)); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Kontak</label>
                            <input type="text" name="kontak" class="form-control"
                                value="<?php echo e(old('kontak', $profile?->kontak)); ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required><?php echo e(old('alamat', $profile?->alamat)); ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Visi & Misi</label>
                            <textarea name="visi_misi" class="form-control" rows="6"><?php echo e(old('visi_misi', $profile?->visi_misi)); ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4"><?php echo e(old('deskripsi', $profile?->deskripsi)); ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Foto Profil/Gedung</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Logo Sekolah</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                        </div>

                        <div class="row mb-3">
    <div class="col-md-6">
        <label for="foto_kepala_sekolah" class="form-label">
            Foto Kepala Sekolah
        </label>

        <input
            type="file"
            name="foto_kepala_sekolah"
            id="foto_kepala_sekolah"
            class="form-control"
            accept="image/jpeg,image/png,image/jpg,image/webp"
        >

        <?php if($profile?->foto_kepala_sekolah): ?>
            <div class="mt-2">
                <img
                    src="<?php echo e(asset('storage/' . $profile->foto_kepala_sekolah)); ?>"
                    alt="Foto Kepala Sekolah"
                    style="width: 120px; height: 150px; object-fit: cover; border-radius: 8px;"
                >
            </div>
        <?php endif; ?>
    </div>

    <div class="col-md-6">
        <label for="sambutan_kepala_sekolah" class="form-label">
            Sambutan Kepala Sekolah
        </label>

        <textarea
            name="sambutan_kepala_sekolah"
            id="sambutan_kepala_sekolah"
            class="form-control"
            rows="6"
            placeholder="Tulis sambutan kepala sekolah..."
        ><?php echo e(old('sambutan_kepala_sekolah', $profile?->sambutan_kepala_sekolah)); ?></textarea>
    </div>
</div>
                    </div>

                    <div class="mt-4">
                        <a href="<?php echo e(route('admin.profile')); ?>" class="btn btn-light border me-2">Kembali</a>
                        <button class="btn btn-secondary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\web_sekolah_wili\profil-sekolah-wili\resources\views/admin/edit_profil.blade.php ENDPATH**/ ?>