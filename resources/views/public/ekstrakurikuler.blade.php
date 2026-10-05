<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - {{ $profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja' }}</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/school-template/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/school-template/css/footer.css') }}">

    <style>
        body{font-family:'Montserrat',sans-serif}.page-header{padding:150px 0 80px;background:linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),url("{{ asset('assets/school-template/img/background.jpg') }}") center/cover}.section-title{font-weight:700}.eskul-card{transition:.3s}.eskul-card:hover{transform:translateY(-5px)}.eskul-image{width:100%;height:230px;object-fit:cover}
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('public.dashboard') }}">
            @if($profile?->logo)
                <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo Sekolah" style="height:50px">
            @else
                <img src="{{ asset('assets/school-template/img/logo-sekolah-tut-wuri-handayani.avif') }}" alt="Logo Sekolah" style="height:50px">
            @endif
            <span class="ms-2 fw-bold">{{ $profile->nama_sekolah ?? 'SMP NEGERI SATU ATAP 1 MANGUNREJA' }}</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('public.dashboard') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('public.profil') }}">Profil Sekolah</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('public.guru') }}">Guru & Staf</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('public.ekstrakurikuler') }}">Ekstrakurikuler</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('public.berita') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('public.galeri') }}">Galeri</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="page-header text-white text-center">
    <div class="container">
        <h1 class="fw-bold">Ekstrakurikuler</h1>
        <p class="mb-0">Mengembangkan bakat, minat, dan kreativitas siswa</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Kegiatan Ekstrakurikuler</h2>
            <p class="text-muted">Berbagai kegiatan untuk mendukung pengembangan potensi siswa</p>
        </div>

        <div class="row g-4">
            @foreach($ekstrakurikuler as $eskul)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 eskul-card overflow-hidden">

                        @if($eskul->gambar)
                            <img src="{{ asset('storage/'.$eskul->gambar) }}" class="eskul-image" alt="{{ $eskul->nama_eskul }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:230px">
                                <i class="bi bi-trophy fs-1 text-secondary"></i>
                            </div>
                        @endif

                        <div class="card-body text-center p-4">
                            <i class="bi bi-trophy fs-2 text-primary"></i>
                            <h5 class="fw-bold mt-3">{{ $eskul->nama_eskul }}</h5>
                            <p class="text-primary fw-semibold mb-2">
                                <i class="bi bi-calendar-event me-1"></i>{{ $eskul->jadwal_latihan }}
                            </p>
                            <p class="text-muted mb-0">{{ $eskul->deskripsi }}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-6 mb-4">
                <h5 class="fw-bold">{{ $profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja' }}</h5>
                <p class="text-white-50">{{ $profile->deskripsi ?? 'Website resmi profil sekolah.' }}</p>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Menu</h6>
                <a href="{{ route('public.dashboard') }}" class="d-block text-white-50 text-decoration-none mb-2">Beranda</a>
                <a href="{{ route('public.profil') }}" class="d-block text-white-50 text-decoration-none mb-2">Profil Sekolah</a>
                <a href="{{ route('public.guru') }}" class="d-block text-white-50 text-decoration-none mb-2">Guru & Staf</a>
                <a href="{{ route('public.ekstrakurikuler') }}" class="d-block text-white-50 text-decoration-none mb-2">Ekstrakurikuler</a>
                <a href="{{ route('public.berita') }}" class="d-block text-white-50 text-decoration-none mb-2">Berita</a>
                <a href="{{ route('public.galeri') }}" class="d-block text-white-50 text-decoration-none">Galeri</a>
            </div>

            <div class="col-md-3">
                <h6 class="fw-bold">Kontak</h6>
                <p class="text-white-50 mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $profile->alamat ?? '-' }}</p>
                <p class="text-white-50"><i class="bi bi-telephone me-2"></i>{{ $profile->kontak ?? '-' }}</p>
            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center text-white-50">
            <small>© {{ date('Y') }} {{ $profile->nama_sekolah ?? 'SMP Negeri Satu Atap 1 Mangunreja' }}</small>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>