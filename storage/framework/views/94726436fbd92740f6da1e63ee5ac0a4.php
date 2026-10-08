<?php
    use Illuminate\Support\Facades\Crypt;
?>


<?php $__env->startSection('title', 'Data User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4 py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data User</h3>
            <p class="text-muted mb-0">Kelola data pengguna sistem.</p>
        </div>

        <?php if(strtolower(auth()->user()->role) === 'admin'): ?>
            <a href="<?php echo e(route('admin.user.create')); ?>" class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i> Tambah User
            </a>
        <?php endif; ?>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th width="80">No</th>
                            <th>Username</th>
                            <th>Role</th>

                            <?php if(strtolower(auth()->user()->role) === 'admin'): ?>
                                <th width="120">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                                             style="width:38px;height:38px;">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <span class="fw-semibold"><?php echo e($user->username); ?></span>
                                    </div>
                                </td>

                                <td>
                                    <?php if($user->role === 'admin'): ?>
                                        <span class="badge bg-danger">Admin</span>
                                    <?php elseif($user->role === 'operator'): ?>
                                        <span class="badge bg-warning text-dark">Operator</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><?php echo e($user->role); ?></span>
                                    <?php endif; ?>
                                </td>

                                <?php if(strtolower(auth()->user()->role) === 'admin'): ?>
                                    <td>
                                       <a href="<?php echo e(route('admin.user.edit', ['id' => Crypt::encrypt($user->id_user)])); ?>" class="btn btn-sm btn-warning"> <i class="bi bi-pencil-square"></i> </a> 

                                        <form action="<?php echo e(route('admin.user.destroy', Crypt::encrypt($user->id_user))); ?>"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/admin/user/index.blade.php ENDPATH**/ ?>