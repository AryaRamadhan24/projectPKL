@extends('master.master')
@section('content')

<body class="bg-gradient-light">
    @if (session('alert'))
        <div class="alert alert-danger">
            <center>{{ session('alert') }}</center>
        </div>
    @endif
    @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <center><li>{{ $error }}</li></center>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            <center>{{ session('success') }}</center>
        </div>
    @endif
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-2">
            <div class="card-body p-0">
                @foreach ($userData as $item)
                <form method="POST" action="{{ route('updateprofile',['id' => $item->id]) }}">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Profile</h1>
                            </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Nama<input id="name" type="text" class="form-control form-control-user" placeholder="Nama" name="name" value="{{$item->name}}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    Email<input id="email" type="email" class="form-control form-control-user" name="email" value="{{$item->email}}" required autocomplete="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        TTL<input id="name" type="text" class="form-control form-control-user" placeholder="Tempat Tanggal Lahir" name="TTL" value="{{$item->TTL}}" required autocomplete="name">
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
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Password<input id="password" type="password" class="form-control form-control-user" name="password" required autocomplete="new-password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Retype Password<input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">
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

</body>

@endsection
