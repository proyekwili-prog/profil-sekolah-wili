<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Ekstrakurikuler</h3>
            <p class="text-muted mb-0">Kelola kegiatan ekstrakurikuler sekolah.</p>
        </div>
        <a href="<?php echo e(route('admin.ekstrakulikuler.tambah')); ?>" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Ekstrakurikuler
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th><th>Gambar</th><th>Nama Ekstrakurikuler</th>
                            <th>Pembina</th><th>Jadwal Latihan</th><th>Deskripsi</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $ekstrakurikulers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $eskul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i+1); ?></td>
                            <td>
                                <?php if($eskul->gambar): ?>
                                    <img src="<?php echo e(asset('storage/'.$eskul->gambar)); ?>"
                                         width="85" height="60" class="rounded border"
                                         style="object-fit:cover">
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td class="fw-semibold"><?php echo e($eskul->nama_eskul); ?></td>
                            <td><?php echo e($eskul->pembina); ?></td>
                            <td><?php echo e($eskul->jadwal_latihan); ?></td>
                            <td><?php echo e(\Illuminate\Support\Str::limit($eskul->deskripsi, 70)); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.ekstrakulikuler.edit', $eskul->id_eskul)); ?>"
                                   class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="<?php echo e(route('admin.ekstrakulikuler.destroy', $eskul->id_eskul)); ?>"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ekstrakurikuler ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
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

<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/ekstrakulikuler/index.blade.php ENDPATH**/ ?>