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
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                {{ $arsipAdmin }}
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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Akun Warga Desa @foreach ($namaDesa as $item)
                                {{ $item->nama_desa }}
                            @endforeach
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $wargaDesa->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3  col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Total Arsip Desa @foreach ($namaDesa as $item)
                                {{ $item->nama_desa }}
                            @endforeach</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $arsip }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-pie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- card3 --}}
        <div class="col-xl-3  col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Arsip Desa @foreach ($namaDesa as $item)
                                {{ $item->nama_desa }}
                            @endforeach yang sudah diverifikasi </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $arsipValidated }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- card4 --}}
        <div class="col-xl-3  col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Arsip Desa @foreach ($namaDesa as $item)
                                {{ $item->nama_desa }}
                            @endforeach yang belum diverifikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $arsipProgress }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Akun Warga Desa @foreach ($namaDesa as $item)
                                {{ $item->nama_desa }}
                            @endforeach
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $wargaDesa->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                Jumlah Arsip Desa @foreach ($namaDesa as $item)
                                {{ $item->nama_desa }}
                            @endforeach</div>
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
    @elseif (Auth::user()->level=='admin')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- CHart --}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Arsip Tiap Kecamatan</h6>
                </div>
                <div class="chart">
                    <div id="ChartArsip"></div>
                </div>
            </div>
        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
        </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Akun</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Desa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $item)
                        <tr>
                            <td>{{$item->id_user}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->level}}</td>
                            <td>{{$item->nama_desa}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kecamatan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kecamatan as $item)
                        <tr>
                            <td>{{$item->id_kecamatan}}</td>
                            <td>{{$item->nama_kecamatan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Desa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Kecamatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($desa as $item)
                        <tr>
                            <td>{{$item->id_desa}}</td>
                            <td>{{$item->nama_desa}}</td>
                            <td>{{$item->nama_kecamatan}}</td>
                        </tr>
                        @endforeach
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


@section('Chart')
    <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
                Highcharts.chart('ChartArsip', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Monthly Average Rainfall'
                    },
                    subtitle: {
                        text: 'Source: WorldClimate.com'
                    },
                    xAxis: {
                        categories: {!!json_encode($categories)!!},
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Arsip'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'Kartu Keluarga',
                        data: {!!json_encode($DataKK)!!}

                    }, {
                        name: 'Kartu Tanda Penduduk',
                        data: {!!json_encode($DataKTP)!!}

                    }, {
                        name: 'Buku Nikah',
                        data: {!!json_encode($DataBN)!!}

                    }]
                });
                </script>
@endsection

<script>
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
