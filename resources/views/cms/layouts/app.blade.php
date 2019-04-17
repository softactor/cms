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

    </head>

    <body id="page-top">

        @yield('content')

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

    </body>

</html>
