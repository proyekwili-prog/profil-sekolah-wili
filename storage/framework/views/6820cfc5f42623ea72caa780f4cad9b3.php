<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Galeri</h3>
        <p class="text-muted">Tambahkan dokumentasi baru.</p>
    </div>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($error); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
    <?php endif; ?>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="<?php echo e(route('admin.galeri.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul</label>
                    <input type="text" name="judul" class="form-control" maxlength="50" value="<?php echo e(old('judul')); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Keterangan</label>
                    <textarea name="keterangan" rows="4" class="form-control"><?php echo e(old('keterangan')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Foto" <?php if(old('kategori') === 'Foto'): echo 'selected'; endif; ?>>Foto</option>
                        <option value="Video" <?php if(old('kategori') === 'Video'): echo 'selected'; endif; ?>>Video</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo e(old('tanggal', date('Y-m-d'))); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">File</label>
                    <input type="file" name="file" class="form-control" accept="image/*" required>
                </div>
                <a href="<?php echo e(route('admin.galeri.index')); ?>" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RPL-SMK\Downloads\celkom_wili_fixed\resources\views/galeri/tambah.blade.php ENDPATH**/ ?>