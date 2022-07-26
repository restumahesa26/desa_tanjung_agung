@extends('layouts.home')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Galeri</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Menu</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Galeri</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="display-5 mb-3">Galeri</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            @foreach ($galeri as $item)
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="product-item">
                    <div class="position-relative bg-light overflow-hidden">
                        <img class="img-fluid w-100" src="{{ url('storage/assets/foto-galeri/' . $item->foto) }}" alt="">
                    </div>
                    <div class="text-center p-4">
                        <p class="d-block h5 mb-2">{{ $item->judul }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
