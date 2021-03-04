<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ARSIP</title>
    <title>E-ARSIP</title>
    <!-- Favicons -->
    <link href="{{asset('Landingpage/img/favicon.png')}}" rel="icon">
    <link href="{{asset('Landingpage/img/favicon.png')}}" rel="appleicon">

    {{-- css --}}
    @include('layouts.css')
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('master.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- topbar --}}
            @include('master.topbar')
            {{--end topbar --}}

            <!-- Main Content -->
            @yield('content')
            <!--end Main Content -->

            <!-- Footer -->

            @include('master.footer')

            <!-- End of Footer -->
        </div>
        <!--end Content Wrapper -->

    </div>
    <!--end Page Wrapper -->


    {{-- javascript --}}
    @include('layouts.js')


</body>
</html>
