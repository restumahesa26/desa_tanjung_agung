@extends('layouts.admin')

@section('title')
    <title>Admin | Pemerintah Desa</title>
@endsection

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Pemerintah Desa</h4>
            <p>Menampilkan Semua Pemerintah Desa</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Pemerintah Desa</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($items->count() < 1)
                <a href="{{ route('pemerintah-desa.create') }}" class="btn btn-primary px-4 text-white mb-2">Tambah Pemerintah Desa</a>
                @endif
                <div class="table-responsive mt-2">
                    <table id="table" class="table table-bordered text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kades</th>
                                <th>Sekdes</th>
                                <th>Kaur Umum & Perencanaan</th>
                                <th>Kasi Kesra</th>
                                <th>Kasi Pelayanan</th>
                                <th>Kasi Pemerintah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kades }}</td>
                                <td>{{ $item->sekdes }}</td>
                                <td>{{ $item->kaur_umum_perencanaan }}</td>
                                <td>{{ $item->kasi_kesra }}</td>
                                <td>{{ $item->kasi_pelayanan }}</td>
                                <td>{{ $item->kasi_pemerintah }}</td>
                                <td>
                                    <a href="{{ route('pemerintah-desa.edit', $item->id) }}" class="btn btn-primary btn-sm mr-1">Ubah</a>
                                    <form action="{{ route('pemerintah-desa.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mr-1 btn-hapus">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>


    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Yakin Menghapus Data?',
            text: "Data Akan Terhapus Permanen",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>

    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ $message }}'
        })
    </script>
    @endif
@endpush
