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
                @if ($data->isEmpty())
                <center><h2>Maaf ! Data Belum Diinputkan</h2></center>
                @else
                @foreach ($data as $item)
                <form method="POST" action="{{ route('verifyIndex',['id'=>$item->id_extra]) }}" enctype="multipart/form-data">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Verifikasi {{$item->nama_menu}}</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    {{$item->nama_input}}<input id="name" type="text" class="form-control form-control-user" placeholder="NIK" name="NIK" value="{{ $item->input }}" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Foto {{$item->nama_menu}}
                                    <br>
                                    <center>
                                    <img style="max-width: 100%; max-height: 100%; object-fit:cover;" src="{{url('gambarExtra/'.$item->input)}}" />
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
                                    <a href="{{ route('home') }}" class="btn btn-warning btn-user btn-block">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="col-sm-13 mb-3 mb-sm-0">
                                <a onclick="history.go(-1)" class="btn btn-warning btn-user btn-block">
                                    {{ __('Kembali') }}
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
