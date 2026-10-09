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
                    <h3 class="fw-bold mb-0">Tambah Galeri</h3>
                    <p class="text-muted mb-0">
                        Tambahkan dokumentasi foto dan kegiatan sekolah.
                    </p>
                </div>
            </div>
        </div>

        <a href="<?php echo e(route('admin.galeri.index')); ?>"
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

    <!-- Card -->
    <div class="card border-0 shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-bottom py-3">
            <div class="d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3">
                    <i class="bi bi-plus-circle fs-5"></i>
                </div>

                <div>
                    <h5 class="fw-bold mb-1">Form Tambah Galeri</h5>
                    <small class="text-muted">
                        Isi informasi dokumentasi sekolah dengan lengkap.
                    </small>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-4">

            <form action="<?php echo e(route('admin.galeri.store')); ?>"
                  method="POST"
                  enctype="multipart/form-data">

                <?php echo csrf_field(); ?>

                <!-- Judul -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Judul <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="form-control"
                        maxlength="50"
                        value="<?php echo e(old('judul')); ?>"
                        placeholder="Masukkan judul dokumentasi"
                        required>

                    <small class="text-muted">
                        Maksimal 50 karakter.
                    </small>
                </div>

                <!-- Keterangan -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        class="form-control"
                        placeholder="Masukkan keterangan dokumentasi..."><?php echo e(old('keterangan')); ?></textarea>
                </div>

                <!-- Kategori -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Kategori <span class="text-danger">*</span>
                    </label>

                    <select
                        name="kategori"
                        id="kategori"
                        class="form-select"
                        required>

                        <option value="">-- Pilih Kategori --</option>

                        <option
                            value="Foto"
                            <?php if(old('kategori') === 'Foto'): echo 'selected'; endif; ?>>
                            Foto
                        </option>

                        <option
                            value="Video"
                            <?php if(old('kategori') === 'Video'): echo 'selected'; endif; ?>>
                            Video
                        </option>
                    </select>

                    <small class="text-muted">
                        Pilih kategori dokumentasi.
                    </small>
                </div>

                <!-- Tanggal -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Tanggal <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        class="form-control"
                        value="<?php echo e(old('tanggal', date('Y-m-d'))); ?>"
                        required>
                </div>

                <!-- File -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        File <span class="text-danger">*</span>
                    </label>

                    <input
                        type="file"
                        name="file"
                        id="file"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp,video/mp4,video/webm,video/quicktime,video/ogg"
                        required>

                    <small id="fileHelp" class="text-muted d-block mt-2">
                        Pilih kategori terlebih dahulu untuk melihat format file yang didukung.
                    </small>

                    <!-- Pratinjau file -->
                    <div id="previewContainer" class="mt-3 d-none">
                        <label class="form-label fw-semibold">
                            Pratinjau File
                        </label>

                        <div>
                            <img
                                id="imagePreview"
                                src=""
                                alt="Pratinjau foto"
                                class="rounded border d-none"
                                style="max-width: 320px; max-height: 220px; object-fit: contain;">

                            <video
                                id="videoPreview"
                                controls
                                class="rounded border d-none"
                                style="width: 320px; max-width: 100%; max-height: 220px;">
                            </video>
                        </div>

                        <div id="fileName" class="small text-muted mt-2"></div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="<?php echo e(route('admin.galeri.index')); ?>"
                       class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        Simpan Galeri
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const kategori = document.getElementById('kategori');
    const fileInput = document.getElementById('file');
    const fileHelp = document.getElementById('fileHelp');
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const videoPreview = document.getElementById('videoPreview');
    const fileName = document.getElementById('fileName');

    let previewUrl = null;

    function clearPreview() {
        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        imagePreview.src = '';
        videoPreview.pause();
        videoPreview.removeAttribute('src');
        videoPreview.load();

        imagePreview.classList.add('d-none');
        videoPreview.classList.add('d-none');
        previewContainer.classList.add('d-none');
        fileName.textContent = '';
    }

    function updateFileInput() {
        clearPreview();

        if (kategori.value === 'Foto') {
            fileInput.accept = 'image/jpeg,image/png,image/webp';

            fileHelp.textContent =
                'Format foto: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.';
        } else if (kategori.value === 'Video') {
            fileInput.accept =
                'video/mp4,video/webm,video/quicktime,video/ogg';

            fileHelp.textContent =
                'Format video: MP4, WEBM, MOV, atau OGG. Maksimal 50 MB.';
        } else {
            fileInput.accept =
                'image/jpeg,image/png,image/webp,video/mp4,video/webm,video/quicktime,video/ogg';

            fileHelp.textContent =
                'Pilih kategori terlebih dahulu untuk melihat format file yang didukung.';
        }
    }

    kategori.addEventListener('change', function () {
        fileInput.value = '';
        updateFileInput();
    });

    fileInput.addEventListener('change', function () {
        clearPreview();

        const file = fileInput.files[0];

        if (!file) {
            return;
        }

        const isFoto = kategori.value === 'Foto';
        const isVideo = kategori.value === 'Video';

        if (!isFoto && !isVideo) {
            alert('Pilih kategori Foto atau Video terlebih dahulu.');
            fileInput.value = '';
            return;
        }

        if (isFoto && !file.type.startsWith('image/')) {
            alert('File harus berupa foto.');
            fileInput.value = '';
            return;
        }

        if (isVideo && !file.type.startsWith('video/')) {
            alert('File harus berupa video.');
            fileInput.value = '';
            return;
        }

        const maxSize = isFoto
            ? 2 * 1024 * 1024
            : 50 * 1024 * 1024;

        if (file.size > maxSize) {
            alert(isFoto
                ? 'Ukuran foto maksimal 2 MB.'
                : 'Ukuran video maksimal 50 MB.');

            fileInput.value = '';
            return;
        }

        previewUrl = URL.createObjectURL(file);

        previewContainer.classList.remove('d-none');
        fileName.textContent = file.name;

        if (isFoto) {
            imagePreview.src = previewUrl;
            imagePreview.classList.remove('d-none');
        } else {
            videoPreview.src = previewUrl;
            videoPreview.classList.remove('d-none');
        }
    });

    updateFileInput();
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/galeri/tambah.blade.php ENDPATH**/ ?>