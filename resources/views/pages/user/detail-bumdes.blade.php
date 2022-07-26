@extends('layouts.home')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Detail BUMDES</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Menu</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">BUMDES</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">{{ $bumdes->judul }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-3">{{ $bumdes->judul }}</h1>
            <img src="{{ url('storage/assets/bumdes-thumbnail/' . $bumdes->thumbnail) }}" alt="" srcset="">
        </div>
        {!! $bumdes->isi !!}
        <p>Diposting pada : {{ \Carbon\Carbon::parse($bumdes->created_at)->translatedFormat('d F, Y') }}</p>
    </div>
</div>
<!-- Blog End -->
@endsection
