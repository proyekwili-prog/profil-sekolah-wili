<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Data Siswa</h3>
        <p class="text-muted">Masukkan data siswa baru.</p>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($error); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="<?php echo e(route('admin.siswa.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label fw-semibold">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="<?php echo e(old('nisn')); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="<?php echo e(old('nama_siswa')); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" <?php if(old('jenis_kelamin') === 'Laki-laki'): echo 'selected'; endif; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if(old('jenis_kelamin') === 'Perempuan'): echo 'selected'; endif; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Tahun Masuk</label>
                    <input type="number" name="tahun_masuk" class="form-control" value="<?php echo e(old('tahun_masuk')); ?>" required>
                </div>
                <a href="<?php echo e(route('admin.siswa.index')); ?>" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RPL-SMK\Downloads\celkom_wili_fixed\resources\views/siswa/tambah.blade.php ENDPATH**/ ?>