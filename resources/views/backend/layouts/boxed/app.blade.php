<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Box Navigation</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('resources/assets/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('resources/assets/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('resources/assets/dist/css/skins/_all-skins.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <!-- jQuery 3 -->
        <script src="{{ asset('resources/assets/bower_components/jquery/dist/jquery.min.js') }}" ></script>


        <!-- Scripts -->
<!--        <script src="{{ asset('js/app.js') }}" defer></script>
         Fonts 
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
         Styles 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    </head>
    <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
    <body class="hold-transition skin-blue layout-boxed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
            @include('backend.layouts.boxed.header')
            @include('backend.layouts.boxed.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('backend.layouts.boxed.footer')
        </div>
        <!-- /.content-wrapper -->
        
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('resources/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}" ></script>
        <!-- SlimScroll -->
        <script src="{{ asset('resources/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}" ></script>
        <!-- FastClick -->
        <script src="{{ asset('resources/assets/bower_components/fastclick/lib/fastclick.js') }}" ></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('resources/assets/dist/js/adminlte.min.js') }}" ></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('resources/assets/dist/js/demo.js') }}" ></script>

    </body>
</html>
