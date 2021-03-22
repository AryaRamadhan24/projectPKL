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
                <h1 class="h4 text-gray-900 mb-4">Daftar Admin</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Desa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userData as $item)
                        <tr @if (Auth::user()->id==$item->id_user)
                            style="color:blue;"
                        @endif>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->Tempat_Lahir }}</td>
                            <td>{{ $item->Tanggal_Lahir }}</td>
                            <td>{{ $item->Alamat }}</td>
                            <td>{{ $item->No_Telp }}</td>
                            <td>{{ $item->nama_desa }}</td>
                            <td>
                                <a href="{{ route('edituser', ['id'=>$item->id_user]) }}"><div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></div></a>
                                @if (Auth::user()->id!=$item->id_user)
                                <a href="{{  route('deleteuser', ['id'=>$item->id_user]) }}"><div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div></a>
                                @endif
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
