<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Siswa</h3>
            <p class="text-muted mb-0">Kelola data siswa sekolah.</p>
        </div>
        <a href="<?php echo e(route('admin.siswa.create')); ?>" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th><th>NISN</th><th>Nama Siswa</th>
                            <th>Jenis Kelamin</th><th>Tahun Masuk</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($i+1); ?></td>
                            <td><?php echo e($siswa->nisn); ?></td>
                            <td class="fw-semibold"><?php echo e($siswa->nama_siswa); ?></td>
                            <td><?php echo e($siswa->jenis_kelamin); ?></td>
                            <td><?php echo e($siswa->tahun_masuk); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.siswa.edit', $siswa->id_siswa)); ?>"
                                   class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.siswa.destroy', $siswa->id_siswa)); ?>"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="text-center text-muted py-5">Belum ada data siswa.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\RPL-SMK\Downloads\celkom_wili_fixed\resources\views/siswa/index.blade.php ENDPATH**/ ?>