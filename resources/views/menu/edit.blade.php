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
                <form method="POST" action="{{ route('updatemenu',['id'=>$item->id]) }}">
                    @csrf
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Form</h1>
                            </div>
                            <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Nama Form<input id="name" type="text" class="form-control form-control-user" placeholder="Nama Form" name="name" value="{{$item->nama_menu}}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Nama Inputan<input id="name" type="text" class="form-control form-control-user" placeholder="Nama Inputan" name="input1" value="{{$item->nama_input}}" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        Nama Inputan Gambar<input id="name" type="text" class="form-control form-control-user" placeholder="Nama Inputan Gambar" name="input2" value="{{$item->nama_inputGambar}}" required autocomplete="name">
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
                            @endforeach
                            <div class="form-group">
                                <div class="col-sm-13 mb-3 mb-sm-0">
                                    <a href="{{ route('menu') }}" class="btn btn-warning btn-user btn-block">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>


@endsection
