@extends('layouts.admin')

@section('title')
    <title>Admin | Tambah Tentang Desa</title>
@endsection

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah Tentang Desa</h4>
            <p>Form Menambahkan Tentang Desa</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tentang-desa.index') }}">Tentang Desa</a></li>
            <li class="breadcrumb-item active"><a href="#">Tambah Data</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('tentang-desa.index') }}" class="btn btn-warning btn-sm mr-2 text-white">
                    <i class="ti-angle-double-left"></i> Back
                </a>
            </div>
            <div class="card-body px-4">
                <form action="{{ route('tentang-desa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for='tentang_desa'>Tentang Desa</label>
                        <textarea class='form-control' name='tentang_desa' id='tentang_desa' placeholder='Masukkan Tentang Desa' required>{{ old('tentang_desa') }}</textarea>
                        @error('tentang_desa')
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
    <script type="text/javascript" src="{{ url('js/ckeditor/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('tentang_desa', {
            height: 500,
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

<script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Perhatikan Lagi Field Yang Ditentang_desa'
        })
    </script>
@endif
@endpush
