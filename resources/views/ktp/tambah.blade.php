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
                {{-- @foreach ($userData as $item) --}}
                <form method="POST" action="{{ route('addktp') }}" enctype="multipart/form-data">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Input KTP</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    NIK<input id="name" type="text" class="form-control form-control-user {{$errors->first('NIK') ? "is-invalid" : ""}}" placeholder="NIK" name="NIK" value="" required autocomplete="name">
                                    <div class="invalid-feedback">
                                        {{$errors->first('NIK')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama<input id="name" type="text" class="form-control form-control-user" placeholder="Nama" name="name" value="" autocomplete="name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Scan Gambar<input id="name" type="file" class="form-control form-control-user {{$errors->first('Gambar') ? "is-invalid" : ""}}" placeholder="Scan Gambar" accept="image/*" name="Gambar" value="" required autocomplete="name">
                                        <div class="invalid-feedback">
                                            {{$errors->first('Gambar')}}
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
                                    <a href="{{ route('ktp') }}" class="btn btn-warning btn-user btn-block">
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

</body>

@endsection
