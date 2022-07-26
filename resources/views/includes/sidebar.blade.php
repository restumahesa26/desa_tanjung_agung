<!--**********************************
    Sidebar start
***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Dashboard</li>
            <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
            </li> -->
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="ti-desktop"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-label">Menu</li>
            <li class="@if(Route::is('berita.*'))mm-active @endif">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="ti-world"></i>
                    <span class="nav-text">Profil Desa</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{ route('tentang-desa.index') }}">Tentang Desa</a>
                        <a href="{{ route('batas-desa.index') }}">Batas-Batas Desa</a>
                        <a href="{{ route('pemerintah-desa.index') }}">Pemerintah Desa</a>
                    </li>
                </ul>
            </li>
            <li class="@if(Route::is('berita.*'))mm-active @endif">
                <a href="{{ route('berita.index') }}" class="@if(Route::is('berita.*'))mm-active @endif">
                    <i class="ti-book"></i><span class="nav-text">Berita</span>
                </a>
            </li>
            <li class="@if(Route::is('bumdes.*'))mm-active @endif">
                <a href="{{ route('bumdes.index') }}" class="@if(Route::is('bumdes.*'))mm-active @endif">
                    <i class="ti-support"></i><span class="nav-text">BUMDES</span>
                </a>
            </li>
            <li class="@if(Route::is('bumdes.*'))mm-active @endif">
                <a href="{{ route('perdes.index') }}" class="@if(Route::is('bumdes.*'))mm-active @endif">
                    <i class="ti-pin-alt"></i><span class="nav-text">Peraturan Desa</span>
                </a>
            </li>
            <li class="@if(Route::is('galeri.*'))mm-active @endif">
                <a href="{{ route('galeri.index') }}" class="@if(Route::is('galeri.*'))mm-active @endif">
                    <i class="ti-gallery"></i><span class="nav-text">Galeri</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
Sidebar end
***********************************-->
