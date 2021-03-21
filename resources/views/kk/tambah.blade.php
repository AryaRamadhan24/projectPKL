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
                <form method="POST" action="{{ route('storekk') }}" enctype="multipart/form-data">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Input Kartu Keluarga</h1>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    No KK<input id="no_kk" type="text" class="form-control form-control-user {{$errors->first('no_kk') ? "is-invalid" : ""}}" placeholder="No KK" name="no_kk" value="" required autocomplete="name">
                                    <div class="invalid-feedback">
                                        {{$errors->first('no_kk')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    Nama Kepala Keluarga
                                    <input id="nama_kk" type="text" class="form-control form-control-user" placeholder="Nama" name="nama_kk" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        Scan Gambar<input id="name" type="file" accept="image/*" class="form-control form-control-user {{$errors->first('Gambar') ? "is-invalid" : ""}}" placeholder="Scan Gambar" name="Gambar" value="" required autocomplete="name">
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

                            {{-- <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi</h4>
                                    </div>
                                    <div class="modal-body">
                                    <p>Apakah anda yakin data yang anda inputkan sudah benar?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-user btn-block" data-dismiss="modal">
                                        {{ __('Ya') }}
                                    </button>
                                    <button type="button" class="btn btn-warning btn-user btn-block" data-dismiss="modal">Tidak</button>
                                    </div>
                                </div>
                                </div>
                            </div> --}}
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
        $('#no_kk').on('change', function () {
            let id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/datakkjson/' + id,
                success: function (response) {
                    console.log(response);
                    $('#nama_kk').val(response);
                }
            });
        });
    });
    </script>
</body>

@endsection
