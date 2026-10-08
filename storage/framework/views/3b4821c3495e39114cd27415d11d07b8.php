<?php
    use Illuminate\Support\Facades\Crypt;
?>



<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-0">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <div class="d-flex align-items-center gap-2 mb-1">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-images fs-5"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-0">
                        Kelola Galeri
                    </h3>

                    <p class="text-muted mb-0">
                        Kelola foto dan dokumentasi kegiatan sekolah.
                    </p>
                </div>

            </div>
        </div>

        <a href="<?php echo e(route('admin.galeri.create')); ?>"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Galeri

        </a>

    </div>


    <!-- Success -->
    <?php if(session('success')): ?>

        <div class="alert alert-success alert-dismissible fade show shadow-sm"
             role="alert">

            <i class="bi bi-check-circle me-2"></i>

            <?php echo e(session('success')); ?>


            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center">

                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                        <i class="bi bi-images fs-5"></i>
                    </div>

                    <div>

                        <h5 class="fw-bold mb-1">
                            Data Galeri
                        </h5>

                        <small class="text-muted">
                            Daftar dokumentasi foto sekolah
                        </small>

                    </div>

                </div>

                <span class="badge bg-primary rounded-pill px-3 py-2">
                    <?php echo e($galeri->count()); ?> Data
                </span>

            </div>

        </div>


        <!-- Card Body -->
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="text-center" style="width: 60px;">
                                No
                            </th>

                            <th class="text-center" style="width: 110px;">
                                Foto
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th class="text-center" style="width: 150px;">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <!-- No -->
                                <td class="text-center">
                                    <?php echo e($i + 1); ?>

                                </td>


                                <!-- Foto -->
                                <td class="text-center">

                                    <?php if($item->file): ?>

                                        <img
                                            src="<?php echo e(\Illuminate\Support\Facades\Storage::url($item->file)); ?>"
                                            alt="<?php echo e($item->judul); ?>"
                                            width="75"
                                            height="55"
                                            class="rounded border"
                                            style="object-fit: cover;">

                                    <?php else: ?>

                                        <div
                                            class="bg-light border rounded d-inline-flex align-items-center justify-content-center"
                                            style="width:75px;height:55px;">

                                            <i class="bi bi-image text-muted"></i>

                                        </div>

                                    <?php endif; ?>

                                </td>


                                <!-- Judul -->
                                <td class="fw-semibold">

                                    <?php echo e($item->judul); ?>


                                </td>


                                <!-- Kategori -->
                                <td>

                                    <?php if($item->kategori === 'Foto'): ?>

                                        <span class="badge bg-primary">

                                            <i class="bi bi-image me-1"></i>
                                            Foto

                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-secondary">

                                            <i class="bi bi-camera-video me-1"></i>
                                            Video

                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- Tanggal -->
                                <td>

                                    <?php echo e(\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')); ?>


                                </td>


                                <!-- Aksi -->
                                <td class="text-center">

                                    <!-- Detail -->
                                    <a
                                        href="<?php echo e(route('admin.galeri.detail', Crypt::encrypt($item->id_galeri))); ?>"
                                        class="btn btn-sm btn-outline-primary"
                                        title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    <!-- Edit -->
                                    <a
                                        href="<?php echo e(route('admin.galeri.edit', Crypt::encrypt($item->id_galeri))); ?>"
                                        class="btn btn-sm btn-outline-secondary"
                                        title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <!-- Hapus -->
                                    <form
                                        action="<?php echo e(route('admin.galeri.destroy',Crypt::encrypt($item->id_galeri))); ?>"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data galeri ini?');">

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

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<style>

    .table thead th {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
        font-weight: 600;
        color: #334155;
        white-space: nowrap;
    }

    .table tbody td {
        border: 1px solid #dee2e6;
        padding: 12px 15px;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .btn-outline-primary:hover,
    .btn-outline-secondary:hover,
    .btn-outline-danger:hover {
        color: #fff;
    }

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/galeri/index.blade.php ENDPATH**/ ?>