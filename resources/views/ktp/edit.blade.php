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
                                    Gambar Saat Ini<a href="" class="form-control form-control-user"><i class="fas fa-eye"> Tampilkan Gambar</i></a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Pesan<input id="name" type="text" class="form-control form-control-user" placeholder="Pesan" name="pesan" required autocomplete="name">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama<input id="name" type="text" class="form-control form-control-user" placeholder="Nama" name="name" value="{{ $item->nama }}" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Tempat Lahir<input id="name" type="text" class="form-control form-control-user" placeholder="Tempat Tanggal Lahir" name="tempat" value="{{ $item->Tempat_Lahir }}" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Tanggal Lahir<input id="name" type="date" class="form-control form-control-user" placeholder="Tempat Tanggal Lahir" name="tanggal" value="{{ $item->Tanggal_Lahir }}" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Golongan Darah
                                    <select name="Golongan_Darah" id="" class="form-control form-control-user">
                                        <option value="A" @if ($item->Golongan_Darah=='A')
                                            selected
                                        @endif>A</option>
                                        <option value="AB" @if ($item->Golongan_Darah=='AB')
                                            selected
                                        @endif>AB</option>
                                        <option value="B" @if ($item->Golongan_Darah=='B')
                                            selected
                                        @endif>B</option>
                                        <option value="O" @if ($item->Golongan_Darah=='O')
                                            selected
                                        @endif>O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Jenis Kelamin
                                    <select name="JenisKelamin" id="" class="form-control form-control-user">
                                        <option value="Laki-laki" @if ($item->Jenis_Kelamin=='Laki-laki')
                                            selected
                                        @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if ($item->Jenis_Kelamin=='Perempuan')
                                            selected
                                        @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Alamat<input id="name" type="text" class="form-control form-control-user" name="Alamat" value="{{ $item->Alamat }}" required autocomplete="name"
                                        placeholder="Alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Agama
                                    <select name="Agama" id="" class="form-control form-control-user">
                                        <option value="Islam" @if ($item->agama=='Laki-laki')
                                            selected
                                        @endif>Islam</option>
                                        <option value="Kristen" @if ($item->agama=='Kristen')
                                            selected
                                        @endif>Kristen</option>
                                        <option value="Katolik" @if ($item->agama=='Katolik')
                                            selected
                                        @endif>Katolik</option>
                                        <option value="Hindu" @if ($item->agama=='Hindu')
                                            selected
                                        @endif>Hindu</option>
                                        <option value="Budha" @if ($item->agama=='Budha')
                                            selected
                                        @endif>Budha</option>
                                        <option value="Kong Hu Chu" @if ($item->agama=='Kong Hu Chu')
                                            selected
                                        @endif>Kong Hu Chu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Status Perkawinan
                                    <select name="StatusPerkawinan" id="" class="form-control form-control-user">
                                        <option value="Kawin" @if ($item->status=='Kawin')
                                            selected
                                        @endif>Kawin</option>
                                        <option value="Belum Kawin" @if ($item->status=='Belum Kawin')
                                            selected
                                        @endif>Belum Kawin</option>
                                        <option value="Cerai Hidup" @if ($item->status=='Cerai Hidup')
                                            selected
                                        @endif>Cerai Hidup</option>
                                        <option value="Cerai Mati" @if ($item->status=='Cerai Mati')
                                            selected
                                        @endif>Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Pekerjaan<input id="name" type="text" class="form-control form-control-user" placeholder="Pekerjaan" name="Pekerjaan" value="{{ $item->pekerjaan }}" required autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">Kewarganegaraan
                                    <select name="Kewarganegaraan" id="" class="form-control form-control-user">
                                        <option value="WNI" @if ($item->kewarganegaraan=='WNI')
                                            selected
                                        @endif>WNI</option>
                                        <option value="WNA" @if ($item->kewarganegaraan=='WNA')
                                            selected
                                        @endif>WNA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Masa Berlaku<input id="name" type="text" class="form-control form-control-user" placeholder="Masa Berlaku" name="MasaBerlaku" value="{{ $item->masa_berlaku }}" required autocomplete="name">
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Gambar Saat Ini<a href="/gambarKTP/{{ $item->gambar }}" class="form-control form-control-user">Klik untuk lihat gambar</a>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Scan Gambar<input id="name" type="file" class="form-control form-control-user" placeholder="Scan Gambar" name="Gambar" value="" autocomplete="name">
                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Edit') }}
                                        </button>
                                </div>
                            </div> --}}
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
