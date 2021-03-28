@extends('master.master')
@section('content')
    @if (session('alert'))
    <div class="alert alert-danger">
        <center>{{ session('alert') }}</center>
    </div>
    @endif
    {{-- table --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Desa</h1>
            </div>
        <div class="col-lg-4">
            <a href="{{route('adddesa')}}" class="btn btn-outline-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Desa</th>
                            <th>Nama Kecamatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama_desa }}</td>
                            <td>{{ $item->nama_kecamatan }}</td>
                            <td>
                                {{-- <a href="{{ route('addkecamatan') }}"><div class="btn btn-outline-info btn-rounded btn-sm"><i class="fas fa-plus"></i></div></a> --}}
                                <a href="{{ route('editdesa', ['id'=>$item->id_desa]) }}"><div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-edit"></i></div></a>
                                <a href="{{ route('deletedesa', ['id'=>$item->id_desa]) }}"><div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    {{-- end table --}}

@endsection
