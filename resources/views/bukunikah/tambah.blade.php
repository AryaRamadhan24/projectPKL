@extends('master.master')
@section('content')

<body class="bg-gradient-light">
    @if (session('alert'))
        <div class="alert alert-danger">
            <center>{{ session('alert') }}</center>
        </div>
    @endif
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
                {{-- @foreach ($userData as $item) --}}
                <form method="POST" action="{{ route('storebn') }}" enctype="multipart/form-data">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Input Buku Nikah</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nomor Akta Nikah<input id="no_buku" type="text" class="form-control form-control-user {{$errors->first('no_buku') ? "is-invalid" : ""}}" placeholder="Nomor Akta Nikah" name="no_buku" value="" required autocomplete="name">
                                    <div class="invalid-feedback">
                                        {{$errors->first('no_buku')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama Suami<input id="namaSuami" type="text" class="form-control form-control-user" placeholder="Nama Suami" name="name" value="" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama Istri<input id="namaIstri" type="text" class="form-control form-control-user" placeholder="Nama Istri" name="name" value="" readonly autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Scan Gambar Buku Nikah Suami<input id="name" type="file" accept="image/*" class="form-control form-control-user {{$errors->first('GambarSuami') ? "is-invalid" : ""}}" placeholder="Scan Gambar" name="GambarSuami" value="" required autocomplete="name">
                                        <div class="invalid-feedback">
                                            {{$errors->first('GambarSuami')}}
                                        </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Scan Gambar Buku Nikah Istri<input id="name" type="file" accept="image/*" class="form-control form-control-user {{$errors->first('GambarIstri') ? "is-invalid" : ""}}" placeholder="Scan Gambar" name="GambarIstri" value="" required autocomplete="name">
                                        <div class="invalid-feedback">
                                            {{$errors->first('GambarIstri')}}
                                        </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Add') }}
                                        </button>
                                </div>
                            </div>
                            </form>
                            <div class="form-group">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <a href="javascript:window.history.back()" class="btn btn-warning btn-user btn-block">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                            {{-- @endforeach --}}
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
    $(document).ready(function () {
        $('#no_buku').on('change', function () {
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/databnjson/' + id,
                success: function (response) {
                    var response = JSON.parse(response);
                    console.log(response);
                        $('#namaSuami').val(response['namaSuami']);
                        $('#namaIstri').val(response['namaIstri']);
                    }
            });
        });
    });
    </script>
</body>

@endsection
