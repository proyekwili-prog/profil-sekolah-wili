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
                    <i class="bi bi-newspaper fs-5"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-0">Kelola Berita</h3>
                    <p class="text-muted mb-0">
                        Kelola berita dan informasi sekolah.
                    </p>
                </div>
            </div>
        </div>

        <a href="<?php echo e(route('admin.berita.tambah')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Berita
        </a>
    </div>

    <!-- Notifikasi -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            <?php echo e(session('success')); ?>


            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    <?php endif; ?>

    <!-- Card Data -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div class="d-flex align-items-center">

                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                        <i class="bi bi-list-ul fs-5"></i>
                    </div>

                    <div>
                        <h5 class="fw-bold mb-1">
                            Data Berita
                        </h5>

                        <small class="text-muted">
                            Daftar berita dan informasi sekolah
                        </small>
                    </div>

                </div>

                <span class="badge bg-primary rounded-pill px-3 py-2">
                    <?php echo e($beritas->count()); ?> Data
                </span>

            </div>

        </div>

        <!-- Card Body -->
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width:60px;">
                                No
                            </th>

                            <th class="text-center" style="width:100px;">
                                Gambar
                            </th>

                            <th>
                                Judul Berita
                            </th>

                            <th style="width:130px;">
                                Tanggal
                            </th>

                            <th style="width:150px;">
                                Penulis
                            </th>

                            <th class="text-center" style="width:150px;">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <!-- No -->
                                <td class="text-center">
                                    <?php echo e($i + 1); ?>

                                </td>

                                <!-- Gambar -->
                                <td class="text-center">

                                    <?php if($berita->gambar): ?>

                                        <img
                                            src="<?php echo e(\Illuminate\Support\Facades\Storage::url($berita->gambar)); ?>"
                                            width="80"
                                            height="55"
                                            class="rounded border"
                                            style="object-fit: cover;"
                                            alt="<?php echo e($berita->judul); ?>">

                                    <?php else: ?>

                                        <div class="bg-light border rounded d-inline-flex align-items-center justify-content-center"
                                             style="width:80px;height:55px;">

                                            <i class="bi bi-image text-muted"></i>

                                        </div>

                                    <?php endif; ?>

                                </td>

                                <!-- Judul -->
                                <td>

                                    <div class="fw-semibold">
                                        <?php echo e($berita->judul); ?>

                                    </div>

                                    <small class="text-muted">
                                        <?php echo e(\Illuminate\Support\Str::limit(strip_tags($berita->isi), 70)); ?>

                                    </small>

                                </td>

                                <!-- Tanggal -->
                                <td>

                                    <?php echo e(\Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y')); ?>


                                </td>

                                <!-- Penulis -->
                                <td>

                                    <?php if($berita->user): ?>

                                        <?php echo e($berita->user->username); ?>


                                    <?php else: ?>

                                        -

                                    <?php endif; ?>

                                </td>

                                <!-- Aksi -->
                                <td class="text-center">

                                    <!-- Detail -->
                                    <a href="<?php echo e(route('admin.berita.detail',  Crypt::encrypt($berita->id_berita))); ?>"
                                       class="btn btn-sm btn-outline-primary"
                                       title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>

                                    <!-- Edit -->
                                    <a href="<?php echo e(route('admin.berita.edit', Crypt::encrypt($berita->id_berita))); ?>"
                                       class="btn btn-sm btn-outline-secondary"
                                       title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <!-- Hapus -->
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
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\web_sekolah_wili\profil-sekolah-wili\resources\views/berita/index.blade.php ENDPATH**/ ?>