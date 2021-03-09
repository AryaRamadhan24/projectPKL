@extends('master.master')
@section('content')

    {{-- table --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        <div class="col-lg-2">
            <a href="{{route('addktpview')}}" class="btn btn-outline-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Input KTP</a>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->Tanggal_Lahir }}</td>
                            <td>{{ $item->Jenis_Kelamin }}</td>
                            <td>{{ $item->Alamat }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>
                                <a href="{{  route('editktp', ['id'=>$item->id]) }}"><div class="btn btn-outline-warning btn-rounded btn-sm"><i class="fas fa-pencil-alt"></i></div></a>
                                <a href="{{  route('deletektp', ['id'=>$item->id]) }}"><div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div></a>
                                {{-- <div class="btn btn-outline-success btn-rounded btn-sm"><i class="fa fa-download"></i></div> --}}
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
