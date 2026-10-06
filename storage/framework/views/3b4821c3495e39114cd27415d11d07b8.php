<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Galeri</h3>
            <p class="text-muted mb-0">Dokumentasi kegiatan sekolah.</p>
        </div>

        <a href="<?php echo e(route('admin.galeri.create')); ?>" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Galeri
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>File</th>
                            <th>Judul</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i + 1); ?></td>

                                <td>
                                    <?php if($item->file): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->file)); ?>"
                                             width="90"
                                             height="60"
                                             class="rounded border"
                                             style="object-fit: cover;">
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>

                                <td class="fw-semibold"><?php echo e($item->judul); ?></td>

                                <td>
                                    <?php echo e(\Illuminate\Support\Str::limit($item->keterangan ?? '-', 60)); ?>

                                </td>

                                <td>
                                    <span class="badge bg-light text-dark border">
                                        <?php echo e($item->kategori); ?>

                                    </span>
                                </td>

                                <td><?php echo e($item->tanggal); ?></td>

                                <td>
                                    <a href="<?php echo e(route('admin.galeri.edit', Crypt::encrypt($item->id_galeri))); ?>"
                                       class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="<?php echo e(route('admin.galeri.destroy', $item->id_galeri)); ?>"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus galeri ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger">
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
<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/galeri/index.blade.php ENDPATH**/ ?>