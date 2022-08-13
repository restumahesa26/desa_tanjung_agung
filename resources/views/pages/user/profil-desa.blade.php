@extends('layouts.home')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Profil Desa</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Profil Desa</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="{{ url('tentang-desa.jpeg') }}">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Tentang Desa Tanjung Agung</h1>
                @if ($tentangDesa)
                    {!! $tentangDesa->tentang_desa !!}
                @else
                    <p>Informasi belum dimasukkan Admin</p>
                @endif
            </div>
            <div class="col-lg-6 wow fadeIn">
                <h2>Batas-batas Desa</h2>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 30%">Sebelah Utara</th>
                            <th>{{ $batasDesa ? $batasDesa->utara : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 30%">Sebelah Selatan</th>
                            <th>{{ $batasDesa ? $batasDesa->selatan : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 30%">Sebelah Timur</th>
                            <th>{{ $batasDesa ? $batasDesa->timur : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 30%">Sebelah Barat</th>
                            <th>{{ $batasDesa ? $batasDesa->barat : '-' }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 wow fadeIn">
                <h2>Perangkat Desa</h2>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 50%">Kepala Desa</th>
                            <th>{{ $pemerintahDesa ? $pemerintahDesa->kades : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 50%">Sekretaris Desa</th>
                            <th>{{ $pemerintahDesa ? $pemerintahDesa->sekdes : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 50%">Kaur Umum & Perencanaan</th>
                            <th>{{ $pemerintahDesa ? $pemerintahDesa->kaur_umum_perencanaan : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 50%">Kasi Kesra</th>
                            <th>{{ $pemerintahDesa ? $pemerintahDesa->kasi_kesra : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 50%">Kasi Pelayanan</th>
                            <th>{{ $pemerintahDesa ? $pemerintahDesa->kasi_pelayanan : '-' }}</th>
                        </tr>
                        <tr>
                            <th style="width: 50%">Kasi Pemerintah</th>
                            <th>{{ $pemerintahDesa ? $pemerintahDesa->kasi_pemerintah : '-' }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Feature Start -->
<div class="container-fluid bg-light bg-icon py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="display-5 mb-3">Badan Usaha Milik Desa (BUMDES) </h1>
        </div>
        <div class="row g-4">
            @forelse ($bumdes as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ url('storage/assets/bumdes-thumbnail/' . $item->thumbnail) }}" alt="">
                    <h4 class="mb-3">{{ $item->judul }}</h4>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
<!-- Feature End -->
@endsection
