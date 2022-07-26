@extends('layouts.admin')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, {{ Auth::user()->nama }}!</h4>
            <p class="mb-0">Ini merupakan halaman dashboard untuk Admin</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-one card-body">
                <div class="stat-icon d-inline-block">
                    <i class="ti-book text-success border-success"></i>
                </div>
                <div class="stat-content d-inline-block">
                    <div class="stat-text">Berita</div>
                    <div class="stat-digit">{{ $berita }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-one card-body">
                <div class="stat-icon d-inline-block">
                    <i class="ti-support text-primary border-primary"></i>
                </div>
                <div class="stat-content d-inline-block">
                    <div class="stat-text">BUMDES</div>
                    <div class="stat-digit">{{ $bumdes }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-one card-body">
                <div class="stat-icon d-inline-block">
                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                </div>
                <div class="stat-content d-inline-block">
                    <div class="stat-text">Kritik & Saran</div>
                    <div class="stat-digit">770</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-one card-body">
                <div class="stat-icon d-inline-block">
                    <i class="ti-gallery text-danger border-danger"></i>
                </div>
                <div class="stat-content d-inline-block">
                    <div class="stat-text">Galeri</div>
                    <div class="stat-digit">{{ $galeri }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
