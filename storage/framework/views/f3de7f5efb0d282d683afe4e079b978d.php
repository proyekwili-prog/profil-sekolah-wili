<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Kelola Berita</h3>
            <p class="text-muted mb-0">
                Kelola berita dan informasi sekolah.
            </p>
        </div>

        <a href="<?php echo e(route('admin.berita.tambah')); ?>" class="btn btn-secondary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Berita
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Penulis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if($beritas->isEmpty()): ?>

                            <tr>
                                <td class="text-center text-muted">-</td>
                                <td class="text-center text-muted">-</td>
                                <td class="text-center text-muted">
                                    Belum ada berita.
                                </td>
                                <td class="text-center text-muted">-</td>
                                <td class="text-center text-muted">-</td>
                                <td class="text-center text-muted">-</td>
                            </tr>

                        <?php else: ?>

                            <?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i + 1); ?></td>

                                    <td>
                                        <?php if($berita->gambar): ?>
                                            <img
                                                src="<?php echo e(\Illuminate\Support\Facades\Storage::url($berita->gambar)); ?>"
                                                width="80"
                                                height="55"
                                                class="rounded border"
                                                style="object-fit: cover;"
                                                alt="<?php echo e($berita->judul); ?>">
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <div class="fw-semibold">
                                            <?php echo e($berita->judul); ?>

                                        </div>

                                        <small class="text-muted">
                                            <?php echo e(\Illuminate\Support\Str::limit(strip_tags($berita->isi), 70)); ?>

                                        </small>
                                    </td>

                                    <td>
                                        <?php echo e($berita->tanggal); ?>

                                    </td>

                                    <td>
                                        <?php echo e($berita->user?->username ?? '-'); ?>

                                    </td>

                                    <td>
                                        <a
                                            href="<?php echo e(route('admin.berita.edit', Crypt::encrypt($berita->id_berita))); ?>"
                                            class="btn btn-sm btn-outline-secondary"
                                            title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form
                                            action="<?php echo e(route('admin.berita.destroy', $berita->id_berita)); ?>"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?');">

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/berita/index.blade.php ENDPATH**/ ?>