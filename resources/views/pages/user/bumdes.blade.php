@extends('layouts.home')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Badan Usaha Milik Desa "Raja Madani"</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Menu</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Badan Usaha Milik Desa</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 1000px;">
            <h1 class="display-5 mb-3">Badan Usaha Milik Desa (BUMDES) <br> "Raja Madani"</h1>
        </div>
        <div class="row g-4">
            @forelse ($bumdes as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="{{ url('storage/assets/bumdes-thumbnail/' . $item->thumbnail) }}" alt="">
                    <h4 class="mb-3">{{ $item->judul }}</h4>
                    <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="{{ route('bumdes.detail', $item->id) }}">Read More</a>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
<!-- Blog End -->
@endsection
