<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Guru</h3>
            <p class="text-muted mb-0">Kelola data guru sekolah.</p>
        </div>
        <a href="<?php echo e(route('admin.guru.create')); ?>" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Guru
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i + 1); ?></td>
                            <td>
                                <?php if($guru->foto): ?>
                                    <img src="<?php echo e(asset('storage/'.$guru->foto)); ?>"
                                         width="55" height="55"
                                         class="rounded-circle border"
                                         style="object-fit:cover">
                                <?php else: ?>
                                    <div class="bg-light border rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:55px;height:55px">
                                        <i class="bi bi-person text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="fw-semibold"><?php echo e($guru->nama_guru); ?></td>
                            <td><?php echo e($guru->nip ?? '-'); ?></td>
                            <td><?php echo e($guru->mapel); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.guru.edit', Crypt::encrypt ($guru->id_guru))); ?>"
                                   class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?php echo e(route('admin.guru.destroy', $guru->id_guru)); ?>"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus guru ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/guru/index.blade.php ENDPATH**/ ?>