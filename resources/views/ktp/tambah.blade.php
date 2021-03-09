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
                                    NIK<input id="name" type="text" class="form-control form-control-user" placeholder="NIK" name="NIK" value="" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama<input id="name" type="text" class="form-control form-control-user" placeholder="Nama" name="name" value="" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Tempat Lahir<input id="name" type="text" class="form-control form-control-user" placeholder="Tempat Tanggal Lahir" name="tempat" value="" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Tanggal Lahir<input id="name" type="date" class="form-control form-control-user" placeholder="Tempat Tanggal Lahir" name="tanggal" value="" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Golongan Darah
                                    <select name="Golongan_Darah" id="" class="form-control form-control-user">
                                        <option value="A">A</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Jenis Kelamin
                                    <select name="JenisKelamin" id="" class="form-control form-control-user">
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Alamat<input id="name" type="text" class="form-control form-control-user" name="Alamat" value="" required autocomplete="name"
                                        placeholder="Alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Agama
                                    <select name="Agama" id="" class="form-control form-control-user">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Status Perkawinan
                                    <select name="StatusPerkawinan" id="" class="form-control form-control-user">
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Cerai Hidup">Cerai Hidup</option>
                                        <option value="Cerai Mati">Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Pekerjaan<input id="name" type="text" class="form-control form-control-user" placeholder="Pekerjaan" name="Pekerjaan" value="" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Kewarganegaraan
                                    <select name="Kewarganegaraan" id="" class="form-control form-control-user">
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Masa Berlaku<input id="name" type="text" class="form-control form-control-user" placeholder="Masa Berlaku" name="MasaBerlaku" value="" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Scan Gambar<input id="name" type="file" class="form-control form-control-user" placeholder="Scan Gambar" name="Gambar" value="" required autocomplete="name">
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
