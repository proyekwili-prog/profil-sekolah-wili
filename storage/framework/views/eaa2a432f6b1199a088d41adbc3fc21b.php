<?php
    use Illuminate\Support\Facades\Crypt;
?>



<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<style>
    /* =========================================================
       KELOLA SISWA
       STYLE DISESUAIKAN DENGAN KELOLA GURU
    ========================================================= */

    .siswa-page {
        width: 100%;
    }

    /* =========================
       HEADER HALAMAN
    ========================= */

    .siswa-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-bottom: 22px;
    }

    .siswa-header-left {
        display: flex;
        align-items: flex-start;
    }

    .siswa-title-icon {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-right: 10px;

        background: #eff6ff;
        color: #2563eb;

        border-radius: 9px;

        font-size: 17px;

        flex-shrink: 0;
    }

    .siswa-title-wrapper {
        padding-top: 1px;
    }

    .siswa-title {
        margin: 0;

        color: #172033;

        font-size: 23px;
        font-weight: 700;

        line-height: 1.3;
    }

    .siswa-description {
        margin: 5px 0 0;

        color: #64748b;

        font-size: 12px;

        line-height: 1.5;
    }

    /* =========================
       BUTTON TAMBAH
    ========================= */

    .siswa-add-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-height: 37px;

        padding: 8px 15px;

        background: #2446b8;

        border: 1px solid #2446b8;
        border-radius: 7px;

        color: #ffffff;

        font-size: 12px;
        font-weight: 600;

        text-decoration: none;

        white-space: nowrap;

        transition: 0.15s ease;
    }

    .siswa-add-btn:hover {
        background: #1d3da5;
        border-color: #1d3da5;

        color: #ffffff;
    }

    .siswa-add-btn i {
        font-size: 13px;
    }

    /* =========================
       ALERT
    ========================= */

    .siswa-alert {
        margin-bottom: 15px;

        padding: 10px 14px;

        border-radius: 7px;

        font-size: 12px;
    }

    /* =========================
       CARD
    ========================= */

    .siswa-card {
        background: #ffffff;

        border: 1px solid #dfe5ec;
        border-radius: 11px;

        overflow: hidden;

        box-shadow:
            0 2px 6px rgba(15, 23, 42, 0.03);
    }

    /* =========================
       CARD HEADER
    ========================= */

    .siswa-card-header {
        min-height: 61px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 10px 17px;

        border-bottom: 1px solid #dfe5ec;

        background: #ffffff;
    }

    .siswa-card-header-left {
        display: flex;
        align-items: center;
    }

    .siswa-card-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-right: 10px;

        background: #f8fafc;

        border: 1px solid #dfe5ec;
        border-radius: 7px;

        color: #334155;

        font-size: 14px;
    }

    .siswa-card-title {
        margin: 0;

        color: #1e293b;

        font-size: 13px;
        font-weight: 700;
    }

    .siswa-card-subtitle {
        margin: 2px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }

    /* =========================
       TOTAL DATA
    ========================= */

    .siswa-total {
        display: inline-flex;
        align-items: center;

        padding: 5px 9px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
        border-radius: 6px;

        color: #475569;

        font-size: 10px;
        font-weight: 600;
    }

    .siswa-total i {
        margin-right: 4px;

        color: #2563eb;
    }

    /* =========================
       TABLE
    ========================= */

    .siswa-table-wrapper {
        width: 100%;
    }

    .siswa-table {
        width: 100% !important;

        margin: 0 !important;

        border-collapse: separate !important;
        border-spacing: 0 !important;
    }

    /* HEADER TABLE */

    .siswa-table thead th {
        height: 41px;

        padding: 9px 12px !important;

        background: #f8fafc !important;

        border-top: none !important;
        border-right: 1px solid #e1e7ee !important;
        border-bottom: 1px solid #d7dee7 !important;
        border-left: none !important;

        color: #475569 !important;

        font-size: 10px !important;
        font-weight: 700 !important;

        text-transform: uppercase;

        letter-spacing: 0.2px;

        vertical-align: middle !important;

        white-space: nowrap;
    }

    .siswa-table thead th:last-child {
        border-right: none !important;
    }

    /* BODY */

    .siswa-table tbody td {
        height: 62px;

        padding: 9px 12px !important;

        background: #ffffff;

        border-top: none !important;
        border-right: 1px solid #e1e7ee !important;
        border-bottom: 1px solid #e1e7ee !important;
        border-left: none !important;

        color: #475569;

        font-size: 11px;

        vertical-align: middle !important;
    }

    .siswa-table tbody td:last-child {
        border-right: none !important;
    }

    .siswa-table tbody tr:last-child td {
        border-bottom: none !important;
    }

    .siswa-table tbody tr:hover td {
        background: #f8fafc;
    }

    /* =========================
       KOLOM
    ========================= */

    .siswa-col-no {
        width: 65px;

        text-align: center !important;
    }

    .siswa-col-nisn {
        width: 150px;
    }

    .siswa-col-name {
        min-width: 250px;
    }

    .siswa-col-gender {
        width: 190px;
    }

    .siswa-col-year {
        width: 160px;
    }

    .siswa-col-action {
        width: 180px;

        text-align: center !important;
    }

    /* =========================
       NOMOR
    ========================= */

    .siswa-number {
        width: 24px;
        height: 24px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: #f8fafc;

        border: 1px solid #e2e8f0;
        border-radius: 5px;

        color: #64748b;

        font-size: 10px;
        font-weight: 600;
    }

    /* =========================
       NAMA
    ========================= */

    .siswa-name {
        color: #1e293b;

        font-size: 11px;

        font-weight: 600;
    }

    /* =========================
       NISN
    ========================= */

    .siswa-nisn {
        color: #475569;

        font-size: 11px;

        font-weight: 500;
    }

    /* =========================
       JENIS KELAMIN
    ========================= */

    .siswa-gender {
        color: #475569;

        font-size: 11px;
    }

    /* =========================
       TAHUN
    ========================= */

    .siswa-year {
        color: #475569;

        font-size: 11px;

        font-weight: 500;
    }

    /* =========================
       ACTION
    ========================= */

    .siswa-actions {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 5px;
    }

    .siswa-action-btn {
        width: 29px;
        height: 29px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        padding: 0 !important;

        border-radius: 6px;

        background: #ffffff;

        font-size: 12px;

        transition: 0.15s ease;
    }

    /* DETAIL */

    .siswa-detail-btn {
        color: #2563eb;

        border: 1px solid #93c5fd;
    }

    .siswa-detail-btn:hover {
        background: #eff6ff;

        color: #1d4ed8;

        border-color: #60a5fa;
    }

    /* EDIT */

    .siswa-edit-btn {
        color: #64748b;

        border: 1px solid #94a3b8;
    }

    .siswa-edit-btn:hover {
        background: #f8fafc;

        color: #334155;

        border-color: #64748b;
    }

    /* HAPUS */

    .siswa-delete-btn {
        color: #ef4444;

        border: 1px solid #fca5a5;
    }

    .siswa-delete-btn:hover {
        background: #fef2f2;

        color: #dc2626;

        border-color: #f87171;
    }

    /* =========================
       DATATABLES
    ========================= */

    .siswa-card .dataTables_wrapper {
        padding: 0;
    }

    .siswa-card .dataTables_length,
    .siswa-card .dataTables_filter {
        height: 41px;

        display: flex;
        align-items: center;
    }

    .siswa-card .dataTables_length {
        padding-left: 0;
    }

    .siswa-card .dataTables_filter {
        padding-right: 0;
    }

    .siswa-card .dataTables_length label,
    .siswa-card .dataTables_filter label {
        margin: 0;

        color: #475569;

        font-size: 11px;
        font-weight: 500;
    }

    .siswa-card .dataTables_length select {
        height: 30px;

        margin: 0 6px;

        padding: 3px 25px 3px 8px;

        border: 1px solid #cbd5e1;
        border-radius: 5px;

        background-color: #ffffff;

        color: #334155;

        font-size: 11px;
    }

    .siswa-card .dataTables_filter input {
        width: 150px;

        height: 30px;

        margin-left: 6px;

        padding: 5px 9px;

        border: 1px solid #cbd5e1;
        border-radius: 5px;

        background: #ffffff;

        color: #334155;

        font-size: 11px;

        outline: none;
    }

    .siswa-card .dataTables_filter input:focus {
        border-color: #93c5fd;

        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.08);
    }

    /* =========================
       DATATABLES TOP
    ========================= */

    .siswa-card .dataTables_wrapper > .row:first-child {
        margin: 0 !important;

        border-bottom: 1px solid #dfe5ec;
    }

    .siswa-card .dataTables_wrapper > .row:first-child > div {
        padding: 0 12px !important;
    }

    /* =========================
       DATATABLES BOTTOM
    ========================= */

    .siswa-card .dataTables_wrapper > .row:last-child {
        margin: 0 !important;

        border-top: 1px solid #dfe5ec;

        min-height: 48px;

        display: flex;
        align-items: center;
    }

    .siswa-card .dataTables_wrapper > .row:last-child > div {
        padding: 0 12px !important;
    }

    .siswa-card .dataTables_info {
        padding-top: 0 !important;

        color: #475569;

        font-size: 11px;
    }

    .siswa-card .dataTables_paginate {
        padding-top: 0 !important;
    }

    .siswa-card .dataTables_paginate .paginate_button {
        min-width: 31px;

        height: 31px;

        display: inline-flex !important;
        align-items: center;
        justify-content: center;

        margin-left: 3px !important;

        padding: 5px 8px !important;

        border: 1px solid #dfe5ec !important;
        border-radius: 5px !important;

        background: #ffffff !important;

        color: #64748b !important;

        font-size: 11px !important;
    }

    .siswa-card .dataTables_paginate .paginate_button:hover {
        background: #f8fafc !important;

        border-color: #cbd5e1 !important;

        color: #334155 !important;
    }

    .siswa-card .dataTables_paginate .paginate_button.current {
        background: #1769ff !important;

        border-color: #1769ff !important;

        color: #ffffff !important;
    }

    .siswa-card .dataTables_paginate .paginate_button.current:hover {
        background: #1769ff !important;

        border-color: #1769ff !important;

        color: #ffffff !important;
    }

    .siswa-card .dataTables_paginate .paginate_button.disabled {
        opacity: 0.5;
    }

    /* =========================
       EMPTY
    ========================= */

    .siswa-table tbody td.dataTables_empty {
        height: 120px;

        text-align: center !important;

        color: #94a3b8;

        font-size: 12px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .siswa-page-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .siswa-add-btn {
            width: 100%;
        }

        .siswa-card {
            overflow-x: auto;
        }

        .siswa-table {
            min-width: 850px !important;
        }

        .siswa-card .dataTables_wrapper {
            min-width: 850px;
        }
    }
</style>


<div class="container-fluid px-0 siswa-page">


    

    <div class="siswa-page-header">

        <div class="siswa-header-left">

            <div class="siswa-title-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <div class="siswa-title-wrapper">

                <h3 class="siswa-title">
                    Kelola Siswa
                </h3>

                <p class="siswa-description">
                    Kelola dan pantau seluruh data siswa sekolah.
                </p>

            </div>

        </div>


        <a
            href="<?php echo e(route('admin.siswa.create')); ?>"
            class="siswa-add-btn">

            <i class="bi bi-plus-lg"></i>

            Tambah Siswa

        </a>

    </div>


    

    <?php if(session('success')): ?>

        <div class="alert alert-success siswa-alert">

            <i class="bi bi-check-circle me-1"></i>

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>


    

    <div class="siswa-card">


        

        <div class="siswa-card-header">

            <div class="siswa-card-header-left">

                <div class="siswa-card-icon">

                    <i class="bi bi-table"></i>

                </div>

                <div>

                    <h5 class="siswa-card-title">
                        Data Siswa
                    </h5>

                    <p class="siswa-card-subtitle">
                        Daftar siswa yang terdaftar di sekolah.
                    </p>

                </div>

            </div>


            <div class="siswa-total">

                <i class="bi bi-people"></i>

                <?php echo e($totalSiswa); ?> Siswa

            </div>

        </div>


        

        <div class="siswa-table-wrapper">

            <table class="table siswa-table">

                <thead>

                    <tr>

                        <th class="siswa-col-no">
                            No
                        </th>

                        <th class="siswa-col-nisn">
                            NISN
                        </th>

                        <th class="siswa-col-name">
                            Nama Siswa
                        </th>

                        <th class="siswa-col-gender">
                            Jenis Kelamin
                        </th>

                        <th class="siswa-col-year">
                            Tahun Masuk
                        </th>

                        <th class="siswa-col-action">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>


                            

                            <td class="siswa-col-no">

                                <span class="siswa-number">

                                    <?php echo e($i + 1); ?>


                                </span>

                            </td>


                            

                            <td class="siswa-col-nisn">

                                <span class="siswa-nisn">

                                    <?php echo e($siswa->nisn); ?>


                                </span>

                            </td>


                            

                            <td class="siswa-col-name">

                                <span class="siswa-name">

                                    <?php echo e($siswa->nama_siswa); ?>


                                </span>

                            </td>


                            

                            <td class="siswa-col-gender">

                                <span class="siswa-gender">

                                    <?php echo e($siswa->jenis_kelamin); ?>


                                </span>

                            </td>


                            

                            <td class="siswa-col-year">

                                <span class="siswa-year">

                                    <?php echo e($siswa->tahun_masuk); ?>


                                </span>

                            </td>


                            

                            <td class="siswa-col-action">

                                <div class="siswa-actions">


                                    

                                    <a
                                        href="<?php echo e(route('admin.siswa.detail', Crypt::encrypt($siswa->id_siswa))); ?>"
                                        class="btn siswa-action-btn siswa-detail-btn"
                                        title="Lihat Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    

                                    <a
                                        href="<?php echo e(route('admin.siswa.edit', Crypt::encrypt($siswa->id_siswa))); ?>"
                                        class="btn siswa-action-btn siswa-edit-btn"
                                        title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    

                                    <form
                                        action="<?php echo e(route('admin.siswa.destroy', Crypt::encrypt($siswa->id_siswa))); ?>"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">

                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>

                                        <button
                                            type="submit"
                                            class="btn siswa-action-btn siswa-delete-btn"
                                            title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>


                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/siswa/index.blade.php ENDPATH**/ ?>