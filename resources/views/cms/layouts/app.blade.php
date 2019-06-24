<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }}</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('cmsp/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- Page level plugin CSS-->


        <!-- Custom styles for this template-->
        <link href="{{ asset('cmsp/css/sb-admin.css')}}" rel="stylesheet">

        <link href="{{ asset('cmsp/css/sweetalert.css') }}" rel="stylesheet">

    </head>

    <body id="page-top">
        @include('cms.top_menu')
        <div id="wrapper">
            <!-- Sidebar -->
            @include('cms.left_menu')
            <div id="content-wrapper" >

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

        
        @section('dynamic_script_config_section')
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('cmsp/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('cmsp/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('cmsp/js/sb-admin.min.js')}}"></script>
        <script src="{{ asset('cmsp/js/sweetalert.min.js') }}" defer></script>    
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="{{ asset('cmsp/js/user.js') }}" defer></script>
        <script src="{{ asset('cmsp/js/cmsp.js') }}" defer></script>
        <script src="{{ asset('cmsp/js/RedirectToPage.js') }}" defer></script>
        <script type="text/javascript" src="{{ asset('cmsp/js/firstChartConfig.js') }}"></script>
        @show
    </body>

</html>
@include('cms.modal.logout')
@include('backend.modal.complainTypeEditModal')
@include('cms.modal.complains')
@include('cms.modal.viewUser')
@include('cms.modal.viewComplains')
