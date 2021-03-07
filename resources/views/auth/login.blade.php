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

<body style="background-image: url(https://farm5.staticflickr.com/4340/36400422205_1f196452d0_o.png); background-color:rgba(0,0,0,0); background-repeat:no-repeat; background-size:100% 100%;" >
    <section id="abc">
    <div class="overlay">
    <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgba(255, 255, 255, 0.7)">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                            id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-bloc">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('register'))
                                    <a>
                                        <a class="btn btn-secondary btn-user btn-bloc" style="color:white," href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </a>
                                @endif

                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</body>
@extends('layouts.js')
