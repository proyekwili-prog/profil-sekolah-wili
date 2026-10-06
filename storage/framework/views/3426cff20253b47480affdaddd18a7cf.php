<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Edit Berita</h3>
        <p class="text-muted">Perbarui berita.</p>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($error); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="<?php echo e(route('admin.berita.update', $berita->id_berita)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul" class="form-control" maxlength="50" value="<?php echo e(old('judul', $berita->judul)); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Isi Berita</label>
                    <textarea name="isi" rows="8" class="form-control" required><?php echo e(old('isi', $berita->isi)); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo e(old('tanggal', $berita->tanggal)); ?>" required>
                </div>
                <?php if($berita->gambar): ?>
                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Gambar Saat Ini</label>
                        <img src="<?php echo e(asset('storage/'.$berita->gambar)); ?>" width="150" class="rounded border">
                    </div>
                <?php endif; ?>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <a href="<?php echo e(route('admin.berita.index')); ?>" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/berita/edit.blade.php ENDPATH**/ ?>