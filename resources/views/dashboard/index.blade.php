@extends('master.master')
@section('content')
<div id="content">
    <!-- Begin Page Content -->
    <div class="row">
    @if (Auth::user()->level=='admin')
    <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $admin->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Petugas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $petugas->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Akun Warga
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $warga->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Arsip</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $arsip }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif(Auth::user()->level=='petugas')
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Akun Warga
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $warga->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cloud-upload-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-6  col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Arsip</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $arsip }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Akun Warga
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $warga->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cloud-upload-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-6  col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Arsip</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $arsip }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- table --}}
    <!-- DataTales Example -->

    @if(Auth::user()->level=='user' or Auth::user()->level=='petugas')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table Terverifikasi</h6>
        </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kartu Keluarga</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Status</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->level=='user')
                        @foreach($kk as $item)
                        <tr>
                            <td>{{$item->no_kk}}</td>
                            <td @if ($item->status=="valid")
                                style="color:green;"
                                @elseif ($item->status=="tidak valid")
                                style="color:red;"
                            @endif>{{$item->status}}</td>
                            <td>{{$item->pesan}}</td>
                        </tr>
                        @endforeach
                        @elseif (Auth::user()->level=='petugas')
                        @foreach($kk_petugas as $item)
                        <tr>
                            <td>{{$item->no_kk}}</td>
                            <td @if ($item->status=="valid")
                                style="color:green;"
                                @elseif ($item->status=="tidak valid")
                                style="color:red;"
                            @endif>{{$item->status}}</td>
                            <td>{{$item->pesan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kartu Tanda Penduduk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Status</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->level=='user')
                        @foreach($ktp as $item)
                        <tr>
                            <td>{{$item->NIK}}</td>
                            <td @if ($item->status=="valid")
                                style="color:green;"
                                @elseif ($item->status=="tidak valid")
                                style="color:red;"
                            @endif>{{$item->status}}</td>
                            <td>{{$item->pesan}}</td>
                        </tr>
                        @endforeach
                        @elseif (Auth::user()->level=='petugas')
                        @foreach($ktp_petugas as $item)
                        <tr>
                            <td>{{$item->NIK}}</td>
                            <td @if ($item->status=="valid")
                                style="color:green;"
                                @elseif ($item->status=="tidak valid")
                                style="color:red;"
                            @endif>{{$item->status}}</td>
                            <td>{{$item->pesan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Buku Nikah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Buku Nikah</th>
                            <th>Status</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (Auth::user()->level=='user')
                        @foreach($bn as $item)
                        <tr>
                            <td>{{$item->no_buku}}</td>
                            <td @if ($item->status=="valid")
                                style="color:green;"
                                @elseif ($item->status=="tidak valid")
                                style="color:red;"
                            @endif>{{$item->status}}</td>
                            <td>{{$item->pesan}}</td>
                        </tr>
                        @endforeach
                        @elseif (Auth::user()->level=='petugas')
                        @foreach($bn_petugas as $item)
                        <tr>
                            <td>{{$item->no_buku}}</td>
                            <td @if ($item->status=="valid")
                                style="color:green;"
                                @elseif ($item->status=="tidak valid")
                                style="color:red;"
                            @endif>{{$item->status}}</td>
                            <td>{{$item->pesan}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
