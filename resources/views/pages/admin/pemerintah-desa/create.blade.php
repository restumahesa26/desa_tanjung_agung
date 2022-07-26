@extends('layouts.admin')

@section('title')
    <title>Admin | Tambah Pemerintah Desa</title>
@endsection

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Tambah Pemerintah Desa</h4>
            <p>Form Menambahkan Pemerintah Desa</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pemerintah-desa.index') }}">Pemerintah Desa</a></li>
            <li class="breadcrumb-item active"><a href="#">Tambah Data</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pemerintah-desa.index') }}" class="btn btn-warning btn-sm mr-2 text-white">
                    <i class="ti-angle-double-left"></i> Back
                </a>
            </div>
            <div class="card-body px-4">
                <form action="{{ route('pemerintah-desa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for='kades'>Kepala Desa</label>
                        <input class='form-control @error('kades') is-invalid @enderror' type='text' name='kades' id='kades' placeholder='Masukkan Kepala Desa' value='{{ old('kades') }}' required />
                        @error('kades')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='sekdes'>Sekretaris Desa</label>
                        <input class='form-control @error('sekdes') is-invalid @enderror' type='text' name='sekdes' id='sekdes' placeholder='Masukkan Sekretaris Desa' value='{{ old('sekdes') }}' required />
                        @error('sekdes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='kaur_umum_perencanaan'>Barat</label>
                        <input class='form-control @error('kaur_umum_perencanaan') is-invalid @enderror' type='text' name='kaur_umum_perencanaan' id='kaur_umum_perencanaan' placeholder='Masukkan Barat' value='{{ old('kaur_umum_perencanaan') }}' required />
                        @error('kaur_umum_perencanaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='kasi_kesra'>Timur</label>
                        <input class='form-control @error('kasi_kesra') is-invalid @enderror' type='text' name='kasi_kesra' id='kasi_kesra' placeholder='Masukkan Timur' value='{{ old('kasi_kesra') }}' required />
                        @error('kasi_kesra')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='kasi_pelayanan'>Kasi Pelayanan</label>
                        <input class='form-control @error('kasi_pelayanan') is-invalid @enderror' type='text' name='kasi_pelayanan' id='kasi_pelayanan' placeholder='Masukkan Kasi Pelayanan' value='{{ old('kasi_pelayanan') }}' required />
                        @error('kasi_pelayanan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for='kasi_pemerintah'>Kasi Pemerintah</label>
                        <input class='form-control @error('kasi_pemerintah') is-invalid @enderror' type='text' name='kasi_pemerintah' id='kasi_pemerintah' placeholder='Masukkan Kasi Pemerintah' value='{{ old('kasi_pemerintah') }}' required />
                        @error('kasi_pemerintah')
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
