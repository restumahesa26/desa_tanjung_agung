@extends('layouts.admin')

@section('title')
    <title>Admin | Tambah Batas Desa</title>
@endsection

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah Batas Desa</h4>
            <p>Form Menambahkan Batas Desa</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('batas-desa.index') }}">Batas Desa</a></li>
            <li class="breadcrumb-item active"><a href="#">Tambah Data</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('batas-desa.index') }}" class="btn btn-warning btn-sm mr-2 text-white">
                    <i class="ti-angle-double-left"></i> Back
                </a>
            </div>
            <div class="card-body px-4">
                <form action="{{ route('batas-desa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for='utara'>Utara</label>
                        <input class='form-control @error('utara') is-invalid @enderror' type='text' name='utara' id='utara' placeholder='Masukkan Utara' value='{{ old('utara') }}' required />
                        @error('utara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='selatan'>Selatan</label>
                        <input class='form-control @error('selatan') is-invalid @enderror' type='text' name='selatan' id='selatan' placeholder='Masukkan Selatan' value='{{ old('selatan') }}' required />
                        @error('selatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='barat'>Barat</label>
                        <input class='form-control @error('barat') is-invalid @enderror' type='text' name='barat' id='barat' placeholder='Masukkan Barat' value='{{ old('barat') }}' required />
                        @error('barat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='timur'>Timur</label>
                        <input class='form-control @error('timur') is-invalid @enderror' type='text' name='timur' id='timur' placeholder='Masukkan Timur' value='{{ old('timur') }}' required />
                        @error('timur')
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
