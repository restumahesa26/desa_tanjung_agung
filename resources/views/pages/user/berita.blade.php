@extends('layouts.home')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Berita</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Menu</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Berita</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Berita Terkini</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            @forelse ($berita as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" src="{{ url('storage/assets/berita-thumbnail/' . $item->thumbnail) }}" alt="">
                <div class="bg-light p-4">
                    <a class="d-block h5 lh-base mb-4" href="">{{ $item->judul }}</a>
                    <div class="text-muted border-top pt-4">
                        <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                        <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F, Y') }}</small>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
