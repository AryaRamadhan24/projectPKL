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
                @foreach ($userData as $item)
                <form method="POST" action="{{ route('updateuser',['id' => $item->id_user]) }}">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
                            </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Nama<input id="name" type="text" class="form-control form-control-user" placeholder="Nama" name="name" value="{{$item->name}}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    Email<input id="email" type="email" class="form-control form-control-user" name="email" value="{{$item->email}}" required autocomplete="email"
                                        placeholder="Email Address" readonly    >
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Tempat Lahir<input id="name" type="text" class="form-control form-control-user" placeholder="Tempat Lahir" name="Tempat_Lahir" value="{{$item->Tempat_Lahir}}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Tanggal Lahir<input id="name" type="date" class="form-control form-control-user" placeholder="Tanggal Lahir" name="Tanggal_Lahir" value="{{$item->Tanggal_Lahir}}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <span>Kecamatan</span>
                                        <select id="kecamatan" class="form-control form-control-user" name="kecamatan" required autocomplete="kecamatan">
                                            <option value="" selected disabled>
                                                ==Pilih Kecamatan==
                                            </option>
                                            @foreach ($kecamatan as $id=>$name)
                                            <option value="{{$id}}">
                                                {{$name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <span>Desa</span>
                                        <select id="desa" class="form-control form-control-user" name="desa" autocomplete="desa">
                                            <option value="0" disabled selected>==Pilih Desa==</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    Alamat<input id="name" type="text" class="form-control form-control-user" name="Alamat" value="{{$item->Alamat}}" required autocomplete="email"
                                        placeholder="Alamat">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        No Telp<input id="name" type="text" class="form-control form-control-user" placeholder="No Telp" name="No_Telp" value="{{$item->No_Telp}}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Update') }}
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
                            @endforeach
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
                $('#kecamatan').on('change', function () {
                let id = $(this).val();
                $('#desa').empty();
                $('#desa').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: '/register/daftardesa/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                console.log(response);
                $('#desa').empty();
                response.forEach(element => {
                    $('#desa').append(`<option value="${element['id_desa']}">${element['nama_desa']}</option>`);
                    });
                }
            });
        });
    });
    </script>

</body>

@endsection
