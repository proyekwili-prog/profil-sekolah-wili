<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <div class="mb-4">
        <h3 class="fw-bold">Edit Data Guru</h3>
        <p class="text-muted">Perbarui data guru.</p>
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div><?php echo e($error); ?></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="<?php echo e(route('admin.guru.update', $guru->id_guru)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control"
                           value="<?php echo e(old('nama_guru', $guru->nama_guru)); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">NIP</label>
                    <input type="text" name="nip" class="form-control"
                           value="<?php echo e(old('nip', $guru->nip)); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control"
                           value="<?php echo e(old('mapel', $guru->mapel)); ?>" required>
                </div>

                <?php if($guru->foto): ?>
                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Foto Saat Ini</label>
                        <img src="<?php echo e(asset('storage/'.$guru->foto)); ?>"
                             width="120" height="120"
                             class="rounded border"
                             style="object-fit:cover">
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Ganti Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>

                <a href="<?php echo e(route('admin.guru.index')); ?>" class="btn btn-light border me-2">Kembali</a>
                <button class="btn btn-secondary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RPL-SMK\Downloads\celkom_wili_fixed\resources\views/guru/edit.blade.php ENDPATH**/ ?>