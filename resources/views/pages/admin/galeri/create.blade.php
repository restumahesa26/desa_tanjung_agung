@extends('layouts.admin')

@section('title')
    <title>Admin | Tambah Galeri</title>
@endsection

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah Galeri</h4>
            <p>Form Menambahkan Galeri</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
            <li class="breadcrumb-item active"><a href="#">Tambah Data</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('galeri.index') }}" class="btn btn-warning btn-sm mr-2 text-white">
                    <i class="ti-angle-double-left"></i> Back
                </a>
            </div>
            <div class="card-body px-4">
                <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for='judul'>Judul Galeri</label>
                        <input class='form-control @error('judul') is-invalid @enderror' type='text' name='judul' id='judul' placeholder='Masukkan Judul Galeri' value='{{ old('judul') }}' required />
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='foto'>Foto Galeri</label>
                        <input class='form-control @error('foto') is-invalid @enderror' type='file' name='foto' id='foto' placeholder='Foto Galeri' value='{{ old('foto') }}' required />
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type='submit' class='btn btn-primary btn-block py-2'>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')

<script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Perhatikan Lagi Field Yang Diisi'
        })
    </script>
@endif
@endpush
