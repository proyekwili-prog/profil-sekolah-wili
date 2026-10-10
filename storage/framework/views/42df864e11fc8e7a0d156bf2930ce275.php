<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid px-0">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2">
                    <i class="bi bi-trophy fs-5"></i>
                </div>

                <div>
                    <h3 class="fw-bold mb-0">
                        Tambah Ekstrakurikuler
                    </h3>

                    <p class="text-muted mb-0">
                        Tambahkan kegiatan ekstrakurikuler baru.
                    </p>
                </div>

            </div>
        </div>

        <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>
    </div>


    <!-- Error -->
    <?php if($errors->any()): ?>

        <div class="alert alert-danger alert-dismissible fade show shadow-sm"
             role="alert">

            <div class="d-flex align-items-start">

                <i class="bi bi-exclamation-triangle me-2 mt-1"></i>

                <div>
                    <strong>Terjadi kesalahan:</strong>

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    <?php endif; ?>


    <!-- Card Form -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">

            <div class="d-flex align-items-center">

                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                    <i class="bi bi-plus-circle fs-5"></i>
                </div>

                <div>
                    <h5 class="fw-bold mb-1">
                        Form Tambah Ekstrakurikuler
                    </h5>

                    <small class="text-muted">
                        Isi informasi kegiatan ekstrakurikuler dengan lengkap.
                    </small>
                </div>

            </div>

        </div>


        <!-- Card Body -->
        <div class="card-body p-4">

            <form action="<?php echo e(route('admin.ekstrakulikuler.store')); ?>"
                  method="POST"
                  enctype="multipart/form-data">

                <?php echo csrf_field(); ?>


                <!-- Nama Ekstrakurikuler -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Ekstrakurikuler
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_eskul"
                        class="form-control"
                        maxlength="40"
                        value="<?php echo e(old('nama_eskul')); ?>"
                        placeholder="Masukkan nama ekstrakurikuler"
                        required>

                    <small class="text-muted">
                        Maksimal 40 karakter.
                    </small>

                </div>


                <!-- Jadwal Latihan -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Jadwal Latihan
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="jadwal_latihan"
                        class="form-control"
                        maxlength="40"
                        value="<?php echo e(old('jadwal_latihan')); ?>"
                        placeholder="Contoh: Jumat, 14.00-16.00"
                        required>

                </div>


                <!-- Pembina -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Pembina
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        name="pembina"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Pembina --
                        </option>

                        <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option
                                value="<?php echo e($guru->nama_guru); ?>"
                                <?php if(old('pembina') === $guru->nama_guru): echo 'selected'; endif; ?>>

                                <?php echo e($guru->nama_guru); ?>


                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                    <small class="text-muted">
                        Nama pembina diambil otomatis dari data Guru.
                    </small>

                </div>


                <!-- Deskripsi -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Deskripsi
                        <span class="text-danger">*</span>
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="6"
                        class="form-control"
                        placeholder="Masukkan deskripsi kegiatan ekstrakurikuler..."
                        required><?php echo e(old('deskripsi')); ?></textarea>

                </div>


                <!-- Gambar -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Gambar
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        class="form-control"
                        accept="image/*">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                </div>


                <!-- Tombol -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="<?php echo e(route('admin.ekstrakulikuler.index')); ?>"
                       class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>
                        Simpan Ekstrakurikuler

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<style>
    .form-control,
    .form-select {
        border-color: #dee2e6;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
    }

    textarea.form-control {
        resize: vertical;
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/ekstrakulikuler/tambah.blade.php ENDPATH**/ ?>