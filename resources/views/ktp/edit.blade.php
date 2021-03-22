@extends('master.master')
@section('content')

<body class="bg-gradient-light">
    {{-- @if (session('alert'))
        <div class="alert alert-danger">
            <center>{{ session('alert') }}</center>
        </div>
    @endif --}}
    {{-- @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <center><li>{{ $error }}</li></center>
                @endforeach
            </ul>
        </div>
    @endif --}}
    @if (session('success'))
        <div class="alert alert-success">
            <center>{{ session('success') }}</center>
        </div>
    @endif
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-2">
            <div class="card-body p-0">
                @foreach ($data as $item)
                <form method="POST" action="{{ route('verifyktp',['id'=>$item->NIK]) }}" enctype="multipart/form-data">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Verifikasi KTP</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    NIK<input id="name" type="text" class="form-control form-control-user" placeholder="NIK" name="NIK" value="{{ $item->NIK }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama<input id="name" type="text" class="form-control form-control-user" placeholder="nama" name="nama" value="{{ $nama }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Jenis Kelamin<input id="name" type="text" class="form-control form-control-user" placeholder="Jenis Kelamin" name="JK" value="{{ $jk }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Tempat Lahir<input id="name" type="text" class="form-control form-control-user" placeholder="Tempat Lahir" name="nama" value="{{ $tempatLahir }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Tanggal Lahir<input id="name" type="text" class="form-control form-control-user" placeholder="Tanggal Lahir" name="nama" value="{{ $tglLahir }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Golongan Darah<input id="name" type="text" class="form-control form-control-user" placeholder="Golongan Darah" name="nama" value="{{ $gdr }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Agama<input id="name" type="text" class="form-control form-control-user" placeholder="Agama" name="nama" value="{{ $agama }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Status<input id="name" type="text" class="form-control form-control-user" placeholder="Status" name="nama" value="{{ $status }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Pekerjaan<input id="name" type="text" class="form-control form-control-user" placeholder="Pekerjaan" name="nama" value="{{ $pekerjaan }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Foto KTP
                                    <br>
                                    <center>
                                    <img style="max-width: 100%; max-height: 100%; object-fit:cover;" src="{{url('gambarktp/'.$item->NIK)}}" />
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
