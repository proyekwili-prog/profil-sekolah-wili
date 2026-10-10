<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* =========================================================
       GURU FORM PAGE
    ========================================================= */

    .guru-form-page {
        width: 100%;
    }

    /* HEADER */
    .guru-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .guru-header-left {
        min-width: 0;
    }

    .guru-header-title {
        display: flex;
        align-items: center;
        gap: 10px;

        margin: 0;

        color: #172033;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.3px;
    }

    .guru-title-icon {
        width: 40px;
        height: 40px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: #eff6ff;
        color: #2563eb;

        border-radius: 10px;

        font-size: 18px;
    }

    .guru-header-description {
        margin: 7px 0 0 50px;

        color: #64748b;

        font-size: 13px;
        line-height: 1.5;
    }

    /* CARD */
    .guru-form-card {
        background: #ffffff;

        border: 1px solid #e2e8f0;
        border-radius: 12px;

        overflow: hidden;

        box-shadow: 0 3px 12px rgba(15, 23, 42, 0.04);
    }

    /* CARD HEADER */
    .guru-card-header {
        display: flex;
        align-items: center;

        min-height: 70px;

        padding: 15px 20px;

        border-bottom: 1px solid #e2e8f0;
    }

    .guru-card-icon {
        width: 36px;
        height: 36px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        margin-right: 12px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
        border-radius: 8px;

        color: #475569;

        font-size: 16px;
    }

    .guru-card-title {
        margin: 0;

        color: #1e293b;

        font-size: 14px;
        font-weight: 700;
    }

    .guru-card-description {
        margin: 3px 0 0;

        color: #94a3b8;

        font-size: 11px;
    }

    /* FORM */
    .guru-form-body {
        padding: 25px 25px 24px;
    }

    .guru-form-group {
        margin-bottom: 20px;
    }

    .guru-form-group:last-child {
        margin-bottom: 0;
    }

    .guru-form-label {
        display: block;

        margin-bottom: 7px;

        color: #334155;

        font-size: 13px;
        font-weight: 600;
    }

    .guru-required {
        color: #dc2626;
    }

    .guru-form-control {
        width: 100%;

        min-height: 40px;

        padding: 8px 12px;

        background: #ffffff;

        border: 1px solid #cbd5e1;
        border-radius: 7px;

        color: #334155;

        font-size: 13px;

        outline: none;

        transition: 0.15s ease;
    }

    .guru-form-control:focus {
        border-color: #93c5fd;

        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.08);
    }

    .guru-form-control::placeholder {
        color: #94a3b8;
    }

    .guru-file {
        padding: 7px 10px;

        background: #ffffff;

        cursor: pointer;
    }

    .guru-help-text {
        display: block;

        margin-top: 6px;

        color: #94a3b8;

        font-size: 11px;
    }

    /* ERROR */
    .guru-error-box {
        margin-bottom: 20px;

        padding: 12px 14px;

        background: #fef2f2;

        border: 1px solid #fecaca;
        border-radius: 8px;

        color: #b91c1c;

        font-size: 12px;
    }

    .guru-error-box div {
        margin-bottom: 3px;
    }

    .guru-error-box div:last-child {
        margin-bottom: 0;
    }

    /* BUTTON AREA */
    .guru-form-actions {
        display: flex;
        align-items: center;

        gap: 8px;

        padding-top: 22px;

        margin-top: 4px;

        border-top: 1px solid #e2e8f0;
    }

    .guru-btn {
        min-height: 38px;

        padding: 8px 15px;

        border-radius: 7px;

        font-size: 12px;
        font-weight: 600;
    }

    .guru-btn-save {
        background: #1e40af;
        border-color: #1e40af;
        color: #ffffff;
    }

    .guru-btn-save:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        color: #ffffff;
    }

    .guru-btn-back {
        background: #ffffff;
        border-color: #cbd5e1;
        color: #475569;
    }

    .guru-btn-back:hover {
        background: #f8fafc;
        border-color: #94a3b8;
        color: #334155;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        .guru-page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .guru-header-title {
            font-size: 21px;
        }

        .guru-header-description {
            margin-left: 50px;
        }

        .guru-form-body {
            padding: 20px 16px;
        }

        .guru-form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .guru-btn {
            width: 100%;
        }
    }
</style>


<div class="container-fluid px-0 guru-form-page">


    
    <div class="guru-page-header">

        <div class="guru-header-left">

            <h3 class="guru-header-title">

                <span class="guru-title-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </span>

                Tambah Data Guru

            </h3>

            <p class="guru-header-description">
                Tambahkan data guru baru ke dalam sistem.
            </p>

        </div>

    </div>


    
    <?php if($errors->any()): ?>

        <div class="guru-error-box">

            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div>
                    <i class="bi bi-exclamation-circle me-1"></i>
                    <?php echo e($error); ?>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    <?php endif; ?>


    
    <div class="guru-form-card">


        
        <div class="guru-card-header">

            <div class="guru-card-icon">
                <i class="bi bi-person-vcard"></i>
            </div>

            <div>

                <h5 class="guru-card-title">
                    Informasi Guru
                </h5>

                <p class="guru-card-description">
                    Lengkapi informasi guru yang akan ditambahkan.
                </p>

            </div>

        </div>


        
        <div class="guru-form-body">

            <form
                action="<?php echo e(route('admin.guru.store')); ?>"
                method="POST"
                enctype="multipart/form-data">

                <?php echo csrf_field(); ?>


                
                <div class="guru-form-group">

                    <label class="guru-form-label">
                        Nama Guru
                        <span class="guru-required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_guru"
                        class="form-control guru-form-control"
                        value="<?php echo e(old('nama_guru')); ?>"
                        placeholder="Masukkan nama guru"
                        required>

                </div>


                
                <div class="guru-form-group">

                    <label class="guru-form-label">
                        NIP
                    </label>

                    <input
                        type="text"
                        name="nip"
                        class="form-control guru-form-control"
                        value="<?php echo e(old('nip')); ?>"
                        placeholder="Masukkan NIP jika ada">

                </div>


                
                <div class="guru-form-group">

                    <label class="guru-form-label">
                        Mata Pelajaran
                        <span class="guru-required">*</span>
                    </label>

                    <input
                        type="text"
                        name="mapel"
                        class="form-control guru-form-control"
                        value="<?php echo e(old('mapel')); ?>"
                        placeholder="Contoh: Matematika"
                        required>

                </div>


                
                <div class="guru-form-group">

                    <label class="guru-form-label">
                        Foto Guru
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control guru-form-control guru-file"
                        accept=".jpg,.jpeg,.png,.webp">

                    <span class="guru-help-text">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </span>

                </div>


                
                <div class="guru-form-actions">

                    <a
                        href="<?php echo e(route('admin.guru.index')); ?>"
                        class="btn guru-btn guru-btn-back">

                        <i class="bi bi-arrow-left me-1"></i>

                        Kembali

                    </a>


                    <button
                        type="submit"
                        class="btn guru-btn guru-btn-save">

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Data

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\web_sekolah_wili\profil-sekolah-wili\resources\views/guru/tambah.blade.php ENDPATH**/ ?>