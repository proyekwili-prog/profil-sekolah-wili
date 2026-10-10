<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMPN Satu Atap 1 Mangunreja</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css')); ?>">
</head>
<body>
<div class="login-wrapper">
    <div class="login-bg-shape login-bg-shape-1"></div>
    <div class="login-bg-shape login-bg-shape-2"></div>

    <div class="login-card">
        <div class="text-center mb-4">
            <img src="<?php echo e(asset('assets/images/satap.png')); ?>"
                 alt="Logo Sekolah"
                 style="width:90px;height:90px;object-fit:contain;">
            <h5 class="fw-bold mt-3 mb-1">SMPN SATU ATAP 1 MANGUNREJA</h5>
            <small class="text-muted">Admin Sistem Informasi Sekolah</small>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label class="form-label fw-semibold">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text"
                           name="username"
                           class="form-control"
                           value="<?php echo e(old('username')); ?>"
                           required
                           autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Kata Sandi</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>
            </div>

            <button type="submit" class="btn btn-secondary w-100 py-2">
                <i class="bi bi-box-arrow-in-right me-1"></i>
                Masuk
            </button>
        </form>
    </div>
</div>
</body>
</html>
<?php /**PATH D:\web_sekolah_wili\profil-sekolah-wili\resources\views/admin/login.blade.php ENDPATH**/ ?>