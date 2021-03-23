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
                <form method="POST" action="{{ route('verifybn',['id'=>$item->no_buku]) }}" enctype="multipart/form-data">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Verifikasi Buku Nikah</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nomor Buku Nikah<input id="name" type="text" class="form-control form-control-user" placeholder="Nomor Buku Nikah" name="no_buku" value="{{ $item->no_buku }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama Suami<input id="name" type="text" class="form-control form-control-user" placeholder="Nama Suami" name="namaSuami" value="{{ $data1 }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama Istri<input id="name" type="text" class="form-control form-control-user" placeholder="Nama Istri" name="namaIstri" value="{{ $data2 }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Tanggal Menikah<input id="name" type="text" class="form-control form-control-user" placeholder="Tanggal Menikah" name="tglMenikah" value="{{ $tglMenikah }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Gambar Buku Nikah Suami
                                    {{-- <a href="" class="form-control form-control-user"><i class="fas fa-eye"> Tampilkan Gambar Buku Nikah Suami</i></a> --}}
                                    <br>
                                    <center>
                                        <img style="max-width: 100%; max-height: 100%; object-fit:cover;" src="{{url('gambarbnsuami/'.$item->no_buku)}}" />
                                    </center>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Gambar Buku Nikah Istri
                                    {{-- <a href="" class="form-control form-control-user"><i class="fas fa-eye"> Tampilkan Gambar Buku Nikah Suami</i></a> --}}
                                    <br>
                                    <center>
                                        <img style="max-width: 100%; max-height: 100%; object-fit:cover;" src="{{url('gambarbnistri/'.$item->no_buku)}}" />
                                    </center>
                                </div>
                            </div>
                            @if ($item->status == 'valid')
                            <center><h2>Data Sudah Divalidasi</h2></center>
                            @else
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
                            @endif
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
