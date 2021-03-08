@extends('master.master')
@section('content')

<body class="bg-gradient-light">
    @if (session('success'))
        <div class="alert alert-success">
            <center>{{ session('success') }}</center>
        </div>
    @endif
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-2">
            <div class="card-body p-0">
                <form method="POST" action="{{ route('adduser') }}">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah User</h1>
                            </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Nama<input id="name" type="text" class="form-control form-control-user" placeholder="Nama" name="name" value="" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    Email<input id="email" type="email" class="form-control form-control-user" name="email" value="" required autocomplete="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">Level
                                        <select name="level" id="" class="form-control form-control-user">
                                            <option value="admin">Admin</option>
                                            <option value="user">Petugas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Password<input id="password" type="password" class="form-control form-control-user {{$errors->first('password') ? "is-invalid" : ""}}" name="password" required autocomplete="new-password" placeholder="Password">
                                        <div class="invalid-feedback">
                                            {{$errors->first('password')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Retype Password<input id="password-confirm" type="password" class="form-control form-control-user {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
                                        <div class="invalid-feedback">
                                            {{$errors->first('password_confirmation')}}
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
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

@endsection
