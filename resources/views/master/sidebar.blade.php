        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar" style="z-index: 99999999;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-file-archive"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-ARSIP<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('home')}}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (auth::user()->level=='user' or auth::user()->level=='petugas')

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu Tambah Layangan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-upload"></i>
            <span>Unggah File</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('addkk')}}">Kartu Keluarga</a>
                <a class="collapse-item" href="{{route('addktpview')}}">Kartu Tanda Penduduk</a>
                <a class="collapse-item" href="{{route('addbn')}}">Buku Nikah</a>
            </div>
        </div>
    </li>
    @endif
    @if (auth::user()->level=='petugas')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#abc"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-upload"></i>
            <span>Verifikasi</span>
        </a>
        <div id="abc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('kk')}}">Kartu Keluarga</a>
                <a class="collapse-item" href="{{route('ktp')}}">Kartu Tanda Penduduk</a>
                <a class="collapse-item" href="{{route('bn')}}">Buku Nikah</a>
            </div>
        </div>
    </li>
    @elseif (auth::user()->level=='admin' or auth::user()->level=='petugas')
    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User:</h6>
                @if (auth::user()->level=='admin')
                <a class="collapse-item" href="{{route('userpetugas') }}">Data Petugas</a>
                <a class="collapse-item" href="{{ route('useradmin') }}">Data Admin</a>
                @endif
                <a class="collapse-item" href="{{ route('userwarga') }}">Data Warga</a>
                <a class="collapse-item" href="{{route('createuser') }}">Tambah User</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-globe-asia"></i>
            <span>Data Wilayah</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daerah:</h6>
                <a class="collapse-item" href="{{route('kecamatan') }}">Data Kecamatan</a>
                <a class="collapse-item" href="{{ route('desa') }}">Data Desa</a>
            </div>
        </div>
    </li>
    @endif



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->
