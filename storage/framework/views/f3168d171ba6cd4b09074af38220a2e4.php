<?php $__env->startSection('title', 'Profil Sekolah'); ?>

<?php $__env->startSection('content'); ?>

<style>
    :root {
        --school-blue: #0f3d91;
        --school-blue-dark: #082c6b;
        --school-blue-light: #eff6ff;
        --school-text: #172554;
        --school-muted: #64748b;
        --school-border: #e2e8f0;
        --school-bg: #f8fafc;
    }

    .profile-page {
        color: var(--school-text);
    }

    .profile-page .page-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 18px;
        margin-bottom: 28px;
    }

    .profile-page .page-title {
        margin-bottom: 7px;
        color: var(--school-blue);
        font-size: 27px;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .profile-page .page-subtitle {
        margin-bottom: 0;
        color: var(--school-muted);
        font-size: 13px;
        line-height: 1.8;
    }

    .profile-page .btn-edit-profile {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border: 0;
        border-radius: 9px;
        background: var(--school-blue);
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        transition: .25s ease;
    }

    .profile-page .btn-edit-profile:hover {
        background: var(--school-blue-dark);
        color: #fff;
        transform: translateY(-2px);
    }

    .profile-page .profile-card {
        margin-bottom: 24px;
        overflow: hidden;
        border: 1px solid var(--school-border);
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 8px 26px rgba(15, 23, 42, .045);
    }

    .profile-page .profile-card:last-child {
        margin-bottom: 0;
    }

    .profile-page .profile-card-body {
        padding: 28px;
    }

    .profile-page .card-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 23px;
    }

    .profile-page .heading-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 44px;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: var(--school-blue-light);
        color: var(--school-blue);
        font-size: 21px;
    }

    .profile-page .card-heading h4 {
        margin: 0 0 4px;
        color: var(--school-blue);
        font-size: 17px;
        font-weight: 800;
    }

    .profile-page .card-heading p {
        margin: 0;
        color: var(--school-muted);
        font-size: 12px;
        line-height: 1.7;
    }

    .profile-page .school-photo-frame {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 230px;
        padding: 10px;
        overflow: hidden;
        border: 1px solid var(--school-border);
        border-radius: 14px;
        background: var(--school-bg);
    }

    .profile-page .school-photo {
        display: block;
        width: 100%;
        max-width: 330px;
        height: 230px;
        border-radius: 10px;
        object-fit: cover;
    }

    .profile-page .school-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 330px;
        height: 230px;
        border-radius: 10px;
        background: var(--school-blue-light);
        color: #93b4e9;
        font-size: 64px;
    }

    .profile-page .school-name {
        margin-bottom: 22px;
        color: var(--school-blue);
        font-size: 24px;
        font-weight: 800;
        line-height: 1.45;
        overflow-wrap: anywhere;
    }

    .profile-page .info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .profile-page .info-item {
        min-width: 0;
        padding: 15px;
        border: 1px solid #e8edf5;
        border-radius: 11px;
        background: #fbfdff;
    }

    .profile-page .info-label {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 7px;
        color: var(--school-muted);
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .45px;
    }

    .profile-page .info-label i {
        color: #3973c7;
        font-size: 14px;
    }

    .profile-page .info-value {
        margin: 0;
        color: #1e293b;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    .profile-page .principal-photo-frame {
        width: 190px;
        height: 230px;
        margin: 0 auto;
        padding: 7px;
        overflow: hidden;
        border: 1px solid var(--school-border);
        border-radius: 16px;
        background: var(--school-bg);
    }

    .profile-page .principal-photo {
        width: 100%;
        height: 100%;
        border-radius: 11px;
        object-fit: cover;
        object-position: center top;
    }

    .profile-page .principal-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        border-radius: 11px;
        background: var(--school-blue-light);
        color: #60a5fa;
        font-size: 75px;
    }

    .profile-page .principal-name {
        margin-top: 16px;
        margin-bottom: 5px;
        color: var(--school-blue);
        font-size: 15px;
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .profile-page .principal-role {
        margin: 0;
        color: var(--school-muted);
        font-size: 12px;
    }

    .profile-page .welcome-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 12px;
        margin-bottom: 15px;
        border-radius: 30px;
        background: var(--school-blue-light);
        color: var(--school-blue);
        font-size: 11px;
        font-weight: 700;
    }

    .profile-page .welcome-title {
        margin-bottom: 16px;
        color: var(--school-blue);
        font-size: 22px;
        font-weight: 800;
        line-height: 1.5;
    }

    .profile-page .welcome-text {
        margin: 0;
        color: #475569;
        font-size: 13px;
        line-height: 2;
        overflow-wrap: anywhere;
    }

    .profile-page .empty-state {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 16px;
        border: 1px solid var(--school-border);
        border-radius: 11px;
        background: var(--school-bg);
        color: var(--school-muted);
        font-size: 13px;
        line-height: 1.8;
    }

    .profile-page .empty-state i {
        margin-top: 2px;
        color: #3973c7;
        font-size: 18px;
    }

    .profile-page .content-text {
        margin: 0;
        color: #475569;
        font-size: 13px;
        line-height: 2;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .profile-page .school-logo-frame {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 160px;
        height: 160px;
        padding: 15px;
        border: 1px solid var(--school-border);
        border-radius: 15px;
        background: var(--school-bg);
    }

    .profile-page .school-logo {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    @media (max-width: 767px) {
        .profile-page .page-heading {
            align-items: flex-start;
        }

        .profile-page .page-title {
            font-size: 23px;
        }

        .profile-page .profile-card-body {
            padding: 20px;
        }

        .profile-page .school-name {
            margin-top: 5px;
            font-size: 21px;
        }

        .profile-page .info-grid {
            grid-template-columns: 1fr;
        }

        .profile-page .welcome-title {
            font-size: 19px;
        }
    }
</style>

<div class="profile-page">

    
    <div class="page-heading">

        <div>
            <h3 class="page-title">
                Profil Sekolah
            </h3>

            <p class="page-subtitle">
                Informasi lengkap profil dan identitas sekolah.
            </p>
        </div>

        <a href="<?php echo e(route('admin.edit_profile')); ?>"
           class="btn-edit-profile">

            <i class="bi bi-pencil-square"></i>
            Edit Profil

        </a>

    </div>


    
    <?php if(session('success')): ?>

        <div class="alert alert-success border-0 rounded-3 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?php echo e(session('success')); ?>

        </div>

    <?php endif; ?>


    
    <div class="profile-card">

        <div class="profile-card-body">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-building"></i>
                </div>

                <div>
                    <h4>Informasi Sekolah</h4>
                    <p>Identitas utama dan informasi sekolah.</p>
                </div>
            </div>

            <div class="row g-4 align-items-center">

                
                <div class="col-lg-4 col-md-5">

                    <?php if($profile?->foto): ?>

                        <div class="school-photo-frame">
                            <img src="<?php echo e(asset('storage/' . $profile->foto)); ?>"
                                 alt="<?php echo e($profile?->nama_sekolah); ?>"
                                 class="school-photo">
                        </div>

                    <?php else: ?>

                        <div class="school-photo-frame">
                            <div class="school-placeholder">
                                <i class="bi bi-building"></i>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>


                
                <div class="col-lg-8 col-md-7">

                    <h2 class="school-name">
                        <?php echo e($profile?->nama_sekolah ?? '-'); ?>

                    </h2>

                    <div class="info-grid">

                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-card-text"></i>
                                NPSN
                            </div>

                            <p class="info-value">
                                <?php echo e($profile?->npsn ?? '-'); ?>

                            </p>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-person-badge"></i>
                                Kepala Sekolah
                            </div>

                            <p class="info-value">
                                <?php echo e($profile?->kepala_sekolah ?? '-'); ?>

                            </p>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-calendar-event"></i>
                                Tahun Berdiri
                            </div>

                            <p class="info-value">
                                <?php echo e($profile?->tahun_berdiri ?? '-'); ?>

                            </p>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="bi bi-telephone"></i>
                                Kontak
                            </div>

                            <p class="info-value">
                                <?php echo e($profile?->kontak ?? '-'); ?>

                            </p>
                        </div>

                        <div class="info-item" style="grid-column: 1 / -1;">
                            <div class="info-label">
                                <i class="bi bi-geo-alt"></i>
                                Alamat Sekolah
                            </div>

                            <p class="info-value">
                                <?php echo e($profile?->alamat ?? '-'); ?>

                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    
    <div class="profile-card">

        <div class="profile-card-body">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-chat-quote"></i>
                </div>

                <div>
                    <h4>Sambutan Kepala Sekolah</h4>
                    <p>Sambutan dan pesan dari kepala sekolah.</p>
                </div>
            </div>

            <div class="row g-4 align-items-center">

                
                <div class="col-lg-4 col-md-5 text-center">

                    <div class="principal-photo-frame">

                        <?php if($profile?->foto_kepala_sekolah): ?>

                            <img src="<?php echo e(asset('storage/' . $profile->foto_kepala_sekolah)); ?>"
                                 alt="<?php echo e($profile?->kepala_sekolah); ?>"
                                 class="principal-photo">

                        <?php else: ?>

                            <div class="principal-placeholder">
                                <i class="bi bi-person-fill"></i>
                            </div>

                        <?php endif; ?>

                    </div>

                    <h5 class="principal-name">
                        <?php echo e($profile?->kepala_sekolah ?? 'Kepala Sekolah'); ?>

                    </h5>

                    <p class="principal-role">
                        Kepala Sekolah
                    </p>

                </div>


                
                <div class="col-lg-8 col-md-7">

                    <span class="welcome-badge">
                        <i class="bi bi-chat-quote-fill"></i>
                        Sambutan Resmi
                    </span>

                    <h4 class="welcome-title">
                        Pesan Kepala Sekolah
                    </h4>

                    <?php if($profile?->sambutan_kepala_sekolah): ?>

                        <div class="welcome-text">
                            <?php echo nl2br(e($profile->sambutan_kepala_sekolah)); ?>

                        </div>

                    <?php else: ?>

                        <div class="empty-state">
                            <i class="bi bi-info-circle"></i>
                            <span>
                                Sambutan kepala sekolah belum diisi.
                            </span>
                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>


    
    <div class="profile-card">

        <div class="profile-card-body">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-bullseye"></i>
                </div>

                <div>
                    <h4>Visi & Misi</h4>
                    <p>Arah dan tujuan pendidikan sekolah.</p>
                </div>
            </div>

            <?php if($profile?->visi_misi): ?>

                <p class="content-text"><?php echo e($profile->visi_misi); ?></p>

            <?php else: ?>

                <div class="empty-state">
                    <i class="bi bi-info-circle"></i>
                    <span>
                        Visi dan misi belum diisi.
                    </span>
                </div>

            <?php endif; ?>

        </div>

    </div>


    
    <div class="profile-card">

        <div class="profile-card-body">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-info-circle"></i>
                </div>

                <div>
                    <h4>Deskripsi Sekolah</h4>
                    <p>Gambaran umum mengenai sekolah.</p>
                </div>
            </div>

            <?php if($profile?->deskripsi): ?>

                <p class="content-text"><?php echo e($profile->deskripsi); ?></p>

            <?php else: ?>

                <div class="empty-state">
                    <i class="bi bi-info-circle"></i>
                    <span>
                        Deskripsi sekolah belum diisi.
                    </span>
                </div>

            <?php endif; ?>

        </div>

    </div>


    
    <div class="profile-card">

        <div class="profile-card-body">

            <div class="card-heading">
                <div class="heading-icon">
                    <i class="bi bi-image"></i>
                </div>

                <div>
                    <h4>Logo Sekolah</h4>
                    <p>Logo resmi identitas sekolah.</p>
                </div>
            </div>

            <?php if($profile?->logo): ?>

                <div class="school-logo-frame">
                    <img src="<?php echo e(asset('storage/' . $profile->logo)); ?>"
                         alt="Logo <?php echo e($profile?->nama_sekolah); ?>"
                         class="school-logo">
                </div>

            <?php else: ?>

                <div class="empty-state">
                    <i class="bi bi-info-circle"></i>
                    <span>
                        Logo sekolah belum tersedia.
                    </span>
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
```

<?php echo $__env->make('layout.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\celkom_wili\profil-sekolah-wili\resources\views/admin/profil.blade.php ENDPATH**/ ?>