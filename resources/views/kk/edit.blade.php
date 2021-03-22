@extends('master.master')
@section('content')

<body class="bg-gradient-light">
    @if (session('success'))
        <div class="alert alert-success">
            <center>{{ session('success') }}</center>
        </div>
    @endif
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-2">
            <div class="card-body p-0">
                @foreach ($data as $item)
                <form method="POST" action="{{ route('verifykk',['id'=>$item->no_kk]) }}" enctype="multipart/form-data">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Verifikasi Kartu Keluarga</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    No Kartu Keluarga<input id="name" type="text" class="form-control form-control-user" placeholder="Nomor KK" name="no_kk" value="{{ $item->no_kk }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama<input id="name" type="text" class="form-control form-control-user" placeholder="Nama" name="nama" value="{{ $nama }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Alamat<input id="name" type="text" class="form-control form-control-user" placeholder="Alamat" name="Alamat" value="{{ $alamat }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Anggota KK</h6>
                                    </div>
                                    {{-- <table border="1"> --}}
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>SHDRT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if ($anggota != null)
                                                    @foreach ($anggota as $item2)
                                                    <tr>
                                                        <td>{{ $item2['nama'] }}</td>
                                                        <td>{{ $item2['SHDRT'] }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Foto KK
                                    <br>
                                    <center>
                                    <img style="max-width: 100%; max-height: 100%; object-fit:cover;" src="{{url('gambarkk/'.$item->no_kk)}}"/>
                                    </center>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Pesan<input id="name" type="text" class="form-control form-control-user" placeholder="Pesan" name="pesan" required autocomplete="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm-6">
                                        <button type="submit" name="action" value="valid" class="btn btn-success btn-user btn-block"><i class="fas fa-check"></i>
                                            {{ __('Valid') }}
                                        </button>
                                </div>
                                <div class="col-sm-6">
                                        <button type="submit" name="action" value="notvalid" class="btn btn-danger btn-user btn-block"><i class="fas fa-times"></i>
                                            {{ __('Tidak Valid') }}
                                        </button>
                                </div>
                                </div>
                            </div>
                        </form>
                            @endforeach
                            <div class="form-group">
                                <div class="col-sm-13 mb-3 mb-sm-0">
                                    <a href="{{ route('ktp') }}" class="btn btn-warning btn-user btn-block">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

@endsection
