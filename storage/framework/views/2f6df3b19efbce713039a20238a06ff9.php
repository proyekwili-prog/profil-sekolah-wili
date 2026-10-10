


<?php $__env->startSection('title', 'Tambah User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-4">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Tambah User</h3>
        <p class="text-muted mb-0">Tambahkan pengguna baru ke dalam sistem.</p>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.user.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" id="username"
                           class="form-control"
                           value="<?php echo e(old('username')); ?>"
                           placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password"
                           class="form-control"
                           placeholder="Masukkan password" required>
                    <small class="text-muted">Password minimal 6 karakter.</small>
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label fw-semibold">Role</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>
                            Admin
                        </option>
                        <option value="operator" <?php echo e(old('role') == 'operator' ? 'selected' : ''); ?>>
                            Operator
                        </option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('admin.user.index')); ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-person-plus me-1"></i>Simpan User
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/admin/user/create.blade.php ENDPATH**/ ?>