<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ config('app.name') }}</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('cmsp/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Page level plugin CSS-->
        <link href="{{ asset('cmsp/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('cmsp/css/sb-admin.css')}}" rel="stylesheet">
        
        <link href="{{ asset('cmsp/css/sweetalert.css') }}" rel="stylesheet">

    </head>

    <body id="page-top">
        @include('cms.top_menu')
        <div id="wrapper">
            <!-- Sidebar -->
            @include('cms.left_menu')
            <div id="content-wrapper">

                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2019</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>        

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('cmsp/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('cmsp/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('cmsp/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Page level plugin JavaScript-->
        <script src="{{ asset('cmsp/vendor/chart.js/Chart.min.js')}}"></script>
        <script src="{{ asset('cmsp/vendor/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{ asset('cmsp/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('cmsp/js/sb-admin.min.js')}}"></script>

        <!-- Demo scripts for this page-->
        <script src="{{ asset('cmsp/js/demo/datatables-demo.js')}}"></script>
        <script src="{{ asset('cmsp/js/demo/chart-area-demo.js')}}"></script>
        
         <script src="{{ asset('cmsp/js/sweetalert.min.js') }}" defer></script>
         <script src="{{ asset('cmsp/js/user.js') }}" defer></script>
        <script src="{{ asset('cmsp/js/cmsp.js') }}" defer></script>

    </body>

</html>
@include('cms.modal.logout')
@include('backend.modal.complainTypeEditModal')