<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- css --}}
    @include('layouts.css')
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                {{-- topbar --}}
                @include('layouts.topbar')
                {{--end topbar --}}

                <!-- Begin Page Content -->
                @yield('content')
                <!-- end Page Content -->

            </div>
            <!--end Main Content -->



            <!-- Footer -->

            @include('layouts.footer')

            <!-- End of Footer -->
        </div>
        <!--end Content Wrapper -->

    </div>
    <!--end Page Wrapper -->


    {{-- javascript --}}
    @include('layouts.js')
</body>
</html>
