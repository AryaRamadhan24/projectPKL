@extends('layouts.css')
@extends('landing.css')

<title>E-ARSIP</title>
<!-- Favicons -->
<link href="{{asset('Landingpage/img/favicon.png')}}" rel="icon">
<link href="{{asset('Landingpage/img/favicon.png')}}" rel="appleicon">

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                E-ARSIP
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
            </div>
        </div>
    </div>
<body>
    <section id="abc">
    <div class="overlay">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgba(255, 255, 255, 0.7)">
            <div class="card-body p-0">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <form class="user">
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
                                        <select id="desa" class="form-control form-control-user" name="desa" autocomplete="desa"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input id="name" type="text" class="form-control form-control-user" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="form-control form-control-user" name="password" required autocomplete="new-password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-group row mb-6">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        
<script>
            $(document).ready(function () {
            $('#kecamatan').on('change', function () {
            let id = $(this).val();
            $('#desa').empty();
            $('#desa').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
            type: 'GET',
            url: 'register/daftardesa/' + id,
            success: function (response) {
            var response = JSON.parse(response);
            console.log(response);   
            $('#desa').empty();
            $('#desa').append(`<option value="0" disabled selected>==Pilih Desa==</option>`);
            response.forEach(element => {
                $('#desa').append(`<option value="${element['id_desa']}">${element['nama_desa']}</option>`);
                });
            }
        });
    });
});
</script>
</body>
@extends('layouts.js')
