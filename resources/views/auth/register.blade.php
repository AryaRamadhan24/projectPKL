@extends('layouts.css')

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
            </div>
        </div>
    </div>
<body class="bg-gradient-light">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
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
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input id="name" type="text" class="form-control form-control-user" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name">
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div> --}}
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
                                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>
                            <hr>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
@extends('layouts.js')
