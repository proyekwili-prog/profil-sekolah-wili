<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Tambah Ekstrakurikuler</h3>
        <p class="text-muted">Tambahkan kegiatan ekstrakurikuler baru.</p>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($error); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="<?php echo e(route('admin.ekstrakulikuler.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_eskul" class="form-control" maxlength="40"
                           value="<?php echo e(old('nama_eskul')); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan" class="form-control" maxlength="40"
                           value="<?php echo e(old('jadwal_latihan')); ?>" placeholder="Contoh: Jumat, 14.00-16.00" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pembina</label>
                    <select name="pembina" class="form-select" required>
                        <option value="">-- Pilih Pembina --</option>
                        <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($guru->nama_guru); ?>"
                                <?php if(old('pembina') === $guru->nama_guru): echo 'selected'; endif; ?>>
                                <?php echo e($guru->nama_guru); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <small class="text-muted">Nama pembina diambil otomatis dari data Guru.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="form-control" required><?php echo e(old('deskripsi')); ?></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
                <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RPL-SMK\Downloads\celkom_wili_fixed\resources\views/ekstrakulikuler/tambah.blade.php ENDPATH**/ ?>