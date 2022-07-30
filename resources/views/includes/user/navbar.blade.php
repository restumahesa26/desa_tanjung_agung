<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Tanjung Agung, Maje, Kaur</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0" style="float: left;">Ta<span class="text-secondary">nju</span>ng&nbsp;</h1>
            <h1 class="fw-bold text-secondary m-0">Ag<span class="text-primary">u</span>ng</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}" class="nav-item nav-link @if(Route::is('home')) active @endif">Beranda</a>
                <a href="{{ route('profil-desa') }}" class="nav-item nav-link @if(Route::is('profil-desa')) active @endif">Profil Desa</a>
                <a href="{{ route('galeri') }}" class="nav-item nav-link @if(Route::is('galeri')) active @endif">Galeri</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Menu</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('berita-desa') }}" class="dropdown-item">Berita</a>
                        <a href="{{ route('bumdes') }}" class="dropdown-item">BUMDES</a>
                        <a href="{{ route('perdes') }}" class="dropdown-item">PERDES</a>
                        <a href="{{ route('laporan-desa') }}" class="dropdown-item">Laporan Desa</a>
                    </div>
                </div>
                <a href="{{ route('kontak') }}" class="nav-item nav-link @if(Route::is('kontak')) active @endif">Kontak</a>
                @if (Auth::user())
                    <a href="{{ route('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                @endif
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
