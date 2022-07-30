@extends('layouts.home')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">Detail Laporan Desa</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Menu</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Laporan Desa</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">{{ $laporan->judul }}</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-3">{{ $laporan->judul }}</h1>
        </div>
        {!! $laporan->isi !!}
        <a href="{{ $laporan->link }}" target="_blank" class="btn btn-primary px-5" style="border-radius: 10px">Link Download File</a>
        <p class="mt-3">Diposting pada : {{ \Carbon\Carbon::parse($laporan->created_at)->translatedFormat('d F, Y') }}</p>
    </div>
</div>
<!-- Blog End -->
@endsection
