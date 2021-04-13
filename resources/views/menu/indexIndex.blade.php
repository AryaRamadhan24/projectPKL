@extends('master.master')
@section('content')

    {{-- table --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        {{-- <div class="col-lg-2">
            <a href="{{route('addktpview')}}" class="btn btn-outline-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Input KTP</a>
        </div> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        @foreach ($menu as $head)
                        <tr>
                            <th>{{$head->nama_input}}</th>
                            <th>Waktu Upload</th>
                            <th>Aksi</th>
                        </tr>
                        @endforeach
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->input }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{  route('editIndex', ['id'=>$item->input]) }}"><div class="btn btn-outline-info btn-rounded btn-sm"><i class="fas fa-eye"></i></div></a>
                                <a href="{{  route('deleteIndex', ['id'=>$item->input]) }}"><div class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"></i></div></a>
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
