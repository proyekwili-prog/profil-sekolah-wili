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
                    <h3 class="fw-bold mb-0">Edit Berita</h3>
                    <p class="text-muted mb-0">
                        Perbarui informasi berita sekolah.
                    </p>
                </div>
            </div>
        </div>

        <a href="<?php echo e(route('admin.berita.index')); ?>"
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
                    <i class="bi bi-pencil-square fs-5"></i>
                </div>

                <div>
                    <h5 class="fw-bold mb-1">
                        Form Edit Berita
                    </h5>

                    <small class="text-muted">
                        Perbarui data berita sekolah.
                    </small>
                </div>

            </div>

        </div>

        <!-- Card Body -->
        <div class="card-body p-4">

            <form action="<?php echo e(route('admin.berita.update', $berita->id_berita)); ?>"
                  method="POST"
                  enctype="multipart/form-data">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Judul -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Judul Berita
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        maxlength="50"
                        value="<?php echo e(old('judul', $berita->judul)); ?>"
                        placeholder="Masukkan judul berita"
                        required>

                    <small class="text-muted">
                        Maksimal 50 karakter.
                    </small>

                </div>

                <!-- Isi Berita -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Isi Berita
                        <span class="text-danger">*</span>
                    </label>

                    <textarea
                        name="isi"
                        rows="8"
                        class="form-control"
                        placeholder="Tulis isi berita di sini..."
                        required><?php echo e(old('isi', $berita->isi)); ?></textarea>

                </div>

                <!-- Tanggal -->
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Tanggal
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="<?php echo e(old('tanggal', $berita->tanggal)); ?>"
                        required>

                </div>

                <!-- Gambar Saat Ini -->
                <?php if($berita->gambar): ?>

                    <div class="mb-4">

                        <label class="form-label fw-semibold d-block">
                            Gambar Saat Ini
                        </label>

                        <div class="border rounded-3 p-2 d-inline-block bg-light">

                            <img
                                src="<?php echo e(\Illuminate\Support\Facades\Storage::url($berita->gambar)); ?>"
                                width="180"
                                height="120"
                                class="rounded"
                                style="object-fit: cover;"
                                alt="<?php echo e($berita->judul); ?>">

                        </div>

                    </div>

                <?php endif; ?>

                <!-- Ganti Gambar -->
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Ganti Gambar
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        class="form-control"
                        accept="image/*">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-end gap-2">

                    <a href="<?php echo e(route('admin.berita.index')); ?>"
                       class="btn btn-outline-secondary">

                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<style>
    .form-control {
        border-color: #dee2e6;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
    }

    textarea.form-control {
        resize: vertical;
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\web_sekolah_wili\profil-sekolah-wili\resources\views/berita/edit.blade.php ENDPATH**/ ?>